<?php

namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class logsBooking extends Model
{
    protected $table='logbookings';
	
   
    protected $fillable =['id','RecivingDate','statusBooking','citId','numBatch','created_at','updated_at'];
    public  $timestamps = false;

    public function citizen()
    {
        return $this->belongsTo(Citizen::class,'citId');
    }
    public function getStatusBooking()
    {
        return  $this -> statusBooking  == 0 ?  'لم يتم الاستلام'   : 'تم الاستلام' ;
    }
  

}
