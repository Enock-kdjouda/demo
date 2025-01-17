<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    return view('welcome');

});

Route::get('etudiants/create',[EtudiantController::class,'create'])->name('etudiants.create');

Route::post('etudiants',[EtudiantController::class,'store'])->name('etudiants.store');


Route::get('etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');


Route::get('etudiants/{id}/edit', [EtudiantController::class, 'edit'])->name('etudiants.edit');

Route::put('etudiants/{id}', [EtudiantController::class, 'update'])->name('etudiants.update');

Route::delete('etudiants/{id}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');

Route::get('etudiants/filiere/{code}', [EtudiantController::class, 'byCodeFiliere'])->name('etudiants.filiere');
