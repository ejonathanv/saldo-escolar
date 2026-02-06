<div class="w-full flex flex-col space-y-4">
    <a href="{{ route('agregar-saldo', $hijo) }}"
        class="bg-indigo-500 rounded py-2 px-4 block text-center text-white cursor-pointer text-sm font-bold block w-full">
        Agregar saldo
    </a>

    <a href="{{ route('restricciones', $hijo) }}"
        class="bg-gray-400 rounded py-2 px-4 block text-center text-white cursor-pointer text-sm font-bold block w-full">
        Restricciones de compra
    </a>
</div>