<?php

namespace App\Http\Controllers\Api;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::orderBy('id', 'ASC')->with('seller')->get();
        return response()->json($sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'sale_value' => 'required|numeric',
            'seller_id' => 'required|int'
        ]);

        if($validator->fails() ) {
            return response()->json([
                'message'   => 'Falha na validação!',
                'errors'        => $validator->errors()
            ], 422);
        }

        $sale = new Sale();
        $sale->fill($request->all());
        $sale->save();

        return response()->json($sale, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::with('seller')->find($id);

        if(!$sale) {
            return response()->json([
                'error'   => 'Registro não encontrado!',
            ], 404);
        }

        return response()->json($sale);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sale = Sale::find($id);

        if(!$sale) {
            return response()->json([
                'error'   => 'Registro não encontrado!',
            ], 404);
        }

        $data = $request->all();
        
        $validator = Validator::make($data, [
            'sale_value' => 'required|numeric'
        ]);

        if($validator->fails() ) {
            return response()->json([
                'message'   => 'Falha na validação!',
                'errors'        => $validator->errors()
            ], 422);
        }

        $sale->fill($request->all());
        $sale->save();

        return response()->json($sale);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::find($id);

        if(!$sale) {
            return response()->json([
                'error'   => 'Registro não encontrado!',
            ], 404);
        }

        $sale->delete();
    }
}
