<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SellersController extends Controller
{
    public function store(Request $request)
    {
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
                'erro'   => 'Registro não encontrado!',
            ], 404);
        }

        return response()->json($seller);
    }

    public function update(Request $request, $id)
    {
        $seller = Seller::find($id);

        if(!$seller) {
            return response()->json([
                'erro'   => 'Registro não encontrado!',
            ], 404);
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
                'erro'   => 'Registro não encontrado!',
            ], 404);
        }

        $seller->delete();
    }
}
