<?php

namespace App\Http\Controllers;

use App\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParametreController extends Controller
{
    //
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function create()
    {
        $labo =  Parametre::find('1');
            return view('parametre',['labo'=>$labo]);


    }

    public function store(Request $request)
    {
        $labo =  Parametre::find('1');

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);
            $labo->logo = '/uploads/photo/'.$file_name;
        }
        $labo->nom = $request->input('nom');
        $labo->facebook = $request->input('facebook');
        $labo->numtel = $request->input('numtel');
        $labo->adresse = $request->input('adresse');
        $labo->email = $request->input('email');
        $labo->lienMap = $request->input('map');
        $labo->save();

        return redirect('/');

    }
}
