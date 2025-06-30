<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
<x-app-layout>
    <main class="overflow-x-auto rounded-xl border shadow-sm bg-card w-full min-h-screen pb-16">
        <div class="flex w-4/6 m-auto p-8 justify-between">
            <h1 class="text-3xl font-semibold">Lista de Gêneros Literários</h1>

            <a href="{{ route('generos.create') }}"
                class="bg-emerald-600 hover:bg-emerald-700 text-white p-2 rounded">Adicionar Gênero</a>
        </div>

        <table class="w-auto border m-auto shadow rounded py-6">
            <thead class="uppercase text-white bg-blue-800 border border-gray-200">
                <tr>
                    <th scope="col" class="py-2">ID</th>
                    <th scope="col" class="border">NOME</th>
                    <th scope="col" class="border">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($generos as $genero)
                    <tr class="odd:bg-white even:bg-gray-200">
                        <td class="py-2 px-6 text-gray-900 border">{{ $genero->id }}</td>
                        <td class="px-4 w-80">{{ $genero->nome }}</td>
                        <td class="flex gap-8 w-auto">
                            <div class="flex items-center justify-center gap-4">
                                {{-- Botão de Editar --}}
                                <a href="{{ route('generos.edit', $genero->id) }}"
                                    class="flex items-center text-blue-900 hover:text-blue-700 p-2"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-800">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                    Editar
                                </a>
                                {{-- Botão de Excluir --}}
                                <form action="{{ route('generos.destroy', $genero->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="flex text-red-900 p-4"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 text-red-700">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </main>
</x-app-layout>
