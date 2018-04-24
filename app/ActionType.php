<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionType extends Model
{
    protected $guarded = ['id'];

    public function actions() {
        return $this->hasMany('App\Action');
    }
}
