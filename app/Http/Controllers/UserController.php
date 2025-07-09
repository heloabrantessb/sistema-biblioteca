<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    public function usuarioDashboard()
    {
        $emprestimos = Auth::user()->emprestimos()
            ->with('livro')
            ->latest()
            ->get();
            
        return view('dashboards.usuario', compact('emprestimos'));
    }

    public function index(Request $request)
    {
        $users = collect();

        if ($request->filled('cpf')) {
            $validated = $request->validate([
                'cpf' => 'required|string'
            ]);

            $users = User::where('cpf', $validated['cpf'])->get();

            if ($users->isEmpty()) {
                return view('users.index', [
                    'users' => $users,
                    'mensagem' => 'Nenhum usuário encontrado com esse CPF.'
                ]);
            }
        }

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $role = Auth::user()->role->funcao;

        $rolesPermissao = match ($role) {
            'administrador' => ['administrador', 'bibliotecario', 'usuario'],
            'bibliotecario' => ['usuario']
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
            'email' => 'required|string',
            'role' => 'required|exists:roles,id',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $role = Role::where('funcao', $validated['role'])->first();

        $user = User::create([
            'name' => $validated['name'],
            'sobrenome' => $validated['sobrenome'],
            'cpf' => $validated['cpf'],
            'email' => $validated['email'],
            'role_id' => $validated['role'],
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
        $role = Auth::user()->role->funcao;

        $rolesPermissao = match ($role) {
            'administrador' => ['administrador', 'bibliotecario', 'usuario'],
            'bibliotecario' => ['usuario']
        };

        $user = User::findOrFail($id);

        return view('users.edit', compact('user', 'rolesPermissao'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'cpf' => 'required|string',
            'email' => 'required|string',
            'role' => 'required|exists:roles,id',
            // 'password' => 'required|string|min:8|confirmed'
        ]);

        $user->name = $validated['name'];
        $user->sobrenome = $validated['sobrenome'];
        $user->cpf = $validated['cpf'];
        $user->email = $validated['email'];
        $user->role_id = $validated['role'];

        $user->save();

        return redirect()->route('users.index')->with('sucesso', 'Usuário editada com sucesso!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')->with('sucesso', 'Usuário excluída com sucesso!');
    }
}
