<x-app-layout>
    <div class="m-8 flex items-center justify-center flex-col">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Editar Livro</h1>

        <form action="{{ route('livros.update', $livro->id) }}" method="POST"
            class="bg-white shadow-md rounded-xl p-10 w-full max-w-lg space-y-6">
            @csrf

            @method('PUT')

            {{-- Titulo --}}
            <div>
                <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">Nome: </label>
                <input type="text" id="titulo" name="titulo" autocomplete="off"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent"
                    value="{{ $livro->titulo }}">
            </div>

            {{-- Autor --}}
            <div>
                <label for="autor" class="block text-sm font-medium text-gray-700 mb-1">Autor: </label>
                <input type="text" id="autor" name="autor" autocomplete="off"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent"
                    value="{{ $livro->autor }}">
            </div>

            {{-- ano de lançamento --}}
            <div>
                <label for="ano_de_lancamento" class="block text-sm font-medium text-gray-700 mb-1">Ano de lançamento:
                </label>
                <input type="text" id="ano_de_lancamento" name="ano_de_lancamento" autocomplete="off"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent"
                    value="{{ $livro->ano_de_lancamento }}">
            </div>

            {{-- categoria --}}
            <div>
                <label for="categoria_id" class="block text-sm font-medium text-gray-700 mb-1">Categoria do livro:
                </label>
                <select id="categoria_id" name="categoria_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                    <option value="" disabled selected>Selecione uma Categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id', $livro->categoria_id) == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Genero --}}
            <div>
                <label for="genero_id" class="block text-sm font-medium text-gray-700 mb-1">Gênero do livro: </label>
                <select id="genero_id" name="genero_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                    <option value="" disabled selected>Selecione um Gênero</option>
                    @foreach ($generos as $genero)
                        <option value="{{ $genero->id }}"
                            {{ old('genero_id', $livro->genero_id) == $genero->id ? 'selected' : '' }}>
                            {{ $genero->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('livros.index') }}"
                    class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-md shadow">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-md shadow">Salvar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
