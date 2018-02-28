<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;

class Role extends Model
{
    protected $guarded = ['id'];

    public function users() {
        return $this->hasMany('App\User');
    }

    public function getCodeAttribute() {
        return $this->role_code;
    }

    public static function atLeast($role_level) {
        return Auth::user()->role->role_level >= $role_level;
    }

    public static function hasRole($role_code) {
        return Auth::user()->role->code == $role_code;
    }
}
