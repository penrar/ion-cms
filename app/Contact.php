<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $guarded = ['id'];

    protected $table = 'contacts';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function company() {
        return $this->hasOne('App\Company');
    }

    public function borrower() {
        return $this->morphOne('App\Borrower', 'borrowerable');
    }

    public function customer() {
        return $this->morphOne('App\Customer', 'customerable');
    }
}
