<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();

        return view('livros.index')->with('livros', $livros);
    }

    public function create()
    {
        $livros = Livro::all();

        return view('livros.create', compact('livros'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string',
            'autor' => 'required|string',
            'ano_de_lancamento' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id',
            'genero_id' => 'required|exists:genero,id',
            'status' => ''
        ]);

        Livro::create($validated);
    }

    public function show(String $id)
    {
        //
    }

    public function edit(String $id)
    {
        $livro = Livro::findOrFail();

        return view('livros.edit', compact('livros'));
    }

    public function update(Request $request, String $id)
    {
        //
    }

    public function destroy(String $id)
    {
        //
    }
}
