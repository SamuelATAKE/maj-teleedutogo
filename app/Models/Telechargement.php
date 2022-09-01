<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telechargement extends Model
{
    use HasFactory;

    public function ressource() {
        return $this->belongsTo(Ressource::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
