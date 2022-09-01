<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    use HasFactory;

    public function contributeur() {
        return $this->belongsTo(User::class);
    }

    public function matiere() {
        return $this->belongsTo(Matiere::class);
    }

    public function telechargements() {
        return $this->hasMany(Telechargement::class);
    }
}
