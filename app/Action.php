<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    use SoftDeletes;

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
