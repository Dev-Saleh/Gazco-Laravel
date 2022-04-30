<?php

namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class logs_Booking extends Model
{
    protected $table='logs__bookings';
	
   
    protected $fillable =['id','RecivingDate','statusBooking','citId','numBatch','created_at','updated_at'];
    public  $timestamps = true;
    public function citizen()
    {
        return $this->belongsTo(Citizen::class,'citId');
    }
    public function getStatusBooking(){
        return  $this -> statusBooking  == 0 ?  'غير مفعل'   : 'مفعل' ;
    }
  
  

}
