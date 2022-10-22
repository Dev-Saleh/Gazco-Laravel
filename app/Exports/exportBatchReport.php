<?php

namespace App\Exports;
use App\Models\gazLogs;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class exportBatchReport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function __construct(String $from,String $to,String $agentId)
    {
        $this->from = $from;
        $this->to = $to;
        $this->agentId=$agentId;
    }
    public function view() :View
    {
        $gazLogs=gazLogs::select()->where('agentId',$this->agentId)->whereBetween('created_at', [$this->from, $this->to])->get();
        $data['gazLogs']=$gazLogs;
        $data['batchCount']=$gazLogs->count();
        $data['batchResult']=$gazLogs->sum('qty');
        $data['allowBookingCount']=$gazLogs->where('allowBooking','0')->count();
        return view('dashboard.admin.reports.exportbatchExcel',$data);
    }


}
