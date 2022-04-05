<?php
namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Directorate extends Model
{
    protected $table='directorates';
    protected $fillable = ['id','directorate_name'];


    public  $timestamps = false;

}
