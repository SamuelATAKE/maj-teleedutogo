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
        return view('admin.classes.ajouter_classe', compact('cycles', 'series'));
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
            'cycle' => 'required',
        ]);

        $cycle = Cycle::find(request('cycle'));
        $serie = Serie::find(request('serie'));

        if($cycle == null) {
            return back()->withInput(request()->input())->withErrors('Choisissez un cycle existant', 'cycle');
        }

        $class_exist = Classe::where('nom', strtolower(request('nom')))->first();
        if($class_exist == null) {

        } elseif ($class_exist->serie == $serie && $class_exist->cycle == $cycle) {
            return back()->withInput($inputs)->withErrors('Cette classe existe déjà.');
        }

        $classe  = new Classe;

        $classe->nom = strtolower(request('nom'));
        $classe->nom_accentue = strtolower(request('nom_accent'));
        $classe->cycle()->associate($cycle);
        $classe->serie()->associate($serie);
        $classe->description = request('description');
        $classe->save();

        return redirect(route('admin.classes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show($nom_cycle, $fullname_classe)
    {
        $cycle = Cycle::where('nom_cycle', $nom_cycle)->first();
        $classe = $cycle->classes->where('fullName', $fullname_classe)->first();
        if(!$classe) {
            return view('errors.404');
        }
        // dd($classe->fullNameAccentue);
        return view('parcourir.template_classe')
            ->with('classe', $classe);
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
