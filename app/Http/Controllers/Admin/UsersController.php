<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Yajra\Datatables\Datatables;
use App\User;
use App\Role;
use App\userRoles;
use View;
use App;
use DB;


class UsersController extends BaseController
{
    
    public function index() {
    	

    	return View::make("admin/user/index");
    }

   public function indexDatatable(){

    
    $user= User::select('users.id','users.first_name', 'users.last_name', 'users.email','r.name as role')
    ->leftjoin('users_roles as ur', 'ur.user_id', '=', 'users.id')
    ->leftjoin('roles as r', 'r.id', '=', 'ur.role_id')
    ->get();
    //Modificamos elementos de la plantilla de los datatables
        $datatables =  app('datatables')->of($user);
        

       $datatables->addColumn('action', function ($user) {
          
                  return '<a href="/admin/user/edit/'.$user->id.'" class="btn btn-xs btn-primary f-left"><i class="fa fa-pencil"></i></a><button onClick=deleteUser('.$user->id.'); class="btn btn-xs btn-danger" data-id="'.$user->id.'"><i class="glyphicon glyphicon-trash"></i></button>';
               
        });
        $datatables->editColumn('checkmark', function($user) {
            return '<input type="checkbox" id="chk" name="chk[]" class="case" value="'.$user->id.'">';
         });
        $datatables->rawColumns(['checkmark','action']);
        return $datatables->make(true);


    }

    public function destroy(Request $request,$id)
    {	

        $User = User::findOrFail($id);
        $User->delete();
        $request->session()->flash('success', 'Usuario eliminado correctamente!');
        return response()->json([ "success" => "yes"]);
        //return redirect("admin/user")->with('success', 'User deleted successfully!');

    }

    public function delete_multi_user(Request $request)
    {   
        $user_ids = $request->input('chk');
        if ( empty($user_ids) == 1 || count($user_ids) <= 0 )
        {
            if($request->ajax())
            {
                $arr                        = array();
                $arr['status']          = 500;          
                $arr['message']     = 'No se seleccionó la casilla de verificación.';
                
                echo json_encode($arr);
                return;
            }
            else
            {
                $request->session()->flash('success', 'No se seleccionó la casilla de verificación.');
                redirect($_SERVER["HTTP_REFERER"]);
            }   
        }       
        else
        {   
            foreach($user_ids as  $id)
            {
                     $User = User::findOrFail($id);
        			     $User->delete();
            }
            
            if($request->ajax())
            {
                $arr                        = array();
                $arr['status']          = 200;          
                $arr['message']     = 'Usuario seleccionado eliminado correctamente.';
                
                echo json_encode($arr);
                return;
            }
            else
            {
                $request->session()->flash('success', 'Usuario seleccionado eliminado correctamente.');
                redirect($_SERVER["HTTP_REFERER"]);
            }   
        }
    }
    
     public function edit($id){

        $user  = DB::table('users')->where('id', '=' ,$id)->get();
        $role=DB::table('roles')->get();
        return View::make("admin/user/add")->with(array('user'=>$user[0],'role'=>$role));
    }


	 public function store(Request $request)
    {
    
        $user_name =$request->input('First_name');
        $user_id =$request->input('id');

        
        if(!empty($user_id))
        {
            
               
                $user = User::find($request->input('id'));
                $user->first_name = $request->input('First_name');
                $user->last_name = $request->input('last_name');
                $user->email = $request->input('email');
                $user->password = bcrypt($request->input('password'));
                DB::table('users_roles')
                ->where('user_id',$request->input('id'))
                ->update(['role_id' => $request->get('role')]);
                $r=$user->save();

        
            if ($r) 
            {
                $response["success"]=true;
            }else{
                $response["success"]=false;
              
            }
          
            
        }
       return $response; 
    }
    
    
 
	
	

  
}
