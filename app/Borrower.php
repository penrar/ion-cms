<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrower extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $morphClass = 'Borrower';

    public function orders() {
        return $this->belongsToMany('App\Order', 'borrower_order');
    }

    public function borrowerable() {
        return $this->morphTo();
//        return $this->morphOne('App\Company', 'borrowerable');
    }

    public function getNameAttribute() {
        if($this->borrowerable instanceof Contact) {
            return $this->borrowerable->first_name . ' ' . $this->borrowerable->last_name;
        } else if($this->borrowerable instanceof Company) {
            return $this->borrowerable->company_name;
        } else {
            throw new \Error('Invalid Customerable Model');
        }
    }
}
