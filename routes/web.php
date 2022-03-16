<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StatuController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TemplateController;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/index', function () {
    return view('index');
});*/

Route::get('/dashboard/about', function () {
    return view('about');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', [LogoutController::class,'perform'])->name('logout.perform');
 });

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TemplateController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/users-profile', [UserController::class, 'index'])->name('users-profil');
    Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/dashboard/about', [AboutController::class, 'index'])->name('about');


    //Route::get('/dashboard', [TacheController::class, 'index'])->name('dashboard');//pour lister les taches
    Route::get('/dashboard/taches/create', [TacheController::class, 'create'])->name('dashboard.create');//pour afficher le formulaire creer une nouvelle tache
    Route::post('/dashboard/taches/create', [TacheController::class, 'store'])->name('dashboard.store');//pour sauvegarder la tache dans la bd
    Route::get('/dashboard/taches/{id}', [TacheController::class, 'show'])->name('dashboard.taches.show');//pour recuperer une seule tache
    Route::get('/dashboard/taches/edit/{id}', [TacheController::class, 'edit'])->name('dashboard.edit');//pour afficher le formulaire de modification
    Route::put('/dashboard/taches/{id}', [TacheController::class, 'update'])->name('dashboard.update');//pour modifier la tache
    Route::delete('/dashboard/taches/delete/{id}', [TacheController::class, 'destroy'])->name('dashboard.destroy');//pour supprimer une tache

    Route::get('/dashboard/rubrique/create', [StatuController::class, 'create'])->name('rubrique.create');//pour afficher le formulaire creer une nouvelle rubrique
    Route::post('/dashboard/rubrique/create', [StatuController::class, 'store'])->name('rubrique.store');//pour sauvegarder la tache dans la bd
});
