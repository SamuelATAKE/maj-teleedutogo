<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Ressource;
use App\Models\Serie;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $matieres = Matiere::All();
        return view('admin.matieres.index', compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $classes = Classe::All();
        return view('admin.matieres.ajouter_matiere', compact('classes'));
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
        $inputs = request()->validate([
            'nom' => 'required',
            'nom_accent' => 'required',
            'classe' => 'required',
        ]);

        $classe = Classe::find(request('classe'));

        if($classe == null) {
            return back()->withInput($inputs)->withErrors('Cette classe n\'a pas été enregistrée');
        }

        $matiere_exist = Matiere::where('nom', strtolower(request('nom')))->first();

        if($matiere_exist->classe == $classe) {
            return back()->withInput($inputs)->withErrors('Cette matière existe déjà.');
        }

        $matiere = new Matiere;
        $matiere->nom = strtolower(request('nom'));
        $matiere->nom_accentue = strtolower(request('nom_accent'));
        $matiere->classe()->associate($classe);
        $matiere->save();

        return redirect(route('admin.matieres'));
    }

    public function getRessources(String $cycle, String $classe, String $id){
        $matiere = Matiere::where('nom', $id)->where('classe_id', session('choosed_class')->id)->first();
        $ressources = Ressource::where('matiere_id', $matiere->id)->get();

        if($matiere){
            $classe = Classe::where('id', $matiere->classe_id)->first();
            if($classe->serie_id){
                $serie = Serie::where('id', $classe->serie_id)->first();
                session([
                    'serie' => $serie
                ]);
            }
        }

        return view('parcourir.template_matiere', compact('ressources', 'matiere', 'classe'));
    }

    public function delete($id) {
        $matToDel = Matiere::find($id);
        if (!$matToDel) {
            return back()->withErrors('La matière à supprimer n\'existe pas');
        }
        $matToDel->delete();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Matiere $matiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matiere $matiere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matiere $matiere)
    {
        //
    }
}
