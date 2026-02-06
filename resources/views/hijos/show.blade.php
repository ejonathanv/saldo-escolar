<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Perfil de hijo
        </h2>
    </x-slot>

    <div class="flex items-center justify-start space-y-4 flex-col text-center">
        @include('hijos.componentes.avatar')
        @include('hijos.componentes.saldo-actual')
        @include('hijos.componentes.botones-saldo-restricciones')
    </div>

    <div class="text-left mt-7">
        @include('hijos.componentes.historial-movimientos')
    </div>

</x-app-layout>
