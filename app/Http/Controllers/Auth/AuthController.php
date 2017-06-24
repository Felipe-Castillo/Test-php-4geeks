<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Redirect;
use Illuminate\Http\Request;
use Mail;
use Hash;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectAfterLogout = '/auth/login';
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new authentication controller instance.
     */
   public function __construct()
    {
       //$this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showLoginForm()
    {

        return view('admin.auth.login');
    }

     protected function getRegister()
    {
        return view("admin.auth.register");
    }
    
    
     protected function postRegister(Request $request)
    {
         // Default User Type "User"
        $role = Role::where('name','=','User')->first();//Obtengo un rol
        //Creamos el usuario
        $validate=User::isEmail($request['email']);
        if (!$validate) {
            
    
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $user->roles()->attach($role);
        if ($user) 
        {
           $response["success"]=true;
        }else
        {
          $response["success"]=false;
         
        }
    }else
    {
        $response["success"]=false;
        $response["message"]="correo";
    }
        
        return $response;
    }
     

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            //'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }
}

