<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        Bem-vindo, {{ Auth::user()->name }}!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-6xl mx-auto mt-2">
        <h2 class="text-2xl font-bold mb-6">Histórico de Empréstimos</h2>

        @if ($emprestimos->isEmpty())
            <p>Você ainda não fez nenhum empréstimo.</p>
        @else
            <table class="w-full table-auto border border-gray-300">
                <thead class="bg-blue-800 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Título</th>
                        <th class="px-4 py-2 text-left">Data do Empréstimo</th>
                        <th class="px-4 py-2 text-left">Data da Devolução</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Avaliação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($emprestimos as $emprestimo)
                        <tr class="border-t border-gray-300">
                            <td class="px-4 py-2">{{ $emprestimo->livro->titulo }}</td>
                            <td class="px-4 py-2">{{ $emprestimo->data_inicio }}</td>
                            <td>{{ $emprestimo->data_fim_real }}</td>
                            <td class="px-4 py-2">
                                {{ $emprestimo->status }}
                            </td>
                            <td class="px-4 py-2">
                                @if ($emprestimo->status === 'devolvido')
                                    @if ($emprestimo->livro->avaliacoes->where('user_id', auth()->id())->count())
                                        <span class="text-green-600">Avaliado</span>
                                    @else
                                        <a href="{{ route('avaliacoes.create', $emprestimo->livro->id) }}"
                                            class="text-blue-600 underline">Avaliar</a>
                                    @endif
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
