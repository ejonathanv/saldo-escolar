<?php

namespace App\Http\Controllers;

use App\Models\Hijo;
use App\Models\Deposito;
use App\Http\Requests\StoreDepositoRequest;
use App\Http\Requests\UpdateDepositoRequest;

class DepositoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Hijo $hijo)
    {
        return view('hijos.agregar-saldo', compact('hijo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepositoRequest $request, Hijo $hijo)
    {
        $cantidad = $request->monto;

        $deposito = new Deposito();
        $deposito->tutor_id = $hijo->tutor_id;
        $deposito->hijo_id = $hijo->id;
        $deposito->cantidad = $cantidad;

        $deposito->save();

        // Sumamos la cantidad al saldo actual del hijo
        $saldoActual = $hijo->saldo;
        $saldoActualizado = $saldoActual + $cantidad;
        $hijo->saldo = $saldoActualizado;
        $hijo->save();

        // Retornamos una respuesta
        $response = 'Se ha registrado la recarga en el saldo de ' . $hijo->nombre;

        return response()->json([
            'message' => $response,
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Deposito $deposito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deposito $deposito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepositoRequest $request, Deposito $deposito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deposito $deposito)
    {
        //
    }
}
