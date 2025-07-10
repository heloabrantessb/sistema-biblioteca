<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Bibliotecario') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-blue-900">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        Bem-vindo, <strong>{{ Auth::user()->name }}</strong>!
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6 mt-8 px-4">
                <div class="bg-white shadow-sm rounded-2xl p-6">
                    <h2 class="text-lg mb-2">Realizar Empréstimo</h2>
                    <p class="text-sm mb-5 text-gray-500">Realize um empréstimo</p>
                    <a href="{{ route('emprestimos.create') }}"
                        class="inline-block bg-green-800 text-white px-4 py-2 rounded-md hover:bg-green-900 transition">Conceder
                        Empréstimo</a>
                </div>
                <div class="bg-white shadow-sm rounded-2xl p-6">
                    <h2 class="text-lg mb-2">Confirmar Devolução</h2>
                    <p class="text-sm mb-5 text-gray-500">Confirme uma devolução</p>
                    <a href="{{ route('emprestimos.devolucaoForms') }}"
                        class="inline-block bg-green-800 text-white px-4 py-2 rounded-md hover:bg-green-900 transition">Confirmar
                        Devolução</a>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8 px-4">
                <div class="bg-white shadow-sm rounded-2xl p-6">
                    <h2 class="text-lg">Livros</h2>
                    <p class="text-sm mb-5 text-gray-500">Realize o gerenciamento do acervo</p>
                    <a href="{{ route('livros.index') }}"
                        class="inline-block bg-blue-800 text-white px-4 py-2 rounded-md hover:bg-blue-900">Gerenciar
                        Livros</a>
                </div>
                <div class="bg-white shadow-sm rounded-2xl p-6">
                    <h2 class="text-lg">Usuários</h2>
                    <p class="text-sm mb-5 text-gray-500">Realize o gerenciamento dos usuários</p>
                    <a href="{{ route('users.index') }}"
                        class="inline-block bg-blue-800 text-white px-4 py-2 rounded-md hover:bg-blue-900 transition">Gerenciar
                        Usuários</a>
                </div>
                <div class="bg-white shadow-sm rounded-2xl p-6">
                    <h2 class="text-lg">Empréstimos</h2>
                    <p class="text-sm mb-5 text-gray-500">Realize o gerenciamento dos empréstimos</p>
                    <a href="{{ route('emprestimos.index') }}"
                        class="inline-block bg-blue-800 text-white px-4 py-2 rounded-md hover:bg-blue-900 transition">Gerenciar
                        Empréstimos</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
