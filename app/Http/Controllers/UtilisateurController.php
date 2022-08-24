<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        request()->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'password'=> 'required',
            'confirm_pass'=> 'required',
            'email' => 'required',
        ]);

        $utilisateur = new Utilisateur;

        if(request('password') == request('confirm_pass')){
            $utilisateur->nom = request('nom');
            $utilisateur->prenoms = request('prenom');
            $utilisateur->password = sha1(request('password'));
            $utilisateur->email = request('email');
            // $utilisateur->role_id = 0;
            $utilisateur->biographie = '';
            // dd($utilisateur);
            $utilisateur->save();

            return redirect(route('connexion'));
        }else{
            return back()->with('error', 'Vos mots de passes ne matchent pas!');
        }
    }

    public function login(){
        request()->validate([
            'password'=> 'required',
            'email' => 'required',
        ]);

        $utilisateur = Utilisateur::where('email', request('email'))->where('password', sha1(request('password')))->first();

        if($utilisateur){
            // dd($utilisateur);
            session([
                'user' => $utilisateur
            ]);
            if($utilisateur->email == 'adminjean@gmail.com' || $utilisateur->email == 'user@gmail.com'){
                return redirect(route('admin.index'));
            }else{
                return redirect(route('home'));
            }

        }else{
            return back()->with('error', 'Identifiants ou mot de passe incorrects');
        }
    }

    public function loginadmin() {
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // dd('Ok');

        $user = Utilisateur::where('email', request('email'))->where('password', sha1(request('password')))->first();

        if($user) {
            session([
                'user' => $user
            ]);

            return redirect(route('admin.index'));
        }else {
            return back();
        }
    }

    public function logout(){
        session([
            'user' => null
        ]);

        return redirect(route('connexion'));
    }

    public function emailcheck(){
        request()->validate([
            'email' => 'required'
        ]);

        $utilisateur = Utilisateur::where('email', request('email'))->first();

        if($utilisateur){
            session([
                'user_recovered' => $utilisateur
            ]);
            return view('auth.password');
        }else{
            return back();
        }

    }

    public function passwordrecover(){
        request()->validate([
            'password' => 'required',
            'passwordconfirm' => 'required'
        ]);
        // dd('OK');
        if(request('password') == request('passwordconfirm')){
            $utilisateur = session('user_recovered');

            $utilisateur->password = sha1(request('password'));

            $utilisateur->save();

            return redirect(route('connexion'));
        }else{
            // dd('OK');
            return redirect(route('check.password'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function show(Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utilisateur $utilisateur)
    {
        //
    }
}
