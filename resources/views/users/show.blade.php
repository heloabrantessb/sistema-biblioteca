<x-app-layout>
    <main class="m-8 flex items-center justify-center flex-col">

        <h1 class='text-3xl font-semibold text-gray-800 mb-2'>Informações</h1>

        <div class="bg-white shadow-md rounded-xl p-10 w-full max-w-lg space-y-6">
            <h1 class="font-semibold text-2xl m-0">{{ $user->name . " " . $user->sobrenome}}</h1>
            <p>{{ $user->role }}</p>

        </div>
    </main>
</x-app-layout>
