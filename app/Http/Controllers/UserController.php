<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function adminDashboard()
    {
        return view('dashboards.admin');
    }

    public function bibliotecarioDashboard()
    {
        return view('dashboards.bibliotecario');
    }

    public function alunoDashboard()
    {
        return view('dashboards.aluno');
    }

    public function professorDashboard()
    {
        return view('dashboards.professor');
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $user = Auth::user();
        $role = $user->role;

        $rolesPermissao = match ($role) {
            'admin' => ['admin', 'bibliotecario', 'professor', 'aluno'],
            'bibliotecario' => ['professor', 'aluno']
        };

        return view('users.create', compact('rolesPermissao'));
    }

    public function store(Request $request)
    {
        // dd($request->all()); 

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'cpf' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'role' => 'required|in:admin,bibliotecario,professor,aluno',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'sobrenome' => $validated['sobrenome'],
            'cpf' => $validated['cpf'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => $validated['password']
        ]);

        if (!$user) {
            return back()->with('erro', 'Erro ao criar usuário.');
        }

        return redirect()->route('users.index')->with('sucesso', 'Usuário criado com sucesso!');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
