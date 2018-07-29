<?php
$this->group(array('prefix' => 'api'), function(){
    $this->get('/', function () {
        return response()->json(['message' => 'Venda API', 'status' => 'Conectado']);  
    });
    
    $this->resource('sellers', 'SellersController');
    $this->resource('sales', 'SalesController');    
});

$this->get('/', function () {
    return redirect('api');
});