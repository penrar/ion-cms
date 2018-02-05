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
        return $this->hasOne('App\Product');
    }

    public function status() {
        return $this->hasOne('App\OrderStatus');
    }

    public function property() {
        return $this->hasOne('App\Property');
    }
}
