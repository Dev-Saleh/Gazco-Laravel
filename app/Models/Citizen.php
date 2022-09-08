<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    protected $table='citizens';
    protected $fillable = ['id','citName','mobileNum','identityNum','attachment','citPassword','checked','dirId','rigId','obsId','created_at'];
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
        return $this->belongsTo(Observer::class,'obsId');
    }
    public function familyMember()
    {
        return $this->hasMany(familyMembers::class, 'citId','id');
    }
    public function logBookings()
    {
        return $this->hasMany(logBookings::class, 'citId','id');
    }
    public function getCheckedAttribute($val)
    {
        return $val == '0' ? 'لا' : 'نعم';
    }
    public function getattachmentAttribute($val)
    {
        $attachment['exsit']=file_exists(public_path('assets/images/citizens/'.$val));
        if(!is_null($val) && file_exists(public_path('assets/images/citizens/'.$val)) && $val!='')
           {
                  $attachment['valsrc']=asset('assets/images/citizens/'.$val);
                  $attachment['public_path']=public_path('assets/images/citizens/'.$val);
    
                 return $attachment;

           }
      else 
           {
                    $attachment['valsrc']=''; //return image not found saleh get Image 
                    return $attachment; 
           }                                  
           
    }

}
