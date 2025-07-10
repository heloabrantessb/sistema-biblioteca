<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class EmprestimoController extends Controller
{
    public function index()
    {
        return view('emprestimos.index');
    }

    public function create()
    {
        return view('emprestimos.create');
    }
    public function teste()
    {
        return view('emprestimos.teste');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'usuario' => 'required|string',
            'livro_id' => 'required|exists:livros,id',
            'data_fim_previsao' => 'nullable|date'
        ]);

        $user = User::where('cpf', $validated['usuario'])->first();
        if (!$user) {
            return back()->withErrors(['usuario' => 'Usuário não encontrado']);
        }

        if (!$validated['livro_id']) {
            return back()->withErrors(['livro_id' => 'Livro não encontrado']);
        }

        if ($validated['livro_id'] === 'indisponivel' || $validated['livro_id'] === 'reservado') {
            return back()->withErrors(['livro_id' => 'O livro não está disponivel para empréstimos no momento!']);
        }

        $dataInicio = now();
        $status = 'ativo';

        Emprestimo::create([
            'user_id' => $user->id,
            'livro_id' => $validated['livro_id'],
            'data_inicio' => $dataInicio,
            'data_fim_previsao' => $validated['data_fim_previsao'],
            'data_fim_real' => null,
            'status' => $status
        ]);

        return redirect()->route('emprestimos.index')->with('sucesso', 'Empréstimo registrado com sucesso.');
    }

    public function formularioDevolucao()
    {
        return view('emprestimos.devolucaoForms');
    }

    public function buscarEmprestimoPorCpf(Request $request)
    {
        $validated = $request->validate([
            'cpf' => 'required|string'
        ]);

        $user = User::where('cpf', $validated['cpf'])->first();

        if (!$user) {
            return back()->with('erro', 'Usuário não encontrado.');
        }

        // busca os empréstimos do user
        $emprestimos = Emprestimo::with('livro')
            ->where('user_id', $user->id)->get();

        return view('emprestimos.lista', compact('user', 'emprestimos'));
    }

    public function devolucao(String $id)
    {
        $emprestimo = Emprestimo::findOrFail($id);

        $emprestimo->update([
            'status' => 'finalizado',
            'data_fim_real' => now(),
        ]);

        $pdf = Pdf::loadView('pdf.comprovante', [
            'emprestimo' => $emprestimo,
            'usuario' => $emprestimo->user,
            'livro' => $emprestimo->livro,
        ]);

        // dd($pdf->output());

        $filename = 'comprovante_' . $emprestimo->id . '.pdf';
        Storage::disk('public')->put('comprovantes/' . $filename, $pdf->output());  

        $emprestimo->comprovante()->updateOrCreate(
            ['emprestimo_id' => $emprestimo->id],
            ['arquivo' => $filename]
        );

        return redirect()->route('emprestimos.index')
            ->with('sucesso', 'Livro devolvido e comprovante gerado com sucesso.');
    }

    public function show(Emprestimo $emprestimo) {}

    public function edit(Emprestimo $emprestimo)
    {
        //
    }

    public function update(Request $request, Emprestimo $emprestimo)
    {
        //
    }

    public function destroy(Emprestimo $emprestimo)
    {
        //
    }
}
