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
            @if (session('erro'))
                <div class="bg-red-100 border text-red-700 p-2 rounded">
                    {{ session('erro') }}
                </div>
            @endif
            <div class="flex w-5/6 m-auto p-8 justify-between">
                <h1 class="text-3xl font-semibold">Lista de Livros</h1>

                <a href="{{ route('livros.create') }}"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white p-2 rounded">Adicionar Livro</a>
            </div>

            <table class="w-5/6 border m-auto shadow rounded text-left">
                <thead class="uppercase text-white bg-blue-800 border border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">Id</th>
                        <th scope="col" class="border px-6 py-3">Titulo</th>
                        <th scope="col" class="border px-6 py-3">Autor</th>
                        <th scope="col" class="border px-6 py-3">Ano de lançamento</th>
                        <th scope="col" class="border px-6 py-3">Categoria</th>
                        <th scope="col" class="border px-6 py-3">Genero</th>
                        <th scope="col" class="border px-6 py-3">Disponibilidade</th>
                        <th scope="col" class="border px-6 py-3 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livros as $livro)
                        <tr class="odd:bg-white even:bg-gray-200">
                            <td class="py-2 text-gray-900 text-center border">{{ $livro->id }}</td>
                            <td class="px-4 w-60">{{ $livro->titulo }}</td>
                            <td class="text-center border">{{ $livro->autor }}</td>
                            <td class="text-center">{{ $livro->ano_de_lancamento }}</td>
                            <td class="px-4 border w-40">{{ $livro->categoria->nome }}</td>
                            <td class="px-4 border w-40">{{ $livro->genero->nome }}</td>
                            <td class="px-4 border w-40">{{ $livro->status }}</span></td>
                            <td class="w-40">
                                <a href="{{ route('livros.show', $livro->id) }}"
                                    class="flex gap-4 px-4 text-blue-900 hover:text-blue-700"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                        <path fill-rule="evenodd"
                                            d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                            clip-rule="evenodd" />
                                    </svg>Visualizar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ url('/dashboard') }}"
                class="bg-gray-400 text-neutral-200 font-semibold p-2 mt-8 rounded">Voltar</a>
        </main>
</x-app-layout>
