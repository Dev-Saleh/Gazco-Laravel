<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestsCitizen extends FormRequest
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
            'citName'       =>'required|max:35|unique:citizens,citName,'.$this -> id,
            'identityNum'   =>'required|max:30|unique:citizens,identityNum,'.$this -> id,
            'citPassword'   =>'required|max:30|min:6|unique:citizens,citPassword,'.$this -> id,
            'mobileNum'     =>'required|max:9|min:9|unique:citizens,mobileNum,'.$this -> id,
            'attachment'    =>'required|mimes:jpg,jpeg,png',
            'dirId'         =>'required|exists:directorates,id',
            'rigId'         =>'required|exists:rigons,id',

        ];
    }
    public function messages()
    {

        return
         [
            'citName.required'           => 'أسم الكامل مطلوب' ,
            'citName.max'                => ' الاسم الكامل لايزيد عن 35 حرف',
            'citName.unique'             => 'الاسم يجب ان يكون فريد' ,
            'identityNum.required'       => 'رقم الهويه مطلوب' ,
            'identityNum.max'            => 'رقم الهوية لايزيد عن 30 رقم',
            'identityNum.unique'         => 'رقم الهويه يجب ان يكون فريد' ,
            'citPassword.required'       => ' رمز السري مطلوب' ,
            'citPassword.max'            => 'رقم الهوية لايزيد عن 30 رقم',
            'citPassword.min'            => 'رقم الهوية لايقل عن 6 رقم',
            'citPassword.unique'         => 'رمز السري يجب ان يكون فريد' ,
            'mobileNum.required'         => 'رقم الجوال مطلوب' ,
            'mobileNum.max'              => 'رقم الجوال لايزيد عن 9 رقم',
            'mobileNum.min'              => 'رقم الجوال لايقل عن 9 رقم',
            'mobileNum.unique'           => 'رقم الجوال يجب ان يكون فريد' ,
           
           
            'attachment.mimes'    =>  'لامتداد غير مناسب',
            'attachment.required' =>'الصوره مطلوبه',
            'dirId.required'      =>'المديريه مطلوبه',
            'dirId.exists'        =>'المديرية غير موجود',
            'rigId.required'      =>'المربع مطلوبه',
            'rigId.exists'        =>'المربع غير موجود',  
        ];
    }
}
