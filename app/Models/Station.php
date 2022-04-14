<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    
    protected $table='stations';
    protected $fillable = ['id','Station_name'];
    public  $timestamps = false;

    public function gaz_Logs()
    {
        return $this->hasMany(gaz_Logs::class, 'stations_id','id');
    }
}
