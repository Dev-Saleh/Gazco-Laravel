<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class familyMembers extends Model
{
    //
    protected $table='family_members';
    protected $fillable = ['id','fmName','identityNum','relationship','attachment','sex','age','citId'];

    public function citizen()
    {
        return $this->belongsTo(Citizen::class,'citId');
    }
    public function getSexAttribute($val)
    {
        $value= $val == '0' ? 'ذكر' : 'أنثى';
         $sex['value']=$value;
         $sex['index']=$val;
         return $sex;

    }
    public function getRelationshipAttribute($val)
    {
        
         if($val == '0')       $value= 'أب';
         else if($val == '1')  $value= 'أم';
         else if($val == '2')  $value= 'أخ';
         else if($val == '3')  $value= 'أخت';
         else if($val == '4')  $value= 'إبن';
         else if($val == '5')  $value= 'إبنه';

         $relationship['value']=$value; 
         $relationship['index']=$val;   
         return $relationship;

         
    }
    public function getattachmentAttribute($val)
    {
        $attachment['exsit']=file_exists(public_path('assets/images/familymember/'.$val));
        if(!is_null($val) && file_exists(public_path('assets/images/familymember/'.$val)) && $val!='')
           {
                  $attachment['valsrc']=asset('assets/images/familymember/'.$val);
                  $attachment['public_path']=public_path('assets/images/familymember/'.$val);
    
                 return $attachment;

           }
      else 
           {
                    $attachment['valsrc']=''; //return image not found saleh get Image 
                    return $attachment; 
           }                                  
           
    }
}
