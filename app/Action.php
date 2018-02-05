<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $guarded = ['id'];

    public function order() {
        return $this->belongsTo('App\Order');
    }

    public function type() {
        return $this->hasOne('App\ActionType');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
