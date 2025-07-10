<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;
use App\Models\Avaliacao;
use Illuminate\Support\Facades\Auth;

class AvaliacaoController extends Controller
{
    public function create()
{
    return view('avaliacoes.create', compact('emprestimo'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'emprestimo_id' => 'required|exists:emprestimos,id',
        'nota' => 'required|integer|min:1|max:5',
    ]);

    $emprestimo = Emprestimo::findOrFail($validated['emprestimo_id']);

    Avaliacao::create([
        'user_id' => Auth::id(),
        'livro_id' => $emprestimo->livro_id,
        'emprestimo_id' => $emprestimo->id,
        'nota' => $validated['nota'],
    ]);

    return redirect()->route('dashboard')->with('sucesso', 'Avaliação registrada com sucesso!');
}
}
