<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestsGazLogs extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dirId'    =>'required|exists:directorates,id',
            'rigId'    =>'required|exists:rigons,id',
            'agentId'  =>'required|exists:agents,id',
            'qty'      =>'required|numeric' ,
            'staId'    =>'required|exists:stations,id',
            'notice'   =>'max:200',



        ];
    }
    public function messages()
    {

        return
         [
            
            'dirId.required'=>'المديريه مطلوبه',
            'dirId.exists'=>'المديرية غير موجود',

            'rigId.required'=>'المربع مطلوبه',
            'rigId.exists'=>'المربع غير موجود', 

            'agentId.required'=>'أسم الوكيل مطلوب',
            'agentId.exists'=>'الوكيل غير موجود',  

            'staId.required'=>'اسم المحظه مطلوب',
            'staId.exists'=>'اسم المحظه غيؤ موجود', 

            'qty.required'=>'الكميه مطلوبه',
            'qty.numeric'=>'الكمية لازم تكون أرقام', 
            'notice.max' =>'الملاحظات يجب ان لاتتجاوز 200 حر',

        ];
    }
}
