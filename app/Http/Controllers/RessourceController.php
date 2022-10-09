<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Matiere;
use App\Models\Ressource;
use App\Services\DataServices\RessourceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RessourceController extends Controller
{

    private $ressourceService;
    public function __construct(RessourceService $resService) {
        $this->ressourceService = $resService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ressources = Ressource::All();
        return view('admin.ressources.liste_ressources', compact('ressources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matieres = DB::table('matieres')->orderBy('nom')->orderBy('classe_id')->get();
        $classesFullAccentName = [];
        foreach(Classe::all() as $classe) {
            $classesFullAccentName[$classe->id] = $classe->fullNameAccentue;
        }
        // dd($classesFullAccentName);
        // dd($matieres);
        return view('admin.ressources.ajout_ressource', compact('matieres','classesFullAccentName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->input());
        $this->ressourceService->validateStoreRequest($request);

        if ($request->file('ressource')) {
            $imagePath = $request->file('ressource');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('ressource')->storeAs('ressource', $imageName, 'public');

        }

        $ressource = $this->ressourceService->store($request->input());

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
