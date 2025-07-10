<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        <aside class="w-64 bg-blue-900 text-white p-6">
            <h2 class="text-xl font-semibold mb-6">Gêneros Literários</h2>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('generos.create') }}" class="block py-2 px-4 bg-sky-600 hover:bg-sky-700 rounded">Adicionar
                            Gênero Literário</a>
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
                <div class="bg-green-100 border text-green-700 p-2 rounded">
                    {{ session('sucesso') }}
                </div>
            @endif

            @if (session('erro'))
                <div class="bg-red-100 border text-red-700 p-2 rounded">
                    {{ session('erro') }}
                </div>
            @endif

            <div class=" items-center justify-between m-auto pb-4 w-1/3 align-center">
                <h1 class="text-2xl font-semibold text-gray-800">Lista de Gêneros Literários</h1>
            </div>


            <table class="w-auto text-left table-auto rounded-3xl shadow-xl m-auto">
                <thead class="bg-blue-800 text-white uppercase w-auto">
                    <tr>
                        <th class="px-6 py-3">Id</th>
                        <th class="px-6 py-3">Nome</th>
                        <th class="px-6 py-3 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($generos as $genero)
                        <tr class="odd:bg-white even:bg-gray-50 hover:bg-sky-100">
                            <td class="px-6 py-4 font-medium">{{ $genero->id }}</td>
                            <td class="px-6 py-4">{{ $genero->nome }}</td>
                            <td class="px-6 py-4 text-center flex justify-center w-auto gap-8">
                                {{-- Botão de Editar --}}
                                <a href="{{ route('generos.edit', $genero->id) }}" class="flex"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                    Editar
                                </a>
                                {{-- Botão de Excluir --}}
                                <form action="{{ route('generos.destroy', $genero->id) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja excluir essa Categoria?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex"><svg xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="size-6 text-red-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>
</x-app-layout>
