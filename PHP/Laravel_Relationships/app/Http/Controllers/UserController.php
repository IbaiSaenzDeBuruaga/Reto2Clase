<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'c_password' => 'required|same:password',
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        }
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        return response()->json(['message'=>'User Created','data'=>$user],200);
    }

    public function show(User $user = null) {
        if ($user) {
            return response()->json(['message' => '', 'data' => $user], status: 200);
        } else {
            return response()->json(['message' => 'User not found', 'data' => null], status: 404);
        }
    }

    public function show2(Request $request, $user_id){
        $user = User::where('id', $user_id)->first();
        return response()->json(['message' => '', 'data' => $user]);
    }

    public function show_address(User $user = null) {
        if ($user) {
            return response()->json(['message' => '', 'data' => $user->address], status: 200);
        } else {
            return response()->json(['message' => 'User not found', 'data' => null], status: 404);
        }
    }

    public function bookEvent(Request $request, User $user, Event $event)
    {
        $note = '';

        if ($request->has('note')) {
            $note = $request->get('note');
        }

        try {
            $user = User::where('id', $request->get('user_id'))->first();
            $event = Event::where('id', $request->get('event_id'))->first();

            if ($user->events()->save($event, ['note' => $note])) {
                return response()->json(['message' => 'Evento reservado', 'data' => $event], 200);
            }
        } catch (Exception $exception) {
            // Manejo de excepciones
        }
        if($user->events()->save($event, array('note' => $note))){
            return response()->json(['message'=>'User Event
Created','data'=>$event],200);
        }
        return response()->json(['message'=>'Error','data'=>null],400);
    }

    public function listEvents(User $user = null)
    {
        if ($user) {
            return response()->json([
                'message' => 'Eventos de un usuario',
                'data' => $user->events
            ], 200);
        }

        return response()->json([
            'message' => 'User not Found',
            'data' => null
        ], 404);
    }





    //
}
