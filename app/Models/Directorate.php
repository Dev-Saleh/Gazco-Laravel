<?php
namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Directorate extends Model
{
    protected $table='directorates';
    protected $fillable = ['id','directorate_name'];


    public  $timestamps = false;

    public function agent()
    {
        return $this->hasMany(Agent::class, 'directorate_id','id');
    }
    public function rigon()
    {
        return $this->hasMany(Rigon::class, 'directorate_id','id');
    }
    public function observer()
    {
        return $this->hasMany(Observer::class, 'directorate_id','id');
    }
    public function citizen()
    {
        return $this->hasMany(Citizen::class, 'directorate_id','id');
    }
    public function gaz_Logs()
    {
        return $this->hasMany(gaz_Logs::class, 'directorate_id','id');
    }

}
