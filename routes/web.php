<?php
// $this->get('/', function () {
//     return redirect('api');
// });

$this->group(array('prefix' => 'api'), function(){
    $this->get('/', function () {
        return response()->json(['message' => 'API de Vendas']);  
    });
    
    $this->resource('sellers', 'Api\SellersController');
    $this->resource('sales', 'Api\SalesController');    
});

// Rotas Site
Route::get('/','Site\SiteController@index')->name('home');
Route::resource('seller', 'Site\SellerController');
Route::resource('sale', 'Site\SaleController');