<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $guarded = ['id'];

    protected $table = 'contacts';

    public function company() {
        return $this->belongsToMany('App\Company');
    }

    public function borrower() {
        return $this->morphOne('App\Borrower', 'borrowerable');
    }

    public function customer() {
        return $this->morphOne('App\Customer', 'customerable');
    }
}
