<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $guarded = ['id'];

    public function order() {
        return $this->hasMany('App\Order', 'order_status_id');
    }

    public function getStatusAttribute() {
        return $this->status_name;
    }
}
