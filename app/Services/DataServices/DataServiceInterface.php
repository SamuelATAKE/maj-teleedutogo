<?php

namespace App\Services\DataServices;

interface DataServiceInterface {
    public function store($inputs);
    public function get($id);
}

