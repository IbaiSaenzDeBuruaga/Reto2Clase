<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    public function index()
    {
        $bodegas = Bodega::all();
        echo "hola";
        return view('bodegas.index', compact('bodegas'));
    }

    public function create()
    {
        return view('bodegas.create');
    }

    public function store(Request $request)
    {
        // Validar y guardar la nueva bodega
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
        ]);

        Bodega::create($request->all());

        return redirect()->route('bodega.index')->with('success', 'Bodega creada exitosamente.');
    }

    public function show($id)
    {
        $bodega = Bodega::findOrFail($id);
        return view('bodegas.show', compact('bodega'));
    }

    public function destroy($id)
    {
        $bodega = Bodega::findOrFail($id);
        $bodega->delete();

        return redirect()->route('bodega.index')->with('success', 'Bodega eliminada exitosamente.');
    }
}
