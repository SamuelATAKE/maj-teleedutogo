<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Serie;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cycles = Cycle::All();
        return view('admin.cycles.index', compact('cycles'));
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
        //
        request()->validate([
            'cycle' => 'required'
        ]);

        $cycle = new Cycle;

        $cycle->nom_cycle = request('cycle');
        // dd($cycle);
        $cycle->save();

        return redirect(route('admin.cycles'));
    }


    public function showPrimaire()
    {
        $cycle = Cycle::where('nom_cycle', 'primaire')->first();
        $classes = $cycle->classes;
        return view('parcourir.primaire')
            ->with('classes', $classes);
    }

    public function showCollege()
    {
        $cycle = Cycle::where('nom_cycle', 'college')->first();
        $classes = $cycle->classes;
        return view('parcourir.college')
            ->with('classes', $classes);
    }

    public function showLycee()
    {
        $cycle = Cycle::where('nom_cycle', 'lycee')->first();
        $series = Serie::all();
        $classes_groupes = [];
        foreach ($series as $serie) {
            $classes = $cycle->classes->where('serie_id', $serie->id);
            $classes_groupes[$serie->nom_serie] = $classes;
        }

        return view('parcourir.lycee')
            ->with('classes_groupes', $classes_groupes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function edit(Cycle $cycle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cycle $cycle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cycle $cycle)
    {
        //
    }

    public static function init() {
        if (Cycle::first()) {
            return;
        }

        foreach([
            'primaire' => 'primaire',
            'college' => 'collège',
            'lycee' => 'lycée',
        ] as $key => $value) {
            $new_cycle = new Cycle();
            $new_cycle->nom_cycle = $key;
            $new_cycle->nom_cycle_accentue = $value;
            $new_cycle->save();
        }
    }
}
