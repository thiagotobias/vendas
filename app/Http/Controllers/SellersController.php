<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SellersController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:companies',
        ]);

        if($validator->fails() ) {
            return response()->json([
                'message'   => 'Falha na validação!',
                'errors'        => $validator->errors()
            ], 422);
        }

        $seller = new Seller();
        $seller->fill($request->all());
        $seller->save();

        return response()->json($seller = Seller::find($seller->id), 201);
    }

    public function index()
    {
        $sellers = Seller::all();
        return response()->json($sellers);
    }

    public function show($id)
    {
        $seller = Seller::find($id);

        if(!$seller) {
            return response()->json([
                'error'   => 'Registro não encontrado!',
            ], 404);
        }

        return response()->json($seller);
    }

    public function update(Request $request, $id)
    {
        $seller = Seller::find($id);
        $data = $request->all();

        if(!$seller) {
            return response()->json([
                'error'   => 'Registro não encontrado!',
            ], 404);
        }

        if(array_key_exists('email', $data) && $seller->email == $data['email']) {
            unset($data['email']);
        }

        $validator = Validator::make($data, [
            'name' => 'max:100',
            'email' => 'email|unique:companies',
        ]);

        if($validator->fails() ) {
            return response()->json([
                'message'   => 'Falha na validação!',
                'errors'        => $validator->errors()
            ], 422);
        }

        $seller->fill($request->all());
        $seller->save();

        return response()->json($seller);
    }

    public function destroy($id)
    {
        $seller = Seller::find($id);

        if(!$seller) {
            return response()->json([
                'error'   => 'Registro não encontrado!',
            ], 404);
        }

        $seller->delete();
    }    
}
