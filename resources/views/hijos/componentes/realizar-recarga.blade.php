<div>
    @include('hijos.componentes.regresar-a-perfil')
    <div class="flex items-center justify-between bg-white shadow rounded p-4 mb-6">
        <div>
            <p class="text-xs font-bold text-gray-500">Recarga para</p>
            <h3 class="font-bold text-base mb-2">{{ $hijo->nombre_completo }}</h3>
            <p class="text-xs font-bold text-blue-400">Saldo actual: {{ $hijo->saldo_actual }}</p>
        </div>

        <div>
            <div class="h-12 w-12 bg-gray-300 rounded-full"></div>
        </div>
    </div>

    <!-- Formulario de selección de monto -->
    <template x-if="!mostrandoFormulario">
        <div>
            <h3 class="font-bold text-lg mb-2">Selecciona el monto a recargar</h3>
            <p class="text-xs font-bold text-gray-400 mb-5">
                Elige un monto rápido o ingresa uno personalizado.
            </p>

            <div class="flex items-center justify-between space-x-5 mb-5">
                <div class="flex-1 rounded text-white font-bold p-3 text-center cursor-pointer" :class="{
                                'bg-indigo-500': montoFijo == 1,
                                'bg-gray-400': montoFijo != 1
                            }" @click.prevent="montoPersonalizado = ''; montoFijo = 1; calcularMontoFinal()">
                    $100
                </div>
                <div class="flex-1 rounded text-white font-bold p-3 text-center cursor-pointer" :class="{
                                'bg-indigo-500': montoFijo == 2,
                                'bg-gray-400': montoFijo != 2
                            }" @click.prevent="montoPersonalizado = ''; montoFijo = 2; calcularMontoFinal()">
                    $200
                </div>
                <div class="flex-1 rounded text-white font-bold p-3 text-center cursor-pointer" :class="{
                                'bg-indigo-500': montoFijo == 3,
                                'bg-gray-400': montoFijo != 3
                            }" @click.prevent="montoPersonalizado = ''; montoFijo = 3; calcularMontoFinal()">
                    $500
                </div>
            </div>

            <h4 class="font-bold mb-4">Monto personalizado</h4>

            <input type="text" class="rounded border p-4 border-gray-300 w-full" placeholder="0.00" x-model="montoPersonalizado" @keyup="calcularMontoFinal">

            <div class="mt-7 bg-white p-4 rounded shadow">
                <div class="flex items-center justify-between mb-7">
                    <h3 class="text-gray-500 text-sm">Total a pagar:</h3>
                    <h3 class="text-lg font-bold">$ <span x-text="montoFinal"></span></h3>
                </div>

                <a href="#"
                    @click.prevent="mostrarFormularioPago()"
                    class="bg-indigo-500 rounded py-4 px-4 block text-center text-white cursor-pointer text-sm font-bold block w-full flex items-center space-x-2 justify-center">
                    <span x-show="!recargando">
                        <i class="fa-regular fa-credit-card"></i>
                        <span>Continuar con el pago</span>
                    </span>

                    <span x-show="recargando">
                        <i class="fa fa-spin fa-spinner"></i>
                        <span>Preparando pago...</span>
                    </span>
                </a>
            </div>
        </div>
    </template>

    <!-- Formulario de pago con Stripe -->
    <template x-if="mostrandoFormulario">
        <div>
            <h3 class="font-bold text-lg mb-2">Datos de la tarjeta</h3>
            <p class="text-xs font-bold text-gray-400 mb-5">
                Ingresa los datos de tu tarjeta para completar la recarga.
            </p>

            <div class="bg-white p-4 rounded shadow mb-4">
                <div id="card-element" class="p-4 border border-gray-300 rounded"></div>
            </div>

            <div class="bg-white p-4 rounded shadow mb-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500 text-sm">Total a pagar:</h3>
                    <h3 class="text-lg font-bold">$ <span x-text="montoFinal"></span></h3>
                </div>
            </div>

            <div class="flex space-x-4">
                <a href="#"
                    @click.prevent="cancelarPago()"
                    class="flex-1 bg-gray-400 rounded py-4 px-4 block text-center text-white cursor-pointer text-sm font-bold">
                    <i class="fa fa-arrow-left"></i>
                    <span>Volver</span>
                </a>

                <a href="#"
                    @click.prevent="realizarPago()"
                    class="flex-2 bg-indigo-500 rounded py-4 px-4 block text-center text-white cursor-pointer text-sm font-bold flex-1">
                    <span x-show="!recargando">
                        <i class="fa fa-lock"></i>
                        <span>Pagar $ <span x-text="montoFinal"></span></span>
                    </span>

                    <span x-show="recargando">
                        <i class="fa fa-spin fa-spinner"></i>
                        <span>Procesando...</span>
                    </span>
                </a>
            </div>

            <p class="text-center mt-5 text-xs font-bold flex items-center space-x-2 justify-center">
                <i class="fa-solid fa-lock text-yellow-500"></i>
                <span>Transacción segura con Stripe</span>
            </p>
        </div>
    </template>
</div>
