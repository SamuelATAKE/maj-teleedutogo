<?php

namespace App\Services\DataServices;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminService implements DataServiceInterface {

    public function __construct()
    {

    }

    public function init() {
        $first_admin = Admin::first();
        if ($first_admin) {
            return true;
        }
        $new_admin = new Admin();
        $new_admin->firstname = 'admin';
        $new_admin->lastname = 'DEFAULT';
        $new_admin->email = 'defaultedu@gmail.com';
        $new_admin->password = Hash::make('@TeleEduTogo2022');
        $new_admin->save();
        return true;
    }


    public function store($inputs, $files=[]) {

    }

    public function find($id) {

    }

    public function all($constrains=[]) {

    }
}

