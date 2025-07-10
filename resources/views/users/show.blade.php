<x-app-layout>
    <main class="m-8 flex items-center justify-center flex-col">
        <h1 class='text-3xl font-bold text-gray-800 mb-6 tracking-tight'>Informações do Usuário</h1>

        <div class="bg-white shadow-xl rounded-2xl px-10 py-8 w-full max-w-2xl space-y-6 border border-gray-200">
            <div class="text-center">
                <h2 class="text-2xl font-semibold text-gray-900">{{ $user->name . ' ' . $user->sobrenome }}</h2>
                <span class="text-sm text-gray-500 italic">{{ ucfirst($user->role->funcao) }}</span>
            </div>

            <div class="border-t pt-6 space-y-3 text-gray-700 text-base">
                <p><strong>CPF:</strong> {{ $user->cpf }}</p>
                <p><strong>E-mail:</strong> {{ $user->email }}</p>
                <p><strong>Usuário criado em:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
            </div>
            <div class="flex justify-between">
                <a href="{{ route('users.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-2 rounded-md shadow">
                    Voltar
                </a>
                <div class="flex gap-2">
                    <a href="{{ route('users.edit', $user->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-md shadow">
                        Editar
                    </a>

                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                        onsubmit="return confirm('Tem certeza que deseja excluir essa Categoria?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-md shadow">
                            Excluir
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </main>
</x-app-layout>
