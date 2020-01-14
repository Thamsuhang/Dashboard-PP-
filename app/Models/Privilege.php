<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $fillable=['privilege_name','status'];
    public function privilege()
    {
        return $this->belongsToMany('App\Models\Privilege','manage_privilege','privilege_id','admin_id','id');
    }

}
