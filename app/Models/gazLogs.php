<?php

namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class gazLogs extends Model
{
    protected $table='gazLogs';
    protected $fillable = ['id','qty','dirId','rigId','staId','agentId','qtyRemaining','notice','created_at'];
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
    public function station()
    {
        return $this->belongsTo(Station::class,'staId');
    }
    public function getStatusBatch()
    {
         if($this->statusBatch == '1' )
         {
             return 'لم يتم فتح الحجز'; 
         }
        else if($this->statusBatch == '2')
        { return 'مفتوح الحجز';
        }
        else if($this->statusBatch == '3')
        {
           return 'تم نفاد الكميه';
        }
    }
    
}
