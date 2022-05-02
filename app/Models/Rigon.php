<?php

namespace App\Models;

use App\Models\Directorate as ModelsDirectorate;

use Illuminate\Database\Eloquent\Model;

class Rigon extends Model
{
    protected $table='rigons';
    protected $fillable = ['id','rigName','dirId'];

    public  $timestamps = false;
    public function agent()
    {
        return $this->hasMany(Agent::class, 'rigId','id');
    }
    public function directorate()
    {
        return $this->belongsTo(ModelsDirectorate::class,'dirId');
    }
    public function observer()
    {
        return $this->hasMany(Observer::class, 'rigId','id');
    }
    public function citizen()
    {
        return $this->hasMany(Citizen::class, 'rigId','id');
    }
    public function gazLogs()
    {
        return $this->hasMany(gazLogs::class, 'rigId','id');
    }
    

}
