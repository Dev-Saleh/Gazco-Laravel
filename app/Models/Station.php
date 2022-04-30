<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    
    protected $table='stations';
    protected $fillable = ['id','staName'];
    public  $timestamps = false;

    public function gazLogs()
    {
        return $this->hasMany(gazLogs::class, 'staId','id');
    }
}
