<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table='profiles';
    protected $fillable = ['numDaysBookingValid','nameMessage','contentMessage','profilePhoto'];
    public  $timestamps = false;
}
