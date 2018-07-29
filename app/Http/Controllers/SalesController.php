<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function store(Request $request)
    {
        $sale = new Sale();
        $sale->fill($request->all());
        $sale->save();

        return response()->json($sale, 201);
    }

    public function index()
    {
        $sales = Sale::with('seller')->get();
        return response()->json($sales);
    }

    public function show($id)
    {
        $sale = Sale::with('seller')->find($id);

        if(!$sale) {
            return response()->json([
                'erro'   => 'Registro não encontrado!',
            ], 404);
        }

        return response()->json($sale);
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::find($id);

        if(!$sale) {
            return response()->json([
                'erro'   => 'Registro não encontrado!',
            ], 404);
        }

        $sale->fill($request->all());
        $sale->save();

        return response()->json($sale);
    }

    public function destroy($id)
    {
        $sale = Sale::find($id);

        if(!$sale) {
            return response()->json([
                'erro'   => 'Registro não encontrado!',
            ], 404);
        }

        $sale->delete();
    }
}
