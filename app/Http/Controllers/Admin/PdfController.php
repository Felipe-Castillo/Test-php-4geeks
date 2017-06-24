<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use App\Category;

class PdfController extends Controller
{
     public function index()
    {
        return view("admin/pdf/index");
    }


      public function crearPDF($datos,$vistaurl,$tipo)
    {

        $data = $datos;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        switch ($tipo) {
        	case '1':
        		return $pdf->stream('reporte');
        		break;
        	
        	case '2':
        		return $pdf->download('reporte.pdf');
        		break;
        }
        
    }


    public function report($tipo){

     $vistaurl="admin/pdf/reporte";
     
     switch ($tipo) {
     	case '1':
     		$taks= Task::select('tasks.id','tasks.title','tasks.note','tasks.status','c.name as category')->leftjoin('categories as c', 'c.id', '=', 'tasks.category_id')->where('tasks.status','=',1)->get();
     		break;
      case '2':
     	$taks= Task::select('tasks.id','tasks.title','tasks.note','tasks.status','c.name as category')->leftjoin('categories as c', 'c.id', '=', 'tasks.category_id')->where('tasks.status','=',1)->get();
     	break;
     	case '3':
     		$taks= Task::select('tasks.id','tasks.title','tasks.note','tasks.status','c.name as category')->leftjoin('categories as c', 'c.id', '=', 'tasks.category_id')->where('tasks.status','=',0)->get();
     		$tipo=1;
     		break;
     	case '6':
     		$taks= Task::select('tasks.id','tasks.title','tasks.note','tasks.status','c.name as category')->leftjoin('categories as c', 'c.id', '=', 'tasks.category_id')->where('tasks.status','=',0)->get();
     		$tipo=2;
     		break;

     case '4':
     	$taks= Task::select('tasks.id','tasks.title','tasks.note','tasks.status','c.name as category')->leftjoin('categories as c', 'c.id', '=', 'tasks.category_id')->get();
     	$tipo=1;
     	break;
     	case '5':
     	$taks= Task::select('tasks.id','tasks.title','tasks.note','tasks.status','c.name as category')->leftjoin('categories as c', 'c.id', '=', 'tasks.category_id')->get();
     	$tipo=2;
     	break;
     	
     }

     
     
     return $this->crearPDF($taks, $vistaurl,$tipo);




    }
}
