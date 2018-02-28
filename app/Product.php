<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function getNameAttribute() {
        return $this->product_name;
    }
}
