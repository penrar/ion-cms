<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $guarded = ['id'];

    protected $table = 'customers';

    public function customerable() {
        return $this->morphTo();
//        return $this->morphOne('App\Contact', 'customerable');
    }
}
