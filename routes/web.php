<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AvaliacaoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified', 'funcao:administrador'])->group(function () {
    Route::resource('generos', GeneroController::class);
    Route::resource('categorias', CategoriaController::class);
});

Route::middleware(['auth', 'verified', 'funcao:bibliotecario'])->group(function () {
    Route::resource('livros', LivroController::class);
    Route::resource('emprestimos', EmprestimoController::class);
    Route::get('devolucaoForms', [EmprestimoController::class, 'formularioDevolucao'])->name('emprestimos.devolucaoForms');
    Route::get('buscarEmprestimo', [EmprestimoController::class, 'buscarEmprestimoPorCpf'])->name('emprestimos.buscarEmprestimoPorCpf');
    Route::get('devolucao/{id}', [EmprestimoController::class, 'devolucao'])->name('emprestimos.devolucao');
    Route::get('teste', [EmprestimoController::class, 'teste'])->name('emprestimos.teste');
});

Route::middleware(['auth', 'verified', 'funcao:bibliotecario,administrador'])->group(function () {
    Route::resource('users', UserController::class);
    Route::get('buscarUsuario', [UserController::class, 'buscarPorCpf'])->name('users.buscarPorCpf');
});

Route::middleware(['auth', 'verified', 'funcao:usuario'])->group(function () {
    Route::get('/avaliar/{emprestimo}', [AvaliacaoController::class, 'formulario'])
        ->name('avaliacoes.form');
});


//Rotas para dashboard
Route::middleware(['auth', 'verified'])
    ->get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware('funcao:administrador')->get('/admin/dashboard', [UserController::class, 'adminDashboard'])
        ->name('admin.dashboard');
    Route::middleware('funcao:bibliotecario')->get('/bibliotecario/dashboard', [UserController::class, 'bibliotecarioDashboard'])
        ->name('bibliotecario.dashboard');
    Route::middleware('funcao:usuario')->get('/usuario/dashboard', [UserController::class, 'usuarioDashboard'])
        ->name('usuario.dashboard');

});

//rotas do breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
