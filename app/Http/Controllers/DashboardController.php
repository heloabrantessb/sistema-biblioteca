<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): RedirectResponse
    {
        $user = Auth::user();

        switch ($user->role->funcao) {
            case 'administrador':
                return redirect()->route('admin.dashboard');
            case 'bibliotecario':
                return redirect()->route('bibliotecario.dashboard');
            case 'professor':
                return redirect()->route('professor.dashboard');
            case 'aluno':
                return redirect()->route('aluno.dashboard');
            default:
                abort(403, 'Função de usuário não reconhecida.');
        }
    }
}
