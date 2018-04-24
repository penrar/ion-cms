<?php

namespace App;

use App\ActionType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function order() {
        return $this->belongsTo('App\Order');
    }

    public function actionType() {
        return $this->belongsTo('App\ActionType');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    function getTypeAttribute() {
        return ActionType::select('action_name')->where('id', '=', $this->action_type_id)->first()->action_name;
    }
}
