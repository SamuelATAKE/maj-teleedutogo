<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* ****AUTH**** */

// User

Route::middleware(['guest:web'])->group(function() {

    Route::get('/connexion', function () {
        return view('auth.login');
    })->name('connexion');
    Route::post('/login', [UtilisateurController::class, 'login'])->name('login');

    Route::get('/inscription', function () {
        return view('auth.register');
    })->name('inscription');
    Route::post('/register', [UtilisateurController::class, 'store'])->name('register');

});

//Admin

Route::middleware(['guest:admin'])->group(function() {
    Route::get('/connexion-admin', [AdminController::class, 'create'])->name('admin.login');
    Route::post('/connecting-admin', [UtilisateurController::class, 'loginadmin'])->name('login.admin');
});


/* ****ACTIONS**** */

// User

require __DIR__.'/profils/user.php';

// Admin

require __DIR__.'/profils/admin.php';

