<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        $this->first_login();
        return view('auth.adminlogin');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::guard('admin')->attempt($credentials)) {
            return back()->withInput($credentials)->withErrors([
                'credentials' => 'Veillez entrer un email et un mot de passe valides.',
            ]);
        }
        Request()->session()->regenerate();
        return redirect()->route('admin.index');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        Request()->session()->regenerate();
        Request()->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Doit être créé par un admin
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *  Called to create the base admin on the first login
     */
    private function first_login() {
        $first_admin = Admin::first();
        if ($first_admin) {
            return $first_admin;
        }
        $new_admin = new Admin();
        $new_admin->firstname = 'admin';
        $new_admin->lastname = 'DEFAULT';
        $new_admin->email = 'defaultedu@gmail.com';
        $new_admin->password = Hash::make('@TeleEduTogo2022');
        $new_admin->save();
        return $new_admin;
    }
}
