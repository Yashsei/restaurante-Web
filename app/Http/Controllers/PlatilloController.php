<?php

namespace App\Http\Controllers;

use App\Models\Platillo;
use Illuminate\Http\Request;

class PlatilloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todos los platillos disponibles
        $platillos = Platillo::where('disponible', true)->get();

        // Carga la vista 'menu.blade.php' pasándole los platillos
        return view('menu', compact('platillos'));
    }
    public function admin()
    {
        $platillos = Platillo::all();
        return view('admin', compact('platillos'));
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
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
        ]);

        Platillo::create($request->all());

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Platillo $platillo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Platillo $platillo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Platillo $platillo)
    {
        $platillo->update($request->only(['nombre', 'precio', 'descripcion']));

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Platillo $platillo)
    {
        //
    }
}
