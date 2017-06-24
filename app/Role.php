<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{
   use Notifiable;

   public $timestamps = false;

   protected $fillable = ['name'];

   public function users() {
   	
        return $this->belongsToMany('App\User', 'users_roles', 'user_id', 'role_id');
   }
}
