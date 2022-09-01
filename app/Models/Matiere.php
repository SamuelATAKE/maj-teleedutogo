<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    public function classe() {
        return $this->belongsTo(Classe::class);
    }

    public function repetitorat() {
        return $this->belongsTo(Repetitorat::class);
    }

    public function ressources() {
        return $this->hasMany(Ressource::class);
    }
}
