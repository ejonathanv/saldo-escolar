<?php

namespace App\Http\Controllers;

use App\Models\Hijo;
use App\Models\Restriccion;
use App\Http\Requests\StoreRestriccionRequest;
use App\Http\Requests\UpdateRestriccionRequest;
use App\Models\CategoriaRestriccion;

class RestriccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Hijo $hijo)
    {
        $categorias = CategoriaRestriccion::orderBy('nombre')->get();
        
        return view('hijos.restricciones', compact('hijo', 'categorias'));
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
    public function store(StoreRestriccionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Restriccion $restriccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restriccion $restriccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestriccionRequest $request, Restriccion $restriccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restriccion $restriccion)
    {
        //
    }
}
