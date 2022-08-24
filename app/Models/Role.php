<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function utilisateur() {
        return $this->belongsTo(Utilisateur::class);
    }

    public function classe() {
        return $this->belongsTo(Classe::class);
    }

    public function matiere() {
        return $this->belongsTo(Matiere::class);
    }

    public function utilisateurs() {
        return $this->belongsTo(Utilisateur::class);
    }
}
