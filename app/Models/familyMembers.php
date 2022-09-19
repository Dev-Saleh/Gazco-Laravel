<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class familyMembers extends Model
{
    //
    protected $table='family_members';
    protected $fillable = ['id','fmName','identityNum','relationship','sex','age','citId'];

    public function citizen()
    {
        return $this->belongsTo(Citizen::class,'citId');
    }
    public function getSexAttribute($val)
    {
        return $val == '0' ? 'دكر' : 'أنثى';
    }
}
