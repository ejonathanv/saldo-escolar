<script>
    function realizarRecarga() {
        return {
            montoFijo: '',
            montoPersonalizado: '',
            montoFinal: 0,
            recargando: false,
            recarga_exitosa: false,
            calcularMontoFinal() {
                const t = this;
                if (t.montoPersonalizado) {
                    t.montoFijo = '';
                    t.montoFinal = t.montoPersonalizado;
                }

                if (!t.montoPersonalizado && t.montoFijo == 1) {
                    t.montoFinal = 100;
                }

                if (!t.montoPersonalizado && t.montoFijo == 2) {
                    t.montoFinal = 200;
                }

                if (!t.montoPersonalizado && t.montoFijo == 3) {
                    t.montoFinal = 500;
                }
            },
            realizarPago() {
                const t = this;
                let ruta = "{{ route('realizar-recarga', $hijo) }}";
                let formulario = new FormData();
                formulario.append('monto', t.montoFinal);

                t.recargando = true;

                axios.post(ruta, formulario)
                    .then(function(response) {
                        setTimeout(function() {
                            t.recargando = false;
                            t.recarga_exitosa = true;
                        }, 2000);
                    })
                    .catch(function(response) {
                        t.recargando = false;
                        console.log(response);
                    });
            }
        }
    }
</script>