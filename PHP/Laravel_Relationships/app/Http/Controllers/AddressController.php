<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'country' => 'required|string|max:255',
            'zipcode' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $address = Address::create([
            'user_id' => $request->get('user_id'),
            'country' => $request->get('country'),
            'zipcode' =>$request->get('zipcode'),
        ]);

        return response()->json(['message' => 'Address created successfully', 'data' => $address], 201);
    }
    public function show(Address $address)
    {
        return response()->json(['message' => '', 'data' => $address]);
    }
    public function show_user(Address $address)
    {
        return response()->json(['message' => '', 'data' => $address->user]);
    }
    //
}
