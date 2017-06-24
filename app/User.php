<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role','users_roles');
    }


    public function isAdmin()
    {
        
        foreach ($this->roles()->get() as $role)
        {
           
            if ($role->name == 'Admin')
            {
                return true;
            }
        }

        return false;
    }

     public static function isEmail($email)
    {
        
        $data=User::select('id')->where('email','=',$email)->get();

        if (count($data)>0) 
        {
            return true;
        }else
        {
            return false;
        }
    }
}
