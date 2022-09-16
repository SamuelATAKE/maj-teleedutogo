<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('parcourir/primaire', [CycleController::class, 'showPrimaire'])->name('primaire');

Route::get('parcourir/college', [CycleController::class, 'showCollege'])->name('college');

Route::get('parcourir/lycee', [CycleController::class, 'showLycee'])->name('lycee');

Route::get('parcourir/{nom_cycle}/{fullname_classe}', [ClasseController::class, 'show'])->name('classe');

Route::get('parcourir/{cycle}/{classe}/{id}', [MatiereController::class, 'getRessources'])->name('matiere');

Route::get('/examens', function () {
    return view('parcourir.examens');
})->name('examens');

Route::get('/concours', function () {
    return view('parcourir.concours');
})->name('concours');

Route::get('examen/{exam}', [RessourceController::class, 'year'])->name('annee_examen');

Route::get('/concours/nom_exam', function () {
    return view('parcourir.annee_contenu');
})->name('annee_concours');


Route::middleware(['auth:web'])->group(function() {
    Route::get('/contribuer', function () {
        return view('forms.contribuer');
    })->name('contribuer');

    Route::post('/checkemail', [UserController::class, 'emailcheck'])->name('checkemail');

    Route::get('/recovering-email', function () {
        return view('auth.email');
    })->name('check.email');

    Route::get('/recovering-password', function () {
        return view('auth.password');
    })->name('check.password');
    Route::post('/passwordrecover', [UserController::class, 'passwordrecover'])->name('passwordrecover');

    Route::get('/completer-info', [RoleController::class, 'create'])->name('completer_info');
    Route::post('/informations', [RoleController::class, 'store'])->name('user.info');

    Route::get('/deconnexion', [UserController::class, 'logout'])->name('logout');

});
