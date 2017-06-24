<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
     public $timestamps = false;
     protected $table = 'subjects';

      public function isSubjectExist() {
    	$subject=$this->select("id")
                    ->where("name","=",$this->name)
                    ->where("id",'!=',$this->id)
                    ->get();
   
    		if($subject->count()>0)
    		{
    			return true;
    		}
    		else
    		{
    			return false;
    		}	
    }
}
