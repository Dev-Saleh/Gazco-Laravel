<?php
namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Directorate extends Model
{
    protected $table='directorates';
    protected $fillable = ['id','dirName'];


    public  $timestamps = false;

    public function agent()
    {
        return $this->hasMany(Agent::class, 'dirId','id');
    }
    public function rigon()
    {
        return $this->hasMany(Rigon::class, 'dirId','id');
    }
    public function observer()
    {
        return $this->hasMany(Observer::class, 'dirId','id');
    }
    public function citizen()
    {
        return $this->hasMany(Citizen::class, 'dirId','id');
    }
    public function gazLogs()
    {
        return $this->hasMany(gazLogs::class, 'dirId','id');
    }

}
