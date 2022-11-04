<?php

namespace App\Exports;

use App\Models\logsBooking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class exportLogBookingReport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function __construct(String $valueNumBatch)
    {
        $this->valueNumBatch = $valueNumBatch;
  
    }
    public function view() :View
    {
     
        $LogBookingCitizen=logsBooking::with(
            [
              'citizen'=>function($q)
                {
                    $q->select('id','citName','mobileNum','unblockDate');
                }
            ]
        )->select('id','citId','statusBooking','created_at')->where('NumBatch',$this->valueNumBatch)->get();
        $data['LogBookingCitizen']=$LogBookingCitizen;
        $data['CitizenSB1']=$LogBookingCitizen->where('statusBooking','1');
        $data['CitizenSB2']=$LogBookingCitizen->where('statusBooking','2');
        $data['CitizenCount']=$LogBookingCitizen->count();
        $data['CitizenCountSB1']=$LogBookingCitizen->where('statusBooking','1')->count();
        $data['CitizenCountSB2']=$LogBookingCitizen->where('statusBooking','2')->count();

        return view('dashboard.observer.checkBooking.exportLogBookingExcel',$data);
    }
}
