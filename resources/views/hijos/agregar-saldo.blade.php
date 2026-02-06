<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agregar saldo
        </h2>
    </x-slot>

    <div x-data="realizarRecarga()">
        <!-- Cuando aun no se realiza la recarga -->
        <template x-if="!recarga_exitosa">
            @include('hijos.componentes.realizar-recarga')
        </template>

        <!-- Mensaje de recarga exitosa -->
        <template x-if="recarga_exitosa">
            @include('hijos.componentes.recarga-realizada')
        </template>
    </div>

    <!-- Script con alpine js - funcion realizarRecarga() -->
    @include('hijos.componentes.scripts')

</x-app-layout>
