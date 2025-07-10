<x-app-layout>
    <div class="m-8 flex items-center justify-center flex-col">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Editar Usuário</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST"
            class="bg-white shadow-md rounded-xl p-10 w-full max-w-lg space-y-6">
            @csrf

            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                <input type="text" id="name" name="name" autocomplete="off"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent"
                    value="{{ $user->name }}">
            </div>

            <div>
                <label for="sobrenome" class="block text-sm font-medium text-gray-700 mb-1">Sobrenome</label>
                <input type="text" id="sobrenome" name="sobrenome" autocomplete="off"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent"
                    value="{{ $user->sobrenome }}">
            </div>

            <div>
                <label for="cpf" class="block text-sm font-medium text-gray-700 mb-1">CPF</label>
                <input type="text" id="cpf" name="cpf" autocomplete="off"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent"
                    value="{{ $user->cpf }}">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="text" id="email" name="email" autocomplete="off"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent"
                    value="{{ $user->email }}">
            </div>
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Função</label>
                <select id="role" name="role" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                    @foreach ($rolesPermissao as $rolePermitido)
                        <option value="{{ $rolePermitido }}" {{ $user->role === $rolePermitido ? 'selected' : '' }}>{{ $rolePermitido }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('users.index') }}"
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
