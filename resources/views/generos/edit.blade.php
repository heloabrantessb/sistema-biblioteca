<x-app-layout>
    <div class="m-8 flex items-center justify-center flex-col">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Editar Gênero Literário</h1>

        <form action="{{ route('generos.update', $genero->id) }}" method="POST"
            class="bg-white shadow-md rounded-xl p-10 w-full max-w-lg space-y-6">
            @csrf

            @method('PUT')

            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                <input type="text" id="nome" name="nome" autocomplete="off"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent" value="{{ $genero->nome }}">
            </div>
            <div class="flex justify-between">
                <a href="{{ route('generos.index') }}"
                    class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-md shadow">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-md shadow">Salvar</button>
            </div>
        </form>

    </div>
</x-app-layout>
