<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Administrar inventario
        </h2>
    </x-slot>

    <div class="bg-white p-4 rounded shadow mb-4">
        <form action="" class="relative">
            <input type="text" class="rounded border bg-white py-2 px-3 border-gray-300 w-full" placeholder="Buscar productos">
            <button class="absolute top-2 right-3 text-indigo-600">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>

    <div>
        <a href="#"
            class="bg-indigo-500 rounded py-2 px-4 block text-center text-white cursor-pointer text-sm font-bold block w-full">
            Agregar nuevo producto
        </a>
    </div>

    <div class="flex flex-col space-y-3 mt-7">
        @foreach($productos as $producto)
            <div class="bg-white rounded shadow p-4 flex items-center justify-between">
                <div>
                    <p class="font-bold">{{ $producto->nombre }}</p>
                    <p class="font-bold text-indigo-600 mb-2">${{ $producto->costo }}</p>
                    <p class="text-xs font-bold text-indigo-600">Stock: {{$producto->stock}} Unidades</p>

                    <div class="mt-5">
                        <a href="#"
                            class="bg-indigo-500 rounded py-2 px-4 inline-block text-center text-white cursor-pointer text-sm font-bold">
                            Editar
                        </a>
                    </div>
                </div>
                <div>
                    <div class="h-24 w-24 bg-gray-100 rounded shadow"></div>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
