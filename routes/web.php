<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerfumeController;
use Illuminate\Support\Facades\Route;

// Ruta pública (para usuarios no autenticados)
Route::get('/', [PerfumeController::class, 'indexPublic'])->name('welcome');
// Ruta de dashboard (para usuarios autenticados)
Route::get('/dashboard', [PerfumeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de gestión de perfumes (protegidas por autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/perfumes/create', [PerfumeController::class, 'create'])->name('dashboard.perfumes.create');
    Route::post('/dashboard/perfumes', [PerfumeController::class, 'store'])->name('dashboard.perfumes.store');
    Route::get('/dashboard/perfumes/{perfume}/edit', [PerfumeController::class, 'edit'])->name('dashboard.perfumes.edit');
    Route::put('/dashboard/perfumes/{perfume}', [PerfumeController::class, 'update'])->name('dashboard.perfumes.update');
    Route::delete('/dashboard/perfumes/{perfume}', [PerfumeController::class, 'destroy'])->name('dashboard.perfumes.destroy');
});

// Rutas de autenticación (perfil, etc.)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';    
