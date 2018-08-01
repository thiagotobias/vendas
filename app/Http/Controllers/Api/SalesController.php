<?php

namespace App\Http\Controllers\Api;

use App\Models\Sale;
use App\Models\Seller;
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

        $sellerP = Seller::select('commission')->find($data['seller_id']);
        
        $number = ($request->sale_value * $sellerP->commission) / 100;
        $number =  number_format($number, 2, '.', '');

        $sale = new Sale();
        $sale->commission_value = $number;
        $sale->fill($request->all());
        $sale->save();

        $retorno = new Sale();
        $retorno = $retorno->select('sales.id','name','email','commission_value', 'sale_value', 'sales.created_at')
            ->join('sellers', 'sales.seller_id', '=', 'sellers.id')->find($sale->id);

        return response()->json($retorno, 201);
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
        
        $sellerP = Seller::select('commission')->find($sale->seller_id);        
        $number = ($request->sale_value * $sellerP->commission) / 100;
        $number =  number_format($number, 2, '.', '');

        $sale->commission_value = $number;
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
