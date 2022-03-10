<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TacheController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/dashboard/about', function () {
    return view('about');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TacheController::class, 'index'])->name('dashboard');//pour lister les taches
    Route::get('/dashboard/taches/create', [TacheController::class, 'create'])->name('dashboard.create');//pour afficher le formulaire creer une nouvelle tache
    Route::post('/dashboard/taches/create', [TacheController::class, 'store'])->name('dashboard.store');//pour sauvegarder la tache dans la bd
    Route::get('/dashboard/taches/{id}', [TacheController::class, 'show'])->name('dashboard.taches.show');//pour recuperer une seule tache
//});
