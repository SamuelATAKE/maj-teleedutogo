<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    /**
     * Get the classe full name (nom + serie).
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->nom.($this->serie != null ? $this->serie->nom_serie : ''),
        );
    }

    /**
     * Get the classe full name (nom_accentué + serie).
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function fullNameAccentue(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->nom_accentue.($this->serie != null ? $this->serie->nom_serie : ''),
        );
    }
}
