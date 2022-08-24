<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    public function serie() {
        return $this->belongsTo(Serie::class);
    }

    public function cycle() {
        return $this->belongsTo(Cycle::class);
    }

    public function matieres() {
        return $this->hasMany(Matiere::class);
    }
}
