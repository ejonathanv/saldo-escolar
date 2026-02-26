<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use App\Models\Hijo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PagoController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function createPaymentIntent(Request $request)
    {
        $request->validate([
            'hijo_id' => 'required|exists:hijos,id',
            'cantidad' => 'required|numeric|min:1',
        ]);

        $hijo = Hijo::findOrFail($request->hijo_id);

        if ($hijo->tutor_id !== Auth::user()->tutor->id) {
            return response()->json(['error' => 'No tienes autorización para agregar saldo a este hijo.'], 403);
        }

        $cantidad = (float) $request->cantidad;
        $cantidadCentavos = (int) ($cantidad * 100);

        $deposito = new Deposito;
        $deposito->tutor_id = Auth::user()->tutor->id;
        $deposito->hijo_id = $hijo->id;
        $deposito->cantidad = $cantidad;
        $deposito->estado = 'pending';
        $deposito->save();

        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $cantidadCentavos,
                'currency' => 'mxn',
                'metadata' => [
                    'deposito_id' => $deposito->id,
                    'hijo_id' => $hijo->id,
                    'tutor_id' => Auth::user()->tutor->id,
                ],
                'description' => "Recarga de saldo para {$hijo->nombre_completo}",
            ]);

            $deposito->stripe_payment_intent_id = $paymentIntent->id;
            $deposito->save();

            return response()->json([
                'client_secret' => $paymentIntent->client_secret,
                'deposito_id' => $deposito->id,
            ]);
        } catch (\Exception $e) {
            $deposito->estado = 'failed';
            $deposito->save();

            return response()->json([
                'error' => 'Error al crear el pago: '.$e->getMessage(),
            ], 500);
        }
    }

    public function confirmarPago(Request $request)
    {
        $request->validate([
            'deposito_id' => 'required|exists:depositos,id',
            'payment_intent_id' => 'required|string',
        ]);

        $deposito = Deposito::with('hijo')->findOrFail($request->deposito_id);

        if ($deposito->tutor_id !== Auth::user()->tutor->id) {
            return response()->json(['error' => 'No tienes autorización.'], 403);
        }

        if ($deposito->stripe_payment_intent_id !== $request->payment_intent_id) {
            return response()->json(['error' => 'PaymentIntent no coincide.'], 400);
        }

        try {
            $paymentIntent = PaymentIntent::retrieve($request->payment_intent_id);

            if ($paymentIntent->status === 'succeeded') {
                $deposito->estado = 'completed';

                if ($paymentIntent->payment_method_details) {
                    $card = $paymentIntent->payment_method_details->card;
                    if ($card) {
                        $deposito->metodo_pago = "{$card->brand} **** {$card->last4}";
                    }
                }

                $deposito->save();

                $hijo = $deposito->hijo;
                $hijo->saldo += $deposito->cantidad;
                $hijo->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Recarga realizada exitosamente.',
                    'nuevo_saldo' => $hijo->saldo,
                ]);
            } else {
                $deposito->estado = 'failed';
                $deposito->save();

                return response()->json([
                    'success' => false,
                    'message' => 'El pago no fue completado.',
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al confirmar el pago: '.$e->getMessage(),
            ], 500);
        }
    }

    public function verificarEstado(Request $request)
    {
        $request->validate([
            'deposito_id' => 'required|exists:depositos,id',
        ]);

        $deposito = Deposito::findOrFail($request->deposito_id);

        if ($deposito->tutor_id !== Auth::user()->tutor->id) {
            return response()->json(['error' => 'No tienes autorización.'], 403);
        }

        if ($deposito->estado === 'completed') {
            return response()->json([
                'success' => true,
                'estado' => 'completed',
                'nuevo_saldo' => $deposito->hijo->saldo,
            ]);
        } elseif ($deposito->estado === 'failed') {
            return response()->json([
                'success' => false,
                'estado' => 'failed',
                'message' => 'El pago falló.',
            ]);
        }

        return response()->json([
            'success' => false,
            'estado' => 'pending',
            'message' => 'El pago está siendo procesado.',
        ]);
    }
}
