<?php

namespace App\Http\Controllers;

use App\Models\Peticione;
use Exception;
use Illuminate\Http\Request;

class AdminPeticionesController extends Controller
{
    public function index(Request $request){
        $peticiones = Peticione::paginate(5);
        return view('adminpeticiones.index', compact('peticiones'));
    }

    public function cambiarEstado(Request $request, $id) {
        try {
            $peticion = Peticione::findOrFail($id);

            if ($request->user()->cannot('cambiarEstado', $peticion)) {
                abort(code: 403);
            }

            $peticion->estado = 'aceptada';
            $peticion->save();
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect()->back();
    }
    //
}
