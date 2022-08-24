<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Matiere;
use App\Models\Serie;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes = Classe::All();
        return view('admin.classes.index', compact('classes'));
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
        $series = Serie::All();
        return view('grades.ajouter_classe', compact('cycles', 'series'));
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
            'cycle' => 'required',
        ]);

        $classe  = new Classe;

        $classe->nom = request('nom');
        $classe->cycle_id = request('cycle');
        $classe->serie_id = request('serie');
        $classe->description = request('description');
        // dd($classe);
        $classe->save();

        return redirect(route('admin.classes'));
    }

    public function getMatieres(String $cycle, String $id){
        $classe = Classe::where('nom', $id)->first();
        // dd($classe);
        if($classe) {
            $matieres = Matiere::where('classe_id', $classe->id)->get();
            // dd($matieres);
            session([
                'choosed_class' => $classe
            ]);
            $cycle = Cycle::where('id', $classe->cycle->id)->first();
            // dd($cycle);
            if($classe->serie_id){
                $serie = Serie::where('id', $classe->serie_id)->first();
                session([
                    'serie' => $serie
                ]);
            }

            return view('parcourir.template_classe', compact('matieres', 'classe', 'cycle'));
        }else {
            return redirect(route('home'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
        $cycles = Cycle::all();
        $series = Serie::all();
        $classe = Classe::where('id', $id)->first();
        return view("admin.classes.edit", compact("classe", "cycles", "series"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
        request()->validate([
            'nom' => 'required',
            'cycle' => 'required',
        ]);
        $classe = Classe::where('id', $id)->first();
        //dd($classe);

        $classe->nom = request('nom');
        $classe->cycle_id = request('cycle');
        $classe->serie_id = request('serie');
        $classe->description = request('description');
        // dd($classe);
        $classe->save();

        return redirect(route('admin.classes'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classe $classe)
    {
        //
    }
}
