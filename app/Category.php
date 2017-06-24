<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     public $timestamps = false;
     protected $table = 'categories';

      public function isCategoryExist() {
    	$category=$this->select("id")
                    ->where("name","=",$this->name)
                    ->where("id",'!=',$this->id)
                    ->get();
   
    		if($category->count()>0)
    		{
    			return true;
    		}
    		else
    		{
    			return false;
    		}	
    }


    public function checkCategory() {
        $category=$this->select("id")
                    ->where("name","=",$this->name)
                    ->get();
   
            if($category->count()>0)
            {
                return true;
            }
            else
            {
                return false;
            }   
    }
}
