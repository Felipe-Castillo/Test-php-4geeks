<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    public $timestamps = false;
    protected $table = 'users_roles';
}
