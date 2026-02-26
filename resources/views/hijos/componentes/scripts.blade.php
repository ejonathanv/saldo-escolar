<script>
    function realizarRecarga() {
        return {
            montoFijo: '',
            montoPersonalizado: '',
            montoFinal: 0,
            recargando: false,
            recarga_exitosa: false,
            stripe: null,
            elements: null,
            cardElement: null,
            clientSecret: null,
            depositoId: null,
            mostrandoFormulario: false,
            
            async init() {
                this.stripe = Stripe('{{ config("services.stripe.key") }}');
            },
            
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
            
            async mostrarFormularioPago() {
                const t = this;
                
                if (t.montoFinal <= 0) {
                    alert('Por favor selecciona un monto válido');
                    return;
                }
                
                t.recargando = true;
                
                try {
                    const response = await axios.post('{{ route("pagos.create-payment-intent") }}', {
                        hijo_id: {{ $hijo->id }},
                        cantidad: t.montoFinal
                    });
                    
                    t.clientSecret = response.data.client_secret;
                    t.depositoId = response.data.deposito_id;
                    
                    t.elements = t.stripe.elements({
                        clientSecret: t.clientSecret,
                        appearance: {
                            theme: 'stripe',
                            variables: {
                                colorPrimary: '#6366f1',
                            }
                        }
                    });
                    
                    t.cardElement = t.elements.create('payment');
                    
                    t.mostrandoFormulario = true;
                    
                    setTimeout(() => {
                        const cardEl = document.getElementById('card-element');
                        if (cardEl) {
                            cardEl.innerHTML = '';
                            t.cardElement.mount('#card-element');
                        }
                        t.recargando = false;
                    }, 100);
                    
                } catch (error) {
                    alert('Error al iniciar el pago: ' + (error.response?.data?.error || error.message));
                    t.recargando = false;
                }
            },
            
            async realizarPago() {
                const t = this;
                
                if (!t.mostrandoFormulario) {
                    await t.mostrarFormularioPago();
                    return;
                }
                
                t.recargando = true;
                
                try {
                    const { error, paymentIntent } = await t.stripe.confirmPayment({
                        elements: t.elements,
                        redirect: 'if_required'
                    });
                    
                    if (error) {
                        alert('Error: ' + error.message);
                        t.recargando = false;
                        return;
                    }
                    
                    if (paymentIntent.status === 'succeeded') {
                        const verifyResponse = await axios.post('{{ route("pagos.confirmar") }}', {
                            deposito_id: t.depositoId,
                            payment_intent_id: paymentIntent.id
                        });
                        
                        if (verifyResponse.data.success) {
                            t.recarga_exitosa = true;
                        } else {
                            alert('El pago fue procesado pero hubo un problema al actualizar el saldo');
                            t.recargando = false;
                        }
                    } else {
                        alert('El pago no fue completado. Estado: ' + paymentIntent.status);
                        t.recargando = false;
                    }
                } catch (error) {
                    console.error(error);
                    alert('Error al procesar el pago: ' + (error.response?.data?.error || error.message));
                    t.recargando = false;
                }
            },
            
            cancelarPago() {
                this.mostrandoFormulario = false;
                this.cardElement = null;
                this.clientSecret = null;
                this.depositoId = null;
            }
        }
    }
</script>
