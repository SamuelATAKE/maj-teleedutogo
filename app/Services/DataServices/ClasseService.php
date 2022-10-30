<?php

namespace App\Services\DataServices;

use App\Models\Classe;

class ClasseService implements DataServiceInterface {

    public function __construct()
    {

    }

    public function init() {

    }

    public function store($inputs, $files=[]) {

    }

    public function find($id) {

    }

    public function all($constrains=[]) {
        $classes = Classe::all();
        foreach($constrains as $key => $value) {
            $classes = $classes->where($key, $value);
        }
        return $classes;
    }

    public function getIdInfoAssociation() {
        $association = [];
        foreach($this->all() as $classe) {
            $association[$classe->id] = $classe->toArray();
        }
        return $association;
    }
}

