<?php

namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class gazLogs extends Model
{
    protected $table='gazLogs';
    protected $fillable = ['id','qty','dirId','rigId','staId','agentId','allowBooking','qtyRemaining','notice','validOfSell','created_at'];
    public  $timestamps = false;
    public function directorate()
    {
        return $this->belongsTo(Directorate::class,'dirId');
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class,'agentId');
    }
    public function rigon()
    {
        return $this->belongsTo(Rigon::class,'rigId');
    }
    public function station()
    {
        return $this->belongsTo(Station::class,'staId');
    }
    public function getvalidOfSell()
    {
        return $this->validOfSell == 0 ? 'تم البيع ' : 'لم يتم البيع';
    }
    public function getallowBooking()
    {
       return $this->allowBooking == 0 ? 'true' : 'false';    
    }
}
