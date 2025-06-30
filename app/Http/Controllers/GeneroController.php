<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::all();

        return view('generos.index')->with('generos', $generos);
    }

    public function create()
    {
        $generos = Genero::all();

        return view('generos.create', compact('generos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string'
        ]);

        Genero::create([
            'nome' => $validated['nome']
        ]);

        return redirect()->route('generos.index')->with('sucesso', 'Genero criado com sucesso!');
    }

    public function show(String $id)
    {
        $genero = Genero::findOrFail($id);

        return view('generos.index')->with('genero', $genero);
    }

    public function edit(String $id)
    {
        $genero = Genero::findOrFail($id);

        return view('generos.edit')->with('genero', $genero);
    }

    public function update(Request $request, String $id)
    {
        $genero = Genero::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string'
        ]);

        $genero->nome = $validated['nome'];

        $genero->save();

        return redirect()->route('generos.index')->with('sucesso', 'Gênero editado com sucesso');
    }

    public function destroy(String $id)
    {
        $genero = Genero::findOrFail($id);

        $genero->delete();

        return redirect('generos.index')->with('sucesso', 'Gênero excluído com sucesso!');
    }
}
