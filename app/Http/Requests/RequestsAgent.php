<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestsAgent extends FormRequest
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
            'agentName'=>'required|max:35|unique:agents,agentName,'.$this -> id,
            'Photo'    => 'required|mimes:jpg,jpeg,png',
            'dirId'    =>'required|exists:directorates,id',
            'rigId'    =>'required|exists:rigons,id',

        ];
    }
    public function messages()
    {

        return
         [
            'agentName.required' =>'أسم الكامل مطلوب' ,
            'agentName.max' =>' الاسم الكامل لايزيد عن 35 حرف',
            'agentName.unique' =>'الاسم يجب ان يكون فريد' ,
            'Photo.mimes'=>'لامتداد غير مناسب',
            'Photo.required'=>'الصوره مطلوبه',
            'dirId.required'=>'المديريه مطلوبه',
            'dirId.exists'=>'المديرية غير موجود',
            'rigId.required'=>'المربع مطلوبه',
            'rigId.exists'=>'المربع غير موجود',  
        ];
    }
}
