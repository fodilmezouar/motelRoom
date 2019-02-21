<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
class ClientController extends Controller
{
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
       
       $valid['success'] = array('success' => false, 'rep' => array());
        $valid['success'] = true;
        $valid['rep'] = $client->id;    
        return response()->json($valid);
    }
}
