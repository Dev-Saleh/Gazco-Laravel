<?php

namespace App\Exports;
use App\Models\gazLogs;

use Maatwebsite\Excel\Concerns\FromCollection;



class exportBatchReport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function __construct(String $from,String $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function collection()
    {
         return gazLogs::whereBetween('created_at', [$this->from, $this->to])->get();
    }
}
