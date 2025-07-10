<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        <aside class="w-64 bg-blue-900 text-white p-6">
            <h2 class="text-xl font-semibold mb-6">Usuário</h2>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('users.create') }}" class="block py-2 px-4 bg-sky-600 rounded">Adicionar
                            Usuário</a>
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
            <div class="flex w-full m-auto p-8 justify-between">
                <h1 class="text-3xl font-semibold">Lista de Usuários</h1>
                <form action="{{ route('users.index') }}" method="GET" class="flex gap-2 mb-6">
                    <input type="text" name="cpf" placeholder="Pesquisar Usuário" required
                        class="flex-grow border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Buscar
                    </button>
                </form>
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
                @if (isset($users) && $users->count() > 0)
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="odd:bg-white even:bg-gray-200">
                                <td class="py-2 text-gray-900 text-center border">{{ $user->id }}</td>
                                <td class="px-4 w-60">{{ $user->name . ' ' . $user->sobrenome }}</td>
                                <td class="text-center border">{{ $user->cpf }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="px-4 border w-40">{{ $user->role->funcao }}</td>
                                <td class="w-40">
                                    <a href="{{ route('users.show', $user->id) }}"
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
            @endif
        </main>
    </div>
</x-app-layout>
