<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;

class EventTypeController extends Controller
{
    public function listTypes(): JsonResponse
    {
        $events = EventType::all();
        return response()->json(['message'=>null,'data'=>$events],200);
    }

    public function create(Request $request)
    {
        // Valida los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'description' => 'required'
        ]);

        // Si la validación falla, devuelve un mensaje de error
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], status: 422);
        }

        // Crea un nuevo evento con los datos validados
        $event = EventType::create([
            'description' => $request->get('description')
        ]);

        // Devuelve una respuesta exitosa con los datos del evento creado
        return response()->json(['message' => '', 'data' => $event], status: 201);
    }



    //
}