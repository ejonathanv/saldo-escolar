<div class="p-4 bg-white shadow-sm rounded flex flex-col space-y-4">
    <div class="flex items-start justify-between">
        <div class="flex items-start space-x-2">
            <div class="h-12 w-12 bg-gray-300 rounded-full"></div>
            <div>
                <p class="font-bold">{{ $hijo->nombre_completo }}</p>
                <p class="text-xs text-gray-500">Grado {{$hijo->grado}} - Grupo {{ $hijo->grupo }}</p>
            </div>
        </div>

        <div>
            <span class="p-1 bg-green-300 text-green-900 text-xs font-bold rounded-full">
                {{ $hijo->saldo_actual }}
            </span>
        </div>
    </div>

    <div>
        <a href="{{ route('administrar-hijo', $hijo) }}" 
            class="bg-indigo-500 rounded py-2 px-4 block text-center text-white cursor-pointer text-sm font-bold">
            Administrar
        </a>
    </div>
</div>