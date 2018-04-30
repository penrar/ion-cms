<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $morphClass = 'Customer';
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
            return $this->customerable->contact->first_name . ' ' . $this->customerable->contact->last_name;
        } else {
            throw new \Error('Invalid Customerable Model');
        }
    }

    public function getCompanyAttribute() {
        if($this->customerable instanceof Company) {
            return $this->customerable;
        } else {
            throw new \Error('Invalid Customerable Model');
        }
    }

    public function isCompany() {
        return $this->customerable instanceof Company;
    }

    public function isContact() {
        return $this->customerable instanceof Contact;
    }
}
