<?php

namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class logs_Booking extends Model
{
    protected $table='logs__bookings';
	
   
    protected $fillable =['id','booking_date','Reciving_date','status_booking','citizen_id','NumBatch','created_at','updated_at'];
    public  $timestamps = true;
    public function citizen()
    {
        return $this->belongsTo(Citizen::class,'citizen_id');
    }

}
