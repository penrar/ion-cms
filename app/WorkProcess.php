<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkProcess extends Model
{
    public function order() {
        return $this->belongsToMany('App\Order', 'order_work_process');
    }
}
