<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function accueil(Request $request)
    {
        if ($request->session()->has('id')) {
            return redirect('index');
        } else {
            return view('auth.connexion');
        }
    }

    public function login(Request $request)
    {
        //validate the input
        $request->validate([
            "email" => 'required',
            "password" => 'required', 
        ]);

        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where($field, $request->email)->first();
        if ($user) {
            if ($request->password == $user->password) {
                $request->session()->put('id', $user->id);
                $request->session()->put('level', $user->fonction_id);
                $request->session()->put('nom', $user->nom);
                $request->session()->put('username', $user->username); 
                return redirect('index');
            } else {
                return back()->with('fail', "Le mot de passe que vous avez entré est incorrect. Veuillez vérifier que vous avez saisi le bon mot de passe.");
            }
        } else {
            return back()->with('fail', "Désolé, nous ne reconnaissons pas cet identifiant. Veuillez vérifier que vous avez saisi le bon identifiant. ");
        }
    }
    

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    
    public function index()
    {
        $level = session('level');

        return view($level.'.index');
    }




}
