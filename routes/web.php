<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\UserController;

Route::middleware("auth")->group(function(){

    Route::get("/usuarios", [UserController::class, "usuarios"]);

    Route::get("/usuarios/crear", [UserController::class, "crear"]);

    Route::get("/usuarios/{id}", [UserController::class, "buscar"]);

    Route::get("/usuarios/{id}/editar", [UserController::class, "buscarEditar"]);

    Route::post("/usuarios", [UserController::class, "almacenar"]);

    Route::delete("/usuarios/{id}", [UserController::class, "borrar"]);

    Route::put("/usuarios/{id}", [UserController::class, "modificar"]);

});
