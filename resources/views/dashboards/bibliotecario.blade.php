<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-blue-900">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        Bem-vindo, {{ Auth::user()->name }}!
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8 px-4">
                <div class="bg-white shadow-sm rounded-2xl p-6">
                    <h2 class="text-lg mb-2">Livros</h2>
                    <a href="{{ route('livros.create') }}"
                        class="inline-block bg-blue-800 text-white px-4 py-2 rounded-md hover:bg-blue-900">Gerenciar
                        Livros</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
