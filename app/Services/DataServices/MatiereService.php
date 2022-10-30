<?php

namespace App\Services\DataServices;

use App\Models\Matiere;

class MatiereService implements DataServiceInterface {

    public function __construct()
    {

    }

    public function init() {

    }


    public function store($inputs, $files=[]) {

    }

    public function find($id) {
        return Matiere::find($id);
    }

    public function all($constrains=[]) {
        $matieres = Matiere::all();
        foreach($constrains as $key => $value) {
            $matieres = $matieres->where($key, $value);
        }
        return $matieres;
    }

    // public function
}

