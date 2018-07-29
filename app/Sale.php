<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['sale_value', 'sale_date', 'seller_id'];

    public function sellers()
    {
        return $this->belongsTo('App\Seller');
    }
}
