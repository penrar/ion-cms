<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $table = 'customers';

    public function customerable() {
        return $this->morphTo();
    }

    public function order() {
        return $this->hasMany('App\Order');
    }

    public function getNameAttribute() {
        if($this->customerable instanceof Contact) {
            return $this->customerable->first_name . ' ' . $this->customerable->last_name;
        } else if($this->customerable instanceof Company) {
            return $this->customerable->company_name;
        } else {
            throw new \Error('Invalid Customerable Model');
        }
    }
}
