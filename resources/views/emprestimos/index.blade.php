<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        <aside class="w-64 bg-blue-900 text-white p-6">
            <h2 class="text-xl font-semibold mb-6">Empréstimos</h2>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('emprestimos.create') }}" class="block py-2 px-4 bg-sky-600 rounded">Conceder
                            Empréstimo</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('dashboard') }}" class="block py-2 px-4 bg-gray-500 rounded">Voltar ao
                            inicio</a>
                    </li>
                </ul>
            </nav>
        </aside>
        <main class="overflow-x-auto rounded-xl border shadow-sm bg-card w-full p-12 pb-6 min-h-screen">
            @if (session('sucesso'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('sucesso') }}
                </div>
            @endif
            <form action="{{ route('emprestimos.buscarEmprestimoPorCpf') }}" method="GET" class="flex gap-2 mb-6">
                <input type="text" name="cpf" placeholder="Informe o CPF do usuário" required
                    class="flex-grow border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Buscar
                </button>
            </form>
            <table class="w-5/6 border m-auto shadow rounded text-left">
                <thead class="uppercase text-white bg-blue-800 border border-gray-200">
                    <tr class="">
                        <th scope="col" class="px-6 py-3">Id</th>
                        <th scope="col" class="border px-6 py-3">Titulo do livro</th>
                        <th scope="col" class="border px-6 py-3">Data de Inicio</th>
                        <th scope="col" class="border px-6 py-3">Previsão de devolução</th>
                        <th scope="col" class="border px-6 py-3">Status</th>
                        <th scope="col" class="border px-6 py-3 text-center">Ações</th>
                    </tr>
                </thead>
                @if (isset($emprestimos) && $emprestimos->count() > 0)
                    <tbody>
                        @foreach ($emprestimos as $emprestimo)
                            <tr class="odd:bg-white even:bg-gray-200">
                                <td class="py-2 text-gray-900 text-center border">{{ $emprestimo->id }}</td>
                                <td class="px-4 w-60">{{ $emprestimo->livro->titulo }}</td>
                                <td class="px-4 w-60">{{ $emprestimo->data_inicio }}</td>
                                <td class="text-center border">{{ $emprestimo->data_fim_previsao }}</td>
                                <td class="text-center border">{{ $emprestimo->status }}</td>
                                <td class="w-40">
                                    <a href="{{ route('emprestimos.devolucao', $emprestimo->id) }}"
                                        class="flex gap-4 px-4 text-blue-900 hover:text-blue-700">Realizar Devolução
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        @elseif(isset($emprestimos))
            <p class="text-center text-gray-600">Nenhum empréstimo encontrado.</p>
            @endif
    </div>
</x-app-layout>
