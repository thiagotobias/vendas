<?php
Route::group(array('prefix' => 'api'), function()
{

  Route::get('/', function () {
      return response()->json(['message' => 'Venda API', 'status' => 'Conectado']);;
  });

  Route::resource('sales', 'SalesController');
  Route::resource('sellers', 'SellersController');
});

Route::get('/', function () {
    return redirect('api');
});