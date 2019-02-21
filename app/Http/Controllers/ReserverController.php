<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chambres;
use App\Reservation;
use App\Client;
use App\Chambre_state;
class ReserverController extends Controller
{
    public function reservation(){
    	//state 1 pour occupé , 0 pour libre
    	$roomsLibre = Chambres::where('state','=','0')->get();
        return view('reservation.reserver')->with('roomsLibre',$roomsLibre);
    }
    public function store(Request $request){
    	$client = new Client();
        $client->nom = $request->input('nom');
       	 $client->prenom = $request->input('prenom');
       	 $client->tel = $request->input('tel');
       	 $client->num_passport = $request->input('permis');
       	  $client->num_carte = $request->input('carte');
       	 $client->adresse= $request->input('adresse');
       	 $client->naissance =  date_format(date_create($request->input('naissance')),"Y-m-d");
       	 $client->save();

        $clientId = $client->id;

    	$reservation = new Reservation();
        $reservation->client_id = $clientId;
        $reservation->date_reservation = date_format(date_create($request->input('arr')),"Y-m-d");
       	$reservation->date_liberation = date_format(date_create($request->input('sor')),"Y-m-d");
       	$reservation->total = $request->input('total');
       	$reservation->isLibi = 0;
       	$reservation->save();
        
        $tab = $request->input('idChambres');
    	for ($i=0; $i < sizeof($tab); $i++) { 
    		$stay = new Chambre_state();
    		$stay->chambre_id = $tab[$i];
    		$stay->reservation_id = $reservation->id;
    		$stay->save();
    		$chambre = Chambres::find($tab[$i]);
            $chambre->state = '1';
            $chambre->save();
    	}

       $valid['success'] = array('success' => false, 'rep' => array());
        $valid['success'] = true;
        $valid['rep'] = "Success bb";    
        return response()->json($valid);
    }
    public function listeRes(){
    	//les reservation en cours de traitement
    	$reservations = Reservation::where('isLibi','=',0)->get();
        return view('reservation.liste')->with('reservations',$reservations);
    }
    public function liberer(Request $request){
    	$idRes = $request->input('idRes');
    	$reservation = Reservation::find($idRes);
    	$reservation->isLibi = 1;
    	$reservation->save();
    	$stays = Chambre_state::where('reservation_id','=',$idRes)->get();
    	foreach($stays as $stay){
    		$chambre = Chambres::find($stay->chambre_id);
    		$chambre->state = '0';
    		$chambre->save();
    	}
       $valid['success'] = array('success' => false, 'rep' => array());
        $valid['success'] = true;
        $valid['rep'] = "Success bb";    
        return response()->json($valid);
    }
}
