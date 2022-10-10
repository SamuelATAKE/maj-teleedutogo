<?php

namespace App\Services\DataServices;

interface DataServiceInterface {
    public function store($inputs, $files=[]);
    public function get($id);
}

