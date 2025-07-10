<x-app-layout>
    <div class="m-8 flex items-center justify-center flex-col">
        <h1 class='text-3xl font-semibold text-gray-800 mb-2'>Novo Empréstimo</h1>
        @if (session('sucesso'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('sucesso') }}
            </div>
        @endif
        <p class="mb-6 text-gray-500">Registre um novo empréstimo</p>

        <form action="{{ route('emprestimos.store') }}" method="POST"
            class="bg-white shadow-md rounded-xl p-10 w-full max-w-lg space-y-6">
            @csrf

            {{-- user --}}
            <div>
                <label for="usuario" class="block text-sm font-medium text-gray-700 mb-1">
                    CPF do usuário que irá emprestar:
                </label>
                <input type="text" id="usuario" name="usuario" autocomplete="off" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
            </div>

            {{-- livro --}}
            <div>
                <label for="livro_id" class="block text-sm font-medium text-gray-700 mb-1">
                    ID do livro:
                </label>
                <input type="text" id="livro_id" name="livro_id" autocomplete="off" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
            </div>

            {{-- data devolucao --}}
            <div>
                <label for="data_fim_previsao" class="block text-sm font-medium text-gray-700 mb-1">
                    Data prevista de devolução:
                </label>
                <input type="date" id="data_fim_previsao" name="data_fim_previsao" autocomplete="off" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
            </div>


            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-md shadow">Realizar
                Empréstimo</button>
        </form>

    </div>


</x-app-layout>
