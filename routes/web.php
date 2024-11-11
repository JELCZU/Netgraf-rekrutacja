<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PetController::class, 'showHome'])->name('home');
Route::get('/pets', [PetController::class, 'showPets'])->name('pets');
Route::get('/pet',[  PetController::class, 'showPet'])->name('pet');
Route::delete('/pets/{id}', [PetController::class, 'deletePet'])->name('petDelete');

