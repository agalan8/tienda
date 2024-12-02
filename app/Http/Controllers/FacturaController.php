<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('facturas.index', [
            'facturas' => Factura::with('articulos')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('facturas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero' => 'required|unique:facturas,numero',
        ]);

        $validated['user_id'] = Auth::id();

        $factura = Factura::create($validated);
        session()->flash('exito', 'Factura creada correctamente.');
        $articulos = Articulo::all();
        return view('facturas.anadirArticulos', [
            'factura' => $factura,
            'articulos' => $articulos,
            'articulos_factura' => $factura->articulos,
        ]);

    }

    public function anadirArticulos(Factura $factura)
    {
        return view('facturas.anadirArticulos', [
            'factura'=> $factura,
            'articulos' =>Articulo::all(),
            'articulos_factura' => $factura->articulos,
         ]);
    }

    public function anadirArticulo(Request $request, Factura $factura){

        // Validar que el artículo esté seleccionado
        $request->validate([
            'articulo_id' => 'required|exists:articulos,id',
        ]);

        // Añadir la relación en la tabla pivote
        $factura->articulos()->attach($request->articulo_id);

        return redirect()->route('facturas.anadirArticulos', ['factura' => $factura->id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        return view('facturas.show', [
            'factura' => $factura,
            'articulos' => $factura->articulos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        // return view('facturas.edit', [
        //     'factura'=> $factura
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        $factura->delete();
        return redirect()->route('facturas.index');
    }
}
