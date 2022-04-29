<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    protected $table='citizens';
    protected $fillable = ['id','citizen_name','mobile_num','identity_num','attachment','citizen_password','checked','directorate_id','rigons_id','observer_id','created_at'];
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
        return $this->belongsTo(Observer::class,'observer_id');
    }
    public function logsBooking()
    {
        return $this->hasMany(logs_Booking::class, 'citizen_id','id');
    }
    public function getCheckedAttribute($val)
    {
        return $val == '0' ? 'لا' : 'نعم';
    }

}
