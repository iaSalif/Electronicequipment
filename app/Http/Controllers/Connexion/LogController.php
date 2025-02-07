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
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Connexion réussie
            return redirect()->route('dashboard')->with('success', 'Connexion réussie !');
        } else {
        // Identifiants incorrects
        return back()->withErrors(['email' => 'Ces identifiants sont incorrects.']);
    }

        // Vérification de l'existence de l'email
        if (User::where('email', $request->input('email'))->exists()) {
            return back()->withErrors(['email' => 'Cet email est déjà utilisé.']);
        }
        $user = user::create([
            'nom' => $request->input("name"),
            'prenom' => $request->input("prenom"),
            'email' => $request->input("email"),
            'password' => Hash::make($request->input("password")),
            
            
        ]);

        $user->save();  

        return redirect()->route('connexion.page')->with("successInscription", "registration successful");
    }

    public function connexion_action(ConnexionRequest $request)
    {
        $credentials = $request->validated();
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Redirection vers une page d'accueil ou tableau de bord
            return redirect()->route('inscription')->with('status', 'Connexion réussie');
        }
    
        // Redirection avec un message d'erreur si les identifiants sont incorrects
        return redirect()->route('connexion.page')->withErrors([
            'email' => 'Les informations d’identification sont incorrectes.',
        ])->withInput();
    }
    

}
