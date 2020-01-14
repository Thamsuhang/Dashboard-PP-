<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User AS Auth;

class Admin extends Auth
{
    protected $fillable=['name','username','email','password','status','image'];
    public function privilege()
    {
        return $this->belongsToMany('App\Models\Privilege','manage_privileges','admin_id','privilege_id','id');
    }
}
