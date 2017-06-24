<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     public $timestamps = false;
     protected $table = 'tasks';

       public function isTaskExist() {
    	$task=$this->select("id")
                    ->where("title","=",$this->title)
                    ->where("id",'!=',$this->id)
                    ->get();
   
    		if($task->count()>0)
    		{
    			return true;
    		}
    		else
    		{
    			return false;
    		}	
    }
}
