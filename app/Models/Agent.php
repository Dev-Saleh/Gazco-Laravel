<?php

namespace App\Models;

use Directory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table='agents';
    protected $fillable = ['id','agentName','agentPassword','Photo','dirId','rigId'];
    public  $timestamps = false;
    public function directorate()
    {
        return $this->belongsTo(Directorate::class,'dirId');
    }
    public function rigon()
    {
        return $this->belongsTo(Rigon::class,'rigId');
    }
    public function observer()
    {
        return $this->hasMany(Observer::class, 'agentId','id');
    }
    public function gazLogs()
    {
        return $this->hasMany(gazLogs::class, 'agentId','id');
    }

    public function getPhotoAttribute($val)
    {
        $Photo['exsit']=file_exists(public_path('assets/images/agents/'.$val));
        if(!is_null($val) && file_exists(public_path('assets/images/agents/'.$val)) && $val!='')
           {
                  $Photo['valsrc']=asset('assets/images/agents/'.$val);
                  $Photo['public_path']=public_path('assets/images/agents/'.$val);
                   return $Photo;

           }
      else 
           {
                    $Photo['valsrc']=''; //return image not found saleh get Image 
                    return $Photo; 
           }                                     
           
    }


    

   
}
