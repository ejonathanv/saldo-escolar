<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hola {{ $tutor->user->name }}
        </h2>
    </x-slot>

    <h3 class="text-2xl font-bold mb-2">Mis hijos</h3>
    <p class="text-gray-500">Gestiona el saldo y consumos escolares</p>

    <hr class="my-5">

    <div class="flex flex-col space-y-4">
        @foreach($tutor->hijos as $hijo)
            <x-tarjeta-hijo :hijo="$hijo" />
        @endforeach
    </div>

</x-app-layout>
