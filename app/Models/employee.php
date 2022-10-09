<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $table='employees';
    protected $fillable = ['id','empFullName','empUserName','empPassword','empPhoto','empRole','created_at','updated_at'];
    public  $timestamps = false;

  
    public function getempRoleAttribute($value)
    {
        return  $value  == 0 ?  "مستخدم"   : "مسؤول" ;
    }
  
    

    public function getempPhotoAttribute($val)
    {
        
        $empPhoto['exsit']=file_exists(public_path('assets/images/employees/'.$val));
        if(!is_null($val) && file_exists(public_path('assets/images/employees/'.$val)) && $val!='')
           {
                  $empPhoto['valsrc']=asset('assets/images/employees/'.$val);
                  $empPhoto['public_path']=public_path('assets/images/employees/'.$val);
                 return $empPhoto;

           }
      else 
           {
                    $empPhoto['valsrc']=''; //return image not found saleh get Image 
                    return $empPhoto; 
           }                      

               
           
    }
    
  
}
