<x-app-layout>
    <div class="m-8 flex items-center justify-center flex-col">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Novo Usuário</h1>

        @if ($errors->any())
            <div class="text-red-500">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif  

        @if (session('sucesso'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('sucesso') }}
            </div>
        @endif


        <form action="{{ route('livros.store') }}" method="POST"
            class="bg-white shadow-md rounded-xl p-10 w-full max-w-lg space-y-6">
            @csrf
            {{-- titulo --}}
            <div>
                <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">Título: </label>
                <input type="text" id="titulo" name="titulo" autocomplete="off"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent" />
            </div>
            {{-- autor --}}
            <div>
                <label for="autor" class="block text-sm font-medium text-gray-700 mb-1">Autor: </label>
                <input type="text" id="autor" name="autor" autocomplete="off"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent" />
            </div>
            {{-- ano de lançamento --}}
            <div>
                <label for="ano_de_lancamento" class="block text-sm font-medium text-gray-700 mb-1">Ano de Lançamento: </label>
                <input type="text" id="ano_de_lancamento" name="ano_de_lancamento" autocomplete="off"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent" />
            </div>
            {{-- Categoria --}}
            <div>
                <label for="categoria_id" class="block text-sm font-medium text-gray-700 mb-1">Categoria do livro: </label>
                <select id="categoria_id" name="categoria_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                    <option value="" disabled selected>Selecione uma Categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>
            {{-- genero --}}
            <div>
                <label for="genero_id" class="block text-sm font-medium text-gray-700 mb-1">Gênero do livro: </label>
                <select id="genero_id" name="genero_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                    <option value="" disabled selected>Selecione um Gênero</option>
                    @foreach ($generos as $genero)
                        <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('livros.index') }}"
                    class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-md shadow">
                    Cancelar
                </a>

                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-md shadow">
                    Criar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
