<?php

namespace App\Services\DataServices;

interface DataServiceInterface {
    public function init();
    public function store($inputs, $files=[]);
    public function find($id);
    public function all($constrains=[]);
}

