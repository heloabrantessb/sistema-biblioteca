<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Genero;
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
        $categorias = Categoria::all();
        $generos = Genero::all();

        return view('livros.create', compact('livros', 'categorias', 'generos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string',
            'autor' => 'required|string',
            'ano_de_lancamento' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'genero_id' => 'required|exists:generos,id',
            'status' => 'nullable|in:disponivel,reservado,indisponivel'
        ]);

        Livro::create([
            'titulo' => $validated['titulo'],
            'autor' => $validated['autor'],
            'ano_de_lancamento' => $validated['ano_de_lancamento'],
            'categoria_id' => $validated['categoria_id'],
            'genero_id' => $validated['genero_id'],
            'status' => $validated['status'] ?? 'disponivel'
        ]);

        return redirect()->route('livros.index')->with('sucesso', 'Livro cadastrado com sucesso!');
    }

    public function show(String $id)
    {
        $livro = Livro::findOrFail($id);

        return view('livros.show', compact('livro'));
    }

    public function edit(String $id)
    {
        $livro = Livro::findOrFail($id);
        $categorias = Categoria::all();
        $generos = Genero::all();

        return view('livros.edit', compact('livro', 'categorias', 'generos'));
    }

    public function update(Request $request, String $id)
    {
        $livro= Livro::findOrFail($id);

        $validated = $request->validate([
            'titulo' => 'required|string',
            'autor' => 'required|string',
            'ano_de_lancamento' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'genero_id' => 'required|exists:generos,id',
            'status' => 'nullable|in:disponivel,reservado,indisponivel'
        ]);

        $livro->titulo = $validated['titulo'];
        $livro->autor = $validated['autor'];
        $livro->ano_de_lancamento = $validated['ano_de_lancamento'];
        $livro->categoria_id= $validated['categoria_id'];
        $livro->genero_id= $validated['genero_id'];
        $livro->genero_id= $validated['status'];

        $livro->save();

        return redirect()->route('livros.index')->with('sucesso', 'Livro Editado com sucesso');

    }

    public function destroy(String $id)
    {
        $livro= Livro::findOrFail($id);

        $livro->delete;

        return redirect()->route('livros.index')->with('sucesso', 'Livro excluido com sucesso!');
    }
}
