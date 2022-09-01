<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $inputs = request()->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'password'=> 'required|min:6',
            'confirm_pass'=> 'required',
            'email' => 'required|unique:users,email',
        ]);

        $user = new User;

        if(request('password') == request('confirm_pass')) {
            $user->nom = request('nom');
            $user->prenoms = request('prenom');
            $user->password = Hash::make(request('password'));
            $user->email = request('email');
            $user->biographie = '';
            $user->save();
            Auth::guard('web')->login($user);
            request()->session()->regenerate();

            return redirect(route('connexion'));
        }else{
            return back()->withInput($inputs)->with('error', 'Vos mots de passes ne matchent pas!');
        }
    }

    public function login(){
        $credentials = request()->validate([
            'password'=> 'required',
            'email' => 'required',
        ]);

        $log_attempt = Auth::guard('web')->attempt($credentials);

        if($log_attempt) {
            request()->session()->regenerate();
            return redirect()->route('home');
        }else{
            return back()->withInput($credentials)->with('error', 'Identifiants ou mot de passe incorrects');
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        request()->session()->regenerate();
        request()->session()->regenerateToken();
        return redirect(route('connexion'));
    }

    public function emailcheck(){
        request()->validate([
            'email' => 'required'
        ]);

        $user = User::where('email', request('email'))->first();

        if($user){
            session([
                'user_recovered' => $user
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
            $user = session('user_recovered');

            $user->password = Hash::make(request('password'));

            $user->save();

            return redirect(route('connexion'));
        }else{
            // dd('OK');
            return redirect(route('check.password'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
