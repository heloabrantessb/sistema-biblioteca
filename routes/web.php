<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])
    ->get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware('role:admin')->get('/admin/dashboard', [UserController::class, 'adminDashboard'])
        ->name('admin.dashboard');
    Route::middleware('role:bibliotecario')->get('/bibliotecario/dashboard', [UserController::class, 'bibliotecarioDashboard'])
        ->name('bibliotecario.dashboard');
    Route::middleware('role:professor')->get('/professor/dashboard', [UserController::class, 'professorDashboard'])
        ->name('professor.dashboard');
    Route::middleware('role:aluno')->get('/aluno/dashboard', [UserController::class, 'alunoDashboard'])
        ->name('aluno.dashboard');
});

//rotas do breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
