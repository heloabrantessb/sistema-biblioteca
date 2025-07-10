<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        <aside class="w-64 bg-blue-900 text-white p-6">
            <h2 class="text-xl font-semibold mb-6">Empréstimos</h2>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('emprestimos.create') }}" class="block py-2 px-4 bg-sky-600 rounded hover:bg-sky-700">Conceder
                            Empréstimo</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('emprestimos.index') }}" class="block py-2 px-4 bg-sky-600 rounded hover:bg-sky-700">Pesquisar
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
        <div class="flex w-5/6 m-auto p-8 justify-between">
            <h1 class="text-3xl font-semibold">Lista de Empréstimos</h1>
        </div>

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
            <tbody>
                @foreach ($emprestimos as $emprestimo)
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="py-2 text-gray-900 text-center border">{{ $emprestimo->id }}</td>
                        <td class="px-4 w-60 border">{{ $emprestimo->livro->titulo }}</td>
                        <td class="px-4 w-60 border">{{ $emprestimo->data_inicio }}</td>
                        <td class="text-center border">{{ $emprestimo->data_fim_previsao }}</td>
                        <td class="text-center border">{{ $emprestimo->status }}</td>
                        <td class="w-40">
                            <a href="{{ route('emprestimos.devolucao', $emprestimo->id) }}"
                                class="text-white p-2 hover:bg-sky-700 bg-sky-500 rounded">Realizar Devolução
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    </div>
</x-app-layout>
