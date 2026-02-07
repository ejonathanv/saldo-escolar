<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hola {{ auth()->user()->name }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded p-4 mb-4">
        <p class="text-gray-500 font-bold text-sm mb-2">
            Ventas del día
        </p>
        <h2 class="font-bold text-2xl">
            $25,600
        </h2>
    </div>

    <div class="flex items-stretch space-x-3 mb-4">
        <div class="bg-indigo-100 shadow rounded p-4 flex-1">
            <p class="text-gray-500 font-bold text-sm mb-2">
                Usuarios
            </p>
            <h2 class="font-bold text-2xl">
                1240
            </h2>
        </div>

        <div class="bg-orange-100 shadow rounded p-4 flex-1">
            <p class="text-gray-500 font-bold text-sm mb-2">
                Alertas
            </p>
            <h2 class="font-bold text-2xl">
                3
            </h2>
        </div>
    </div>

    <h4 class="font-bold mb-4">Acciones rápidas</h4>

    <div class="flex items-stretch space-x-3 mb-4">
        <a href="{{ route('inventario') }}" class="bg-blue-100 shadow rounded p-4 flex-1 block">
            <p class="text-gray-500 font-bold text-sm mb-2">
                Administrar
            </p>
            <h2 class="font-bold text-2xl">
                Inventario
            </h2>
        </a>

        <a href="#" class="bg-lime-100 shadow rounded p-4 flex-1 block">
            <p class="text-gray-500 font-bold text-sm mb-2">
                Reporte
            </p>
            <h2 class="font-bold text-2xl">
                Ventas
            </h2>
        </a>
    </div>

    <h4 class="font-bold mb-4">Transacciones recientes</h4>

    <div>
        <ul>
            <li class="flex items-center justify-between border-b border-gray-300 py-2">
                <div>
                    <p class="font-bold text-sm">María Gonzales</p>
                    <p class="text-xs text-gray-400">Grado 5, Cafetería</p>
                </div>
                <div class="text-right">
                    <p class="font-bold">$15</p>
                </div>
            </li>
            <li class="flex items-center justify-between border-b border-gray-300 py-2">
                <div>
                    <p class="font-bold text-sm">Ricardo Sosa</p>
                    <p class="text-xs text-gray-400">Grado 5, Cafetería</p>
                </div>
                <div class="text-right">
                    <p class="font-bold">$15</p>
                </div>
            </li>
            <li class="flex items-center justify-between border-b border-gray-300 py-2">
                <div>
                    <p class="font-bold text-sm">Carlos Vazquez</p>
                    <p class="text-xs text-gray-400">Grado 5, Cafetería</p>
                </div>
                <div class="text-right">
                    <p class="font-bold">$15</p>
                </div>
            </li>
            <li class="flex items-center justify-between border-b border-gray-300 py-2">
                <div>
                    <p class="font-bold text-sm">Daniela Jiménez</p>
                    <p class="text-xs text-gray-400">Grado 5, Cafetería</p>
                </div>
                <div class="text-right">
                    <p class="font-bold">$15</p>
                </div>
            </li>
        </ul>
    </div>


</x-app-layout>
