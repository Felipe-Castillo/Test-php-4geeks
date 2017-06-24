<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use View;
use Redirect;
use Yajra\Datatables\Datatables;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(){

        return View::make("admin/category/index");
    }

   

    public function indexDatatable(){

    
		$category= Category::select('id','name')->get();
    //Modificamos elementos de la plantilla de los datatables
        $datatables =  app('datatables')->of($category);
        

       $datatables->addColumn('action', function ($category) {
       		
                	return '<a href="/admin/category/edit/'.$category->id.'" class="btn btn-xs btn-primary f-left"><i class="fa fa-pencil"></i></a><button onClick=deleteCategory('.$category->id.'); class="btn btn-xs btn-danger" data-id="'.$category->id.'"><i class="glyphicon glyphicon-trash"></i></button>';
               
        });
        $datatables->editColumn('checkmark', function($category) {
            return '<input type="checkbox" id="chk" name="chk[]" class="case" value="'.$category->id.'">';
         });

        


        $datatables->rawColumns(['checkmark','action']);
        return $datatables->make(true);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create(){

        return View::make("admin/category/add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       


        $category_name =$request->input('name');
        $category_id =$request->input('id');

        
        if(!empty($category_id))
        {
            
            // Check category Exist
                $category = new Category();
                $category->name = $request->input('name');
                $category->id = $request->input('id');
                //The name has already been taken
                $isExist = $category->isCategoryExist();
                
                if($isExist)
                {
                    $response["success"]=false;
                    $response["message"]="tomado";
                }else {
                
          $i_id  =  DB::table('categories')
            ->where('id',$category_id)
            ->update(['name' => $category_name]);
            
            $response["success"]=true;
            $response["message"]="modificado";
            }
        }
        else{
                $category = new Category();
                $category->name = $request->input('name');
                //The name has already been taken
                $isExist = $category->checkCategory();
                
                if($isExist)
                {
                    $response["success"]=false;
                    $response["message"]="tomado";
                }else{

            $i_id  = DB::table('categories')->insert(array(
            'name' => $category_name
            ));
        $response["success"]=true;
        $response["message"]="guardado";
}
            
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $category  = DB::table('categories')->where('id', '=' ,$id)->get();
        return View::make("admin/category/add")->with(array('category'=>$category[0]));
    }
    public function update($id){

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
        DB::table('categories')->delete($id);
        $request->session()->flash('success', 'categoria eliminada correctamente!');
        return response()->json([ "success" => "yes"]);
    }

     public function delete_multi_categories(Request $request)
    {   
        $categories_ids = $request->input('chk');
        if ( empty($categories_ids) == 1 || count($categories_ids) <= 0 )
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
            foreach($categories_ids as  $ids)
            {
                   DB::table('categories')->delete($ids);
            }
            
            if($request->ajax())
            {
                $arr                        = array();
                $arr['status']          = 200;          
                $arr['message']     = 'categoria seleccionada eliminada correctamente';
                
                echo json_encode($arr);
                return;
            }
            else
            {
                $request->session()->flash('success', 'categoria seleccionada eliminada correctamente!');
                redirect($_SERVER["HTTP_REFERER"]);
            }   
        }
    }
}
