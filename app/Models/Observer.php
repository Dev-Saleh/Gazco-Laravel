<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observer extends Model
{
    protected $table='observers';
    protected $fillable = ['id','observer_name','observer_username','observer_password','directorate_id','rigons_id','agent_id'];
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
    public function citizen()
    {
        return $this->hasMany(Citizen::class, 'observer_id','id');
    }

}
