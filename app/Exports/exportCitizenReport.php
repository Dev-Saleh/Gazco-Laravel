<?php

namespace App\Exports;

use App\Models\Citizen;
use App\Models\gazLogs;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class exportCitizenReport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function __construct(String $agentId)
    {
        $this->agentId=$agentId;
    }
    public function view() :View
    {
        $citizens=Citizen::with(
            [
              'directorate'=>function($q)
              {
                $q->select('id','dirName');
              }
              ,'rigon'=>function($q)
              {
                $q->select('id','rigName');
              }
              ,'observer'=>function($q)
              {
                  $q->with(
                  [
                    'agent'=>function($q) 
                    {
                      $q->select('id','agentName');
                    }
                  ]
                  )->select('id','agentId','obsName')->get();
              }
            ]
            )->select('id','citName','dirId','rigId','obsId','identityNum','mobileNum','checked')
            ->wherehas('observer', function ($q)
            {
                $q->where('agentId',$this->agentId);
            })->get();
        $data['citizens']=$citizens;
       
        return view('dashboard.admin.reports.exportCitizenExcel',$data);
    }


}
