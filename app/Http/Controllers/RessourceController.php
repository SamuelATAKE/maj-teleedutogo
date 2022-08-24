<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Matiere;
use App\Models\Ressource;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ressources = Ressource::All();
        return view('admin.liste_ressources', compact('ressources'));
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

        $nom_classe[] = null;
        foreach($matieres as $m){
            $classe = Classe::where('id', $m->classe_id)->first();
            $nom_classe[] = $classe->nom;
        }

        // dd($nom_classe);

        return view('admin.ajout_ressource', compact('classes', 'cycles', 'matieres', 'nom_classe'));
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
            'ressource' => 'required',
            // 'contributeur' => 'required',
            'matiere' => 'required',
            'type' => 'required',
        ]);

        if ($request->file('ressource')) {
            $imagePath = $request->file('ressource');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('ressource')->storeAs('ressource', $imageName, 'public');

            // dd($path);
        }

        $ressource = new Ressource;

        $ressource->nom_ressource = $path;
        // $ressource->contributeur = request('contributeur');
        $ressource->contributeur_id = 1;
        $ressource->matiere_id = request('matiere');
        $ressource->type = request('type');
        $ressource->etablissement = request('etablissement');
        $ressource->annee = request('annee');
        $ressource->chapitre = request('chapitre');
        $ressource->description = request('description');
        // dd($ressource);
        $ressource->save();

        return back();
    }

    public function year(String $exam){
        // if($examen == 1){
        //     $exam = 'CEPD';
        // }else if($examen == 2){
        //     $exam = 'BEPC';
        // }else if($examen == 3){
        //     $exam = 'BAC1';
        // }else if($examen == 4){
        //     $exam = 'BAC2';
        // }

        // dd('OK');
        $examens = Ressource::where('examen', $exam)->get();

        // dd($examens);

        $year_tab[] = array();

        foreach ($examens as $value) {
            $year_tab[] = $value->annee;
        }

        $years = array_unique($year_tab); //Suppression de doublons
        // dd($years);
        return view('parcourir.annee_contenu', compact('years', 'exam'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ressource  $ressource
     * @return \Illuminate\Http\Response
     */
    public function show(Ressource $ressource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ressource  $ressource
     * @return \Illuminate\Http\Response
     */
    public function edit(Ressource $ressource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ressource  $ressource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ressource $ressource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ressource  $ressource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ressource $ressource)
    {
        //
    }
}
