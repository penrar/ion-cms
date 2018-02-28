<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded  = ['id'];

    public function borrowers() {
        return $this->belongsToMany('App\Borrower', 'borrower_order');
    }

    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function status() {
        return $this->belongsTo('App\OrderStatus', 'order_status_id');
    }

    public function property() {
        return $this->belongsTo('App\Property');
    }

    public function workprocess() {
        return $this->belongsToMany('App\WorkProcess', 'order_work_process');
    }
}
