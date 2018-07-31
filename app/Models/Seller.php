<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = ['name', 'email', 'commission'];

    public function sales()
    {
        return $this->hasMany('App\Models\Sale');
    }
}
