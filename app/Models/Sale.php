<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['sale_value', 'sale_date', 'seller_id'];

    public function seller(){
        return $this->belongsTo('App\Models\Seller');
    }
}
