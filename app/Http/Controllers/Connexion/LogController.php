<?php

namespace App\Http\Controllers\Connexion;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ConnexionRequest;
use App\Http\Requests\InscriptionRequest;

class LogController extends Controller
{
    // fonction qui gère la page inscription

    public function inscription(){
        return view("auth.inscription");
    }

    public function connexion(){
        return view("auth.connexion");
    }

    public function inscription_action(InscriptionRequest $request){
        $user = user::create([
            'nom' => $request->input("name"),
            'prenom' => $request->input("prenom"),
            'email' => $request->input("email"),
            'password' => Hash::make($request->input("password")),
            
            
        ]);

        $user->save();  

        return redirect()->route('connexion.page')->with("successInscription", "registration successful");
    }

    public function connexion_action(ConnexionRequest $request){
       $credentials=$request->validated();

       if(Auth::attempt($credentials)){
        $request->session()->regenerate();

        return redirect();
       }


        return redirect()->route('connexion.page')->with("successInscription", "registration successful");
    }

}
