<?php

namespace App\Services\DataServices;

use Illuminate\Http\Request;

class RessourceService implements DataServiceInterface {

    public function validateStoreRequest(Request $request) {
        $request->validate([
            'ressource' => 'required',
            'matiere' => 'required',
            'type' => 'required',
        ]);
    }

    public function store($inputs)
    {
        //  = new Ressource;

        // $ressource->nom_ressource = $path;
        // // $ressource->contributeur = request('contributeur');
        // $ressource->contributeur_id = 1;
        // $ressource->matiere_id = request('matiere');
        // $ressource->type = request('type');
        // $ressource->etablissement = request('etablissement');
        // $ressource->annee = request('annee');
        // $ressource->chapitre = request('chapitre');
        // $ressource->description = request('description');
        // // dd($ressource);
        // $ressource->save();
    }

    public function get($id)
    {

    }
}
