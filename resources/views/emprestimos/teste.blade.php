<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-800 text-white p-6">
            <h2 class="text-xl font-semibold mb-6">Administrador</h2>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="#" class="block py-2 px-4 bg-blue-700 rounded">Pesquisar Empréstimos</a>
                    </li>
                    <!-- Outras opções do menu -->
                </ul>
            </nav>
        </aside>

        <!-- Conteúdo principal -->
        <main class="flex-1 p-8">
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
                <h1 class="text-2xl font-semibold mb-6">Pesquisar Empréstimos</h1>

                <!-- Formulário de busca -->
                <form action="{{ route('emprestimos.buscarEmprestimoPorCpf') }}" method="GET" class="flex gap-2 mb-6">
                    <input
                        type="text"
                        name="cpf"
                        placeholder="Informe o CPF do usuário..."
                        required
                        class="flex-grow border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Buscar
                    </button>
                </form>

                <!-- Resultados da busca (exemplo) -->
                @if(isset($emprestimos) && $emprestimos->count() > 0)
                    <table class="w-full table-auto border-collapse border border-gray-300">
                        <thead class="bg-blue-800 text-white">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Livro</th>
                                <th class="border border-gray-300 px-4 py-2">Data Início</th>
                                <th class="border border-gray-300 px-4 py-2">Previsão Devolução</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                                <th class="border border-gray-300 px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emprestimos as $emprestimo)
                                <tr class="odd:bg-white even:bg-gray-100">
                                    <td class="border border-gray-300 px-4 py-2">{{ $emprestimo->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $emprestimo->livro->titulo }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($emprestimo->data_inicio)->format('d/m/Y') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($emprestimo->data_fim_previsao)->format('d/m/Y') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $emprestimo->status }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('emprestimos.devolucao', $emprestimo->id) }}"
                                           class="text-blue-600 hover:underline">
                                           Devolver
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
        </main>
    </div>
</x-app-layout>
