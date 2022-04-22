<?php

namespace App\Models;

use Directory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table='agents';
    protected $fillable = ['id','Agent_name','Agent_password','photo','directorate_id','rigons_id','directorate_name'];
    public  $timestamps = false;
    public function directorate()
    {
        return $this->belongsTo(Directorate::class,'directorate_id');
    }
    public function rigon()
    {
        return $this->belongsTo(Rigon::class,'rigons_id');
    }
    public function observer()
    {
        return $this->hasMany(Observer::class, 'agent_id','id');
    }
    public function gaz_Logs()
    {
        return $this->hasMany(gaz_Logs::class, 'agent_id','id');
    }

    public function getPhotoAttribute($val)
    {
        $photo['exsit']=file_exists(public_path('assets/images/agents/'.$val));
        if(!is_null($val) && file_exists(public_path('assets/images/agents/'.$val)) && $val!='')
           {
                  $photo['valsrc']=asset('assets/images/agents/'.$val);
                  $photo['public_path']=public_path('assets/images/agents/'.$val);
    
                 return $photo;

           }
      else 
           {
                    $photo['valsrc']=''; //return image not found saleh get Image 
                    return $photo; 
           }                      

               
           
    }


    

   
}
