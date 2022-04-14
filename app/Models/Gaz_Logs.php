<?php

namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class gaz_Logs extends Model
{
    protected $table='gaz_Logs';
    protected $fillable = ['id','qty','directorate_id','rigons_id','stations_id','agent_id','notice','created_at'];
    public  $timestamps = false;
    public function directorate()
    {
        return $this->belongsTo(Directorate::class,'directorate_id');
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class,'agent_id');
    }
    public function rigon()
    {
        return $this->belongsTo(Rigon::class,'rigons_id');
    }
    public function station()
    {
        return $this->belongsTo(Station::class,'stations_id');
    }
}
