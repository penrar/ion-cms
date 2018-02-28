<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function order() {
        return $this->hasMany('App\Order');
    }

    public function getFullAddressAttribute() {
        return $this->address1 . ', ' . $this->address2 . ' ' . $this->city . ' ' . $this->state . ', ' . $this->zip_code;
    }

    public function getAddressAttribute() {
        return $this->address1 . ', ' . $this->address2;
    }

}
