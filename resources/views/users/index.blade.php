<x-app-layout>
    <main class="overflow-x-auto rounded-xl border shadow-sm bg-card w-7xl h-screen">
        <div class="flex w-5/6 m-auto p-8 justify-between">
            <h1 class="text-3xl font-semibold">Lista de Usuários</h1>

            <a href="{{ route('categorias.create') }}"
                class="bg-emerald-600 hover:bg-emerald-700 text-white p-2 rounded">Adicionar Usuário</a>
        </div>

        <table class="w-5/6 border m-auto shadow rounded text-left">
            <thead class="uppercase text-white bg-blue-800 border border-gray-200">
                <tr class="">
                    <th scope="col" class="px-6 py-3">Id</th>
                    <th scope="col" class="border px-6 py-3">Nome</th>
                    <th scope="col" class="border px-6 py-3">Cpf</th>
                    <th scope="col" class="border px-6 py-3">Email</th>
                    <th scope="col" class="border px-6 py-3">Função</th>
                    <th scope="col" class="border px-6 py-3 text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="odd:bg-white even:bg-gray-200">
                        <td class="py-2 text-gray-900 text-center border">{{ $user->id }}</td>
                        <td class="px-4 w-60">{{ $user->name . ' ' . $user->sobrenome }}</td>
                        <td class="text-center border">{{ $user->cpf }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="px-4 border w-40">{{ $user->role }}</td>
                        <td class="w-40">
                            <a href="{{ route('users.show', $user->id) }}" class="flex gap-4 px-4 text-blue-900 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" class="size-5">
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
        <a href="{{ url('/dashboard') }}" class="bg-gray-400 text-neutral-200 font-semibold p-2 mt-8 rounded">Voltar</a>
    </main>
</x-app-layout>
