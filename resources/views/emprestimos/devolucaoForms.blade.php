<x-app-layout>
    <form action="{{ route('emprestimos.buscarEmprestimoPorCpf') }}" method="GET"
        class="bg-white shadow-md rounded-xl p-10 w-full max-w-lg space-y-6">
        @csrf

        <div>
            <label for="cpf" class="block text-sm font-medium text-gray-700 mb-1">
                CPF do usuário que irá devolver:
            </label>
            <input type="text" id="cpf" name="cpf" autocomplete="off" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
        </div>


        <button type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-md shadow">Pesquisar Empréstimos</button>
    </form>
</x-app-layout>
