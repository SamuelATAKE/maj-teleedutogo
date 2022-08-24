<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function repetitorat() {
        return $this->hasOne(Repetitorat::class);
    }

    public function ressources() {
        return $this->hasMany(Utilisateur::class);
    }

    public function telechargements() {
        return $this->hasMany(Telechargement::class);
    }
}
