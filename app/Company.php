<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    //

    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function contact() {
        return $this->belongsTo('App\Contact');
    }

    public function borrower() {
        return $this->morphOne('App\Borrower', 'borrowerable');
    }

    public function customer() {
        return $this->morphOne('App\Customer', 'customerable');
    }
}
