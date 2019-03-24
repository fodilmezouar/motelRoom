<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chambres;
use App\Reservation;
use App\Client;
use App\Chambre_state;
use Illuminate\Support\Facades\DB;
class ReserverController extends Controller
{
    public function reservation(){
    	//state 1 pour occupé , 0 pour libre
    	$rooms = Chambres::all();
        return view('reservation.reserver')->with('rooms',$rooms);
    }
    public function store(Request $request){
      //add reservation
      //clients
      $cls = $request->input('clients');
      $clientId = "";
          //rendre chambre occupée
          $idChambre = $request->input('idChambre');
          $chambre = Chambres::find($idChambre);
          $chambre->state = '1';
          $chambre->save();
          $idClients = array();
      for ($i=0; $i < sizeof($cls); $i++) { 
        //$stay = new Chambre_state();
         $client = new Client();
         $client->type = $cls[$i]["typeClient"];
         $client->nom = $cls[$i]["nomCl"];
         $client->prenom = $cls[$i]["prenomCl"];
         $client->pere = $cls[$i]["pere"];
         $client->mere= $cls[$i]["mere"];
         $client->naissance= $cls[$i]["naissanceCl"];
         $client->lieu= $cls[$i]["lieuCl"];
         $client->adresse= $cls[$i]["adresseCl"];
         $client->nationalite= $cls[$i]["natCl"];
         $client->job = $cls[$i]["jobCl"];
         $client->tel = $cls[$i]["telCl"];
         $client->typePiece = $cls[$i]["piece"];
         $client->numPiece = $cls[$i]["numPiece"];
         $client->datePiece = $cls[$i]["datePiece"];
         $client->save();
         if($client->type == "1")
           $clientId = $client->id;
         $idClients[] = $client->id;
      }

      
      $reservation = new Reservation();
      $reservation->date_reservation = date_format(date_create($request->input('arr')),"Y-m-d");
      $reservation->date_liberation = date_format(date_create($request->input('sor')),"Y-m-d");
      $reservation->total = $request->input('total');
      $reservation->isLibi = 0;
      $reservation->client_id = $clientId;
    	$reservation->save();
    	
      for ($i=0; $i < sizeof($idClients); $i++) { 
        $stay = new Chambre_state();
        $stay->client_id = $client->id;
         $stay->chambre_id = $idChambre;
         $stay->reservation_id = $reservation->id;
         $stay->save();
      }

       $valid['success'] = array('success' => false, 'rep' => array());
        $valid['success'] = true;
        $valid['rep'] = "Success bb";    
        return response()->json($valid);
    }
    public function listeRes(){
    	//les reservation en cours de traitement
    	$reservations = Reservation::where('isLibi','=',0)->orderBy('id','desc')->get();
        return view('reservation.liste')->with('reservations',$reservations);
    }
    public function liberer(Request $request){
    	$idRes = $request->input('idRes');
    	$reservation = Reservation::find($idRes);
    	$reservation->isLibi = 1;
    	$reservation->save();
    	$stays = Chambre_state::where('reservation_id','=',$idRes)->get();
      $stay = $stays->get(0);
    	$chambre = Chambres::find($stay->chambre_id);
    	$chambre->state = '0';
    	$chambre->save();
       $valid['success'] = array('success' => false, 'rep' => array());
        $valid['success'] = true;
        $valid['rep'] = "Success bb";    
        return response()->json($valid);
    }
    public function payer(Request $request){
      $reservation = Reservation::find($request->input('idResMontant'));
      $old = intval($reservation->prixPaye);
      $new = intval($request->input('montant'));
      $reservation->prixPaye = $old + $new ;
      $reservation->save();
      $valid['success'] = array('success' => false, 'rep' => array());
        $valid['success'] = true;
        $valid['rep'] = "Success bb";    
        return response()->json($valid);
    }
}
