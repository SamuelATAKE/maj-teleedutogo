<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repetitorat extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function matieres() {
        return $this->hasMany(Matiere::class);
    }

    public function telechargements() {
        return $this->hasMany(Telechargement::class);
    }
}
