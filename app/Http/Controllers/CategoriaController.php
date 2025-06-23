<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();

        return view('categorias.index')->with('categorias', $categorias);
    }

    public function create()
    {
        $categorias = Categoria::all();

        return view('categorias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string'
        ]);

        Categoria::create([
            'nome' => $validated['nome']
        ]);

        return redirect()->route('categorias.index')->with('sucesso', 'Categoria criada com sucesso!');
    }

    public function show(String $id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('categorias.show')->with('categoria', $categoria);
    }

    public function edit(String $id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('categorias.edit')->with('categoria', $categoria);
    }

    public function update(Request $request, String $id)
    {
        $categoria = Categoria::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string'
        ]);

        $categoria->nome = $validated['nome'];

        $categoria->save();

        return redirect()->route('categorias.index')->with('sucesso', 'Categoria editada com sucesso!');
    }

    public function destroy(String $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        return redirect()->route('categorias.index')->with('sucesso', 'Categoria excluída com sucesso!');
        
    }
}
