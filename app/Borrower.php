<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $guarded = ['id'];

    public function orders() {
        return $this->belongsToMany('App\Order', 'borrower_order');
    }

    public function borrowerable() {
        $this->morphTo();
//        return $this->morphOne('App\Company', 'borrowerable');
    }
}
