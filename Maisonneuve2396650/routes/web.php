<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DocumentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('/create/etudiant', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('/create/etudiant', [EtudiantController::class, 'store'])->name('etudiant.store');
Route::get('/edit/etudiant/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/etudiant/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('/etudiant/delete/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.destroy');


Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('documents', DocumentController::class)->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/forum', [ArticleController::class, 'index'])->name('forum.index');
    Route::get('/forum/create', [ArticleController::class, 'create'])->name('forum.create');
    Route::get('/forum/{article}', [ArticleController::class, 'show'])->name('forum.show');
    Route::post('/forum', [ArticleController::class, 'store'])->name('forum.store');
    Route::get('/forum/{article}/edit', [ArticleController::class, 'edit'])->name('forum.edit');
    Route::put('/forum/{article}', [ArticleController::class, 'update'])->name('forum.update');
    Route::delete('/forum/{article}', [ArticleController::class, 'destroy'])->name('forum.destroy');
});