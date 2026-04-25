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

    Route::get("/libros", [\App\Http\Controllers\LibroController::class, "index"])->name("libros.index");
    Route::get("/libros/crear", [\App\Http\Controllers\LibroController::class, "create"])->name("libros.create");
    Route::post("/libros", [\App\Http\Controllers\LibroController::class, "store"])->name("libros.store");
    Route::get("/libros/{id}", [\App\Http\Controllers\LibroController::class, "show"])->name("libros.show");
    Route::get("/libros/{id}/editar", [\App\Http\Controllers\LibroController::class, "edit"])->name("libros.edit");
    Route::put("/libros/{id}", [\App\Http\Controllers\LibroController::class, "update"])->name("libros.update");
    Route::delete("/libros/{id}", [\App\Http\Controllers\LibroController::class, "destroy"])->name("libros.destroy");
    Route::post("/libros/{id}/valorar", [\App\Http\Controllers\LibroController::class, "valorar"])->name("libros.valorar");

});
