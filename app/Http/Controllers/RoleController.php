<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Matiere;
use App\Models\Role;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class RoleController extends Controller
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
        $cycles = Cycle::All();
        $classes = Classe::All();
        $matieres = Matiere::All();
        // dd($cycles);
        return view('forms.completer_info', compact('cycles', 'matieres', 'classes'));
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
            'role' => 'required',
        ]);

        $role =  new Role;

        $role->nom_role = request('role');
        $role->classe_id = request('classe_id');
        $role->etablissement_scolaire = request('etablissement');
        $role->matiere_id = request('matiere_id');
        $role->region = request('region');
        $role->utilisateur_id = session('user')->id;
        // dd($role);
        $role->save();

        $utilisateur = Utilisateur::where('id', session('user')->id)->first();

        if($utilisateur){
            $role_id = Role::where('utilisateur_id', session('user')->id)->first()->id;
            $utilisateur->role_id = $role_id;
            // dd($utilisateur);
            $utilisateur->save();

            return redirect(route('home'));
        }else{
            return back()->with('error', 'Echec de mise à jour des informations');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
