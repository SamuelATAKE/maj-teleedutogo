<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repetitorat extends Model
{
    use HasFactory;

    public function utilisateur() {
        return $this->belongsTo(Utilisateur::class);
    }

    public function contributeur() {
        return $this->belongsTo(Utilisateur::class);
    }

    public function matiere() {
        return $this->belongsTo(Matiere::class);
    }

    public function telechargements() {
        return $this->hasMany(Telechargement::class);
    }
}
