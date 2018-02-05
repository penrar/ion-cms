<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    //
    public function contact() {
        return $this->hasOne('App\Contact');
    }

    public function borrower() {
        return $this->morphOne('App\Borrower', 'borrowerable');
    }

    public function customer() {
        return $this->morphOne('App\Customer', 'customerable');
    }
}
