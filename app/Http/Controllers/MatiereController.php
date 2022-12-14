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
        return view('grades.ajouter_matiere', compact('classes'));
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
            'classe' => 'required',
        ]);

        $classe = Classe::where('id', request('classe'))->first();

        $matiere = new Matiere;

        $matiere->nom = request('nom');
        $matiere->classe_id = request('classe');
        $matiere->cycle_id = $classe->cycle_id;
        // dd($matiere);
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
