<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Administrador') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-blue-900">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        Bem-vindo, <span class="font-semibold">{{ Auth::user()->name }}</span>!
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8 px-4">
                <div class="bg-white shadow-sm rounded-2xl p-6">
                    <h2 class="text-lg">Gêneros literários</h2>
                    <p class="text-sm mb-5 text-gray-500">Realize o gerenciamento dos gêneros literários</p>
                    <a href="{{ route('generos.index') }}"
                        class="inline-block bg-blue-800 text-white px-4 py-2 rounded-md hover:bg-blue-900">Gerenciar
                        Gêneros</a>
                </div>
                <div class="bg-white shadow-sm rounded-2xl p-6 transition">
                    <h2 class="text-lg mb-2">Categorias</h2>
                    <p class="text-sm mb-5 text-gray-500">Realize o gerenciamento das categorias</p>
                    <a href="{{ route('categorias.index') }}"
                        class="inline-block bg-blue-800 text-white px-4 py-2 rounded-md hover:bg-blue-900">Gerenciar
                        Categorias</a>
                </div>
                <div class="bg-white shadow-sm rounded-2xl p-6">
                    <h2 class="text-lg mb-2">Usuários</h2>
                    <p class="text-sm mb-5 text-gray-500">Realize o gerenciamento usuários</p>
                    <a href="{{ route('users.index') }}"
                        class="inline-block bg-blue-800 text-white px-4 py-2 rounded-md hover:bg-blue-900 transition">Gerenciar
                        Usuários</a>
                </div>
            </div>
        </div>
</x-app-layout>
