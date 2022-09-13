<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admin'])->group(function() {

    Route::get('/admin', function(){
        return view('admin.index');
    })->name('admin.index');

    // Admin - gestion ressources
    Route::get('/admin/ressources/nouveau', [RessourceController::class, 'create'])->name('ressources.add');

    Route::get('/admin/ressources', [RessourceController::class, 'index'])->name('ressources.index');

    Route::post('/admin/ressource/store', [RessourceController::class, 'store'])->name('ressource.add');
    // Séries
    Route::get('/admin/series', [SerieController::class, 'index'])->name('admin.series');

    Route::get('/admin/series/nouveau', function() {
        return view('admin.series.ajouter_serie');
    })->name('serie.create');

    Route::post('/admin/serie/store', [SerieController::class, 'store'])->name('serie.add');

    // Cycles
    Route::get('/admin/cycles', [CycleController::class, 'index'])->name('admin.cycles');

    Route::get('/admin/cycles/ajouter', function(){
        return view('admin.cycles.ajouter_cycle');
    })->name('cycle.create');

    Route::post('/cycle/add', [CycleController::class, 'store'])->name('cycle.add');

    // Classes
    Route::get('/admin/classes', [ClasseController::class, 'index'])->name('admin.classes');

    Route::get('/admin/classes/ajouter', [ClasseController::class, 'create'])->name('classe.create');

    Route::post('/classe/add', [ClasseController::class, 'store'])->name('classe.add');

    Route::get('/admin/editer-classe/{id}', [ClasseController::class, 'edit'])->name('classe.edit');

    Route::put('/admin/classe/update/{id}', [ClasseController::class, 'update'])->name('classe.update');

    // Matiere
    Route::get('/admin/matieres', [MatiereController::class, 'index'])->name('admin.matieres');

    Route::get('/admin/matieres/ajouter', [MatiereController::class, 'create'])->name('matiere.create');

    Route::post('/matiere/add', [MatiereController::class, 'store'])->name('matiere.add');

});



