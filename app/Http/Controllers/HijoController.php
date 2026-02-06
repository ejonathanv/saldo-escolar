<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHijoRequest;
use App\Http\Requests\UpdateHijoRequest;
use App\Models\Hijo;

class HijoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreHijoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Hijo $hijo)
    {
        return view('hijos.show', compact('hijo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hijo $hijo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHijoRequest $request, Hijo $hijo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hijo $hijo)
    {
        //
    }
}
