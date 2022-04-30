<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observer extends Model
{
    protected $table='observers';
    protected $fillable = ['id','obsName','obsUserName','obsPassword','dirId','rigId','agentId'];
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
    public function citizen()
    {
        return $this->hasMany(Citizen::class, 'obsId','id');
    }

}
