<?php

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


Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/connexion', function () {
    return view('auth.login');
})->name('connexion');

Route::get('/inscription', function () {
    return view('auth.register');
})->name('inscription');

Route::get('/deconnexion', [UtilisateurController::class, 'logout'])->name('logout');

Route::get('/recovering-email', function () {
    return view('auth.email');
})->name('check.email');

Route::get('/recovering-password', function () {
    return view('auth.password');
})->name('check.password');

Route::post('/register', [UtilisateurController::class, 'store'])->name('register');

Route::post('/login', [UtilisateurController::class, 'login'])->name('login');

Route::post('/checkemail', [UtilisateurController::class, 'emailcheck'])->name('checkemail');

Route::post('/passwordrecover', [UtilisateurController::class, 'passwordrecover'])->name('passwordrecover');

Route::get('/completer-info', [RoleController::class, 'create'])->name('completer_info')->middleware([\App\Http\Middleware\Login::class]);
Route::post('/informations', [RoleController::class, 'store'])->name('user.info')->middleware([\App\Http\Middleware\Login::class]);

// Admin part

Route::get('/admin', function(){
    return view('admin.index');
})->name('admin.index')->middleware([\App\Http\Middleware\Login::class]);

Route::get('/connexion-admin', function() {
    return view('auth.adminlogin');
})->name('admin.login');

Route::post('/connecting-admin', [UtilisateurController::class, 'loginadmin'])->name('login.admin');

// Admin - gestion ressources
Route::get('/admin/ressources/ajouter', [RessourceController::class, 'create'])->name('ressources.add')->middleware([\App\Http\Middleware\Login::class]);

Route::get('/admin/ressources', [RessourceController::class, 'index'])->name('ressources.index')->middleware([\App\Http\Middleware\Login::class]);

Route::post('/ressource/add', [RessourceController::class, 'store'])->name('ressource.add')->middleware([\App\Http\Middleware\Login::class]);
// Séries
Route::get('/admin/series', [SerieController::class, 'index'])->name('admin.series')->middleware([\App\Http\Middleware\Login::class]);

Route::get('/admin/series/ajouter', function(){
    return view('grades.ajouter_serie');
})->name('serie.create')->middleware([\App\Http\Middleware\Login::class]);

Route::post('/serie/add', [SerieController::class, 'store'])->name('serie.add')->middleware([\App\Http\Middleware\Login::class]);

// Cycles
Route::get('/admin/cycles', [CycleController::class, 'index'])->name('admin.cycles')->middleware([\App\Http\Middleware\Login::class]);

Route::get('/admin/cycles/ajouter', function(){
    return view('grades.ajouter_cycle');
})->name('cycle.create')->middleware([\App\Http\Middleware\Login::class]);

Route::post('/cycle/add', [CycleController::class, 'store'])->name('cycle.add')->middleware([\App\Http\Middleware\Login::class]);

// Classes
Route::get('/admin/classes', [ClasseController::class, 'index'])->name('admin.classes')->middleware([\App\Http\Middleware\Login::class]);

Route::get('/admin/classes/ajouter', [ClasseController::class, 'create'])->name('classe.create')->middleware([\App\Http\Middleware\Login::class]);

Route::post('/classe/add', [ClasseController::class, 'store'])->name('classe.add')->middleware([\App\Http\Middleware\Login::class]);

Route::get('/admin/editer-classe/{id}', [ClasseController::class, 'edit'])->name('classe.edit')->middleware([\App\Http\Middleware\Login::class]);

Route::put('/admin/classe/update/{id}', [ClasseController::class, 'update'])->name('classe.update')->middleware([\App\Http\Middleware\Login::class]);

// Matiere
Route::get('/admin/matieres', [MatiereController::class, 'index'])->name('admin.matieres')->middleware([\App\Http\Middleware\Login::class]);

Route::get('/admin/matieres/ajouter', [MatiereController::class, 'create'])->name('matiere.create')->middleware([\App\Http\Middleware\Login::class]);

Route::post('/matiere/add', [MatiereController::class, 'store'])->name('matiere.add')->middleware([\App\Http\Middleware\Login::class]);


//User - Parcourir
Route::get('/primaire', function () {
    return view('parcourir.primaire');
})->name('primaire');

Route::get('/college', function () {
    return view('parcourir.college');
})->name('college');

Route::get('/lycee', function () {
    return view('parcourir.lycee');
})->name('lycee');

Route::get('/{cycle}/{id}', [ClasseController::class, 'getMatieres'])->name('classe');

Route::get('/{cycle}/{classe}/{id}', [MatiereController::class, 'getRessources'])->name('matiere');

Route::get('/examens', function () {
    return view('parcourir.examens');
})->name('examens');

Route::get('/concours', function () {
    return view('parcourir.concours');
})->name('concours');

Route::get('/{exam}', [RessourceController::class, 'year'])->name('annee_examen');

Route::get('/concours/nom_exam', function () {
    return view('parcourir.annee_contenu');
})->name('annee_concours');

Route::get('/contribuer', function () {
    return view('forms.contribuer');
})->name('contribuer')->middleware([\App\Http\Middleware\Login::class]);

