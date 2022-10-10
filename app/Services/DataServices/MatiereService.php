<?php

namespace App\Services\DataServices;

use App\Models\Matiere;

class MatiereService implements DataServiceInterface {

    public function __construct()
    {

    }

    public function store($inputs, $files=[]) {

    }

    public function get($id) {
        return Matiere::find($id);
    }
}

