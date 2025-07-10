<!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
<x-app-layout>
    <div class="m-8 flex items-center justify-center flex-col">

        <h1 class='text-3xl font-semibold text-gray-800 mb-2'>Novo Gênero Literário</h1>
        <p class="mb-6 text-gray-500">Adicione um novo gênero literário</p>

          @if (session('erro'))
                <div class="bg-red-100 border text-red-700 p-2 rounded">
                    {{ session('erro') }}
                </div>
            @endif

        <form action="{{ route('generos.store') }}" method="POST"
            class="bg-white shadow-md rounded-xl p-10 w-full max-w-lg space-y-6">
            @csrf

            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                <input type="text" id="nome" name="nome" autocomplete="off"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
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
