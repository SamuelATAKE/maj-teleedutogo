<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Matiere;
use App\Models\Ressource;
use App\Services\DataServices\DataMetamorpherService;
use App\Services\DataServices\MatiereService;
use App\Services\DataServices\RessourceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RessourceController extends Controller
{

    private $ressourceService;
    private $matiereService;
    private $dataMetamorpherService;

    public function __construct(RessourceService $resService, MatiereService $matServ, DataMetamorpherService $metaMor) {
        $this->ressourceService = $resService;
        $this->matiereService = $matServ;
        $this->dataMetamorpherService = $metaMor;
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
        $matieres = $this->matiereService->all();
        $classSortCallback = function ($mat) {
            return $mat->classe->id;
        };
        $matieres = $this->dataMetamorpherService->sortDataBy($matieres, ['nom', $classSortCallback]);
        return view('admin.ressources.ajout_ressource', compact('matieres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());
        $this->ressourceService->validateStoreRequest($request);
        $files = [];
        $files['ressource'] = $request->file('ressource');
        $inputArray = $request->input();
        $ressource = $this->ressourceService->store($inputArray, $files);
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
    public function edit($id)
    {
        $matieres = $this->matiereService->all();
        $classSortCallback = function ($mat) {
            return $mat->classe->id;
        };
        $matieres = $this->dataMetamorpherService->sortDataBy($matieres, ['nom', $classSortCallback]);
        $ressource = $this->ressourceService->find($id);
        return view('admin.ressources.edit-ressource')
            ->with('ressource', $ressource)
            ->with('matieres', $matieres);
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
