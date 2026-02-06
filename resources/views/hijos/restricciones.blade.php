<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Restricciones
        </h2>
    </x-slot>

    @include('hijos.componentes.regresar-a-perfil')

    <p class="mb-7 font-bold text-sm">
        Estas reglas ayudan a guiar las compras de tus hijos en la escuela.
    </p>

    <hr class="my-5">

    <div class="flex flex-col space-y-7">
        @foreach($categorias as $categoria)
            <div class="flex items-center justify-between">
                <span class="font-bold">{{ $categoria->nombre }}</span>
                <input type="checkbox">
            </div>
        @endforeach
    </div>

</x-app-layout>
