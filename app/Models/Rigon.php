<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Rigon extends Model
{
    protected $table='rigons';
    protected $fillable = ['id','rigon_name'];


    public  $timestamps = false;
}
