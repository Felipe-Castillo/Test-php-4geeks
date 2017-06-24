<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use View;
use Redirect;
use Yajra\Datatables\Datatables;
use App\Task;
use App\Category;
class TaskController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(){

        return View::make("admin/task/index");
    }

   

    public function indexDatatable(){

    
		$taks= Task::select('tasks.id','tasks.title','tasks.note','tasks.status','tasks.date as date','c.name as category')
		->leftjoin('categories as c', 'c.id', '=', 'tasks.category_id')->get();
    
        $datatables =  app('datatables')->of($taks);
        

       $datatables->addColumn('action', function ($taks) {
       		
                	return '<a href="/admin/task/edit/'.$taks->id.'" class="btn btn-xs btn-primary f-left"><i class="fa fa-pencil"></i></a><button onClick=deleteTask('.$taks->id.'); class="btn btn-xs btn-danger" data-id="'.$taks->id.'"><i class="glyphicon glyphicon-trash"></i></button>';
               
        });
        $datatables->editColumn('checkmark', function($taks) {
            return '<input type="checkbox" id="chk" name="chk[]" class="case" value="'.$taks->id.'">';
         });

        $datatables->editColumn('status', function ($taks) {
        if ($taks->status == 0) return 'Pendiente';
        if ($taks->status == 1) return 'Finalizada';
        });

        $datatables->rawColumns(['checkmark','action']);
        return $datatables->make(true);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
   {
   		$categories= Category::select("id","name")->get();
        return View::make("admin/task/add")->with(array("category"=>$categories));
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      
        
        $task_id =$request->input('id');

        
        if(!empty($task_id))
        {
            
            // Check category Exist
                $task = new Task();
                $task->title = $request->input('title');
                $task->id = $request->input('id');
                //The name has already been taken
                $isExist = $task->isTaskExist();
                
                if($isExist)
                {
                    $response["success"]=false;
                    $response["message"]="tomado";
                }else{
                
          $i_id  =  DB::table('tasks')
            ->where('id',$task_id)
            ->update(['title' => $request->input('title'),'note'=>$request->input('note'),'status'=>$request->get('status'),'date'=>$request->get('date'),'category_id'=>$request->category]);
            $response["success"]=true;
            $response["message"]="modificado";
            }
            
            
        }
        else{


            $i_id  = DB::table('tasks')->insert(array('title' =>$request->input('title'),'note'=>$request->input('note'),'status'=>$request->get('status'),'date'=>$request->get('date'),'category_id'=>$request->category));

        $response["success"]=true;
        $response["message"]="guardado";


            
        }
        
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $task  = DB::table('tasks')->where('id', '=' ,$id)->get();
        $categories= Category::select("id","name")->get();
        return View::make("admin/task/add")->with(array('task'=>$task[0],'category'=>$categories));
    }

    public function update($id)
    {

        $insurance_id  = DB::table('specialities')->update(array(
            'name' => $insurance_name,
        ))->where('id','=','$id');

        if($insurance_id){
            return redirect("admin/specialities/index");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        DB::table('tasks')->delete($id);
        $request->session()->flash('success', 'tarea eliminada correctamente!');
        return response()->json([ "success" => "yes"]);
    }

     public function delete_multi_tasks(Request $request)
    {   
        $tasks_ids = $request->input('chk');
        if ( empty($tasks_ids) == 1 || count($tasks_ids) <= 0 )
        {
            if($request->ajax())
            {
                $arr                        = array();
                $arr['status']          = 500;          
                $arr['message']     = 'No Checkbox selected!';
                
                echo json_encode($arr);
                return;
            }
            else
            {
                $request->session()->flash('success', 'No Checkbox selected!');
                redirect($_SERVER["HTTP_REFERER"]);
            }   
        }       
        else
        {   
            foreach($tasks_ids as  $ids)
            {
                   DB::table('tasks')->delete($ids);
            }
            
            if($request->ajax())
            {
                $arr                        = array();
                $arr['status']          = 200;          
                $arr['message']     = 'tarea seleccionada eliminada correctamente';
                
                echo json_encode($arr);
                return;
            }
            else
            {
                $request->session()->flash('success', 'tarea seleccionada eliminada correctamente!');
                redirect($_SERVER["HTTP_REFERER"]);
            }   
        }
    }

     public function done_multi_tasks(Request $request)
    {   
        $tasks_ids = $request->input('chk');
        if ( empty($tasks_ids) == 1 || count($tasks_ids) <= 0 )
        {
            if($request->ajax())
            {
                $arr                        = array();
                $arr['status']          = 500;          
                $arr['message']     = 'No Checkbox selected!';
                
                echo json_encode($arr);
                return;
            }
            else
            {
                $request->session()->flash('success', 'No Checkbox selected!');
                redirect($_SERVER["HTTP_REFERER"]);
            }   
        }       
        else
        {   
            foreach($tasks_ids as  $ids)
            {
           
          

            DB::statement(DB::raw("UPDATE tasks SET status =(CASE
                            WHEN status='1'
                            THEN 0
                            ELSE 1
                            END)
                    WHERE id=$ids"
                        ));

           
            }
            
            if($request->ajax())
            {
                $arr                        = array();
                $arr['status']          = 200;          
                $arr['message']     = 'Tarea marcada/desmarcada correctamente';
                
                echo json_encode($arr);
                return;
            }
            else
            {
                $request->session()->flash('success', 'Tarea marcada/desmarcada correctamente!');
                redirect($_SERVER["HTTP_REFERER"]);
            }   
        }
    }
}
