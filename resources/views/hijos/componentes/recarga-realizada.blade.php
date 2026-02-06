<div class="bg-white p-4 rounded shadow flex flex-col items-center justify-center space-y-7">
    <i class="fa fa-check text-indigo-500 text-3xl"></i>
    <h2 class="text-lg font-bold">
        Recarga exitosa
    </h2>

    <a href="{{ route('administrar-hijo', $hijo) }}"
        class="bg-indigo-500 rounded py-4 px-4 block text-center text-white cursor-pointer text-sm font-bold block w-full flex items-center space-x-2 justify-center">
        <span>Finalizar</span>
    </a>
</div>