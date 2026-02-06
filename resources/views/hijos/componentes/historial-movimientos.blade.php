<h4 class="font-bold mb-4 text-lg">Historial de compras</h4>

<div class="flex flex-col">
    @foreach($hijo->movimientos as $movimiento)
    <div class="flex items-center justify-between py-3 border-b border-gray-300">
        <div>
            <h5 class="font-bold text-sm">{{ $movimiento->producto->nombre }}</h5>
            <p class="text-xs font-bold text-gray-400">
                {{ $movimiento->created_at->format('d-m-Y h:ia') }}
            </p>
        </div>

        <div class="text-center">
            <p class="font-bold">- {{ $movimiento->costo_total }}</p>
            <p class="text-green-500 text-xs font-bold">Completado</p>
        </div>
    </div>
    @endforeach
</div>