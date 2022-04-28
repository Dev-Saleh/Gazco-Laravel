<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestsEmployees extends FormRequest
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
        return
        [
            'empFullName' =>'required|max:35|unique:employees,empFullName,'.$this -> id,
            'empUserName' =>'required|max:30|unique:employees,empUserName,'.$this->id,
            'empPassword' =>'required|max:30|min:6|unique:employees,empPassword,'.$this->id,
            'empPhoto'    => 'mimes:jpg,jpeg,png',
            'empRole'     => 'required|in:1,0',
        ];
      
    }
    public function messages()
    {

        return
         [
            'empFullName.required' =>'أسم الكامل مطلوب' ,
            'empFullName.max' =>' الاسم الكامل لايزيد عن 35 حرف',
            'empFullName.unique' =>'الاسم يجب ان يكون فريد' ,

            'empUserName.required' =>'أسم المستخدم مطلوب' ,
            'empUserName.max' =>'لايزيد عن 30 حرف',
            'empUserName.unique' =>'الاسم يجب ان يكون فريد' ,

            'empPassword.required' =>'كلمه السر مطلوب' ,
            'empPassword.max' =>'لايزيد عن 30 حرف',
            'empPassword.min' =>'لايقل عن 6 حرف',
            //'empPassword.confirmed' =>'confirmed كلمه السر ',
            'empPassword.unique' =>'كلمه السر مطلوب' ,
             
            'empPhoto.mimes'=>'لامتداد غير مناسب',
             
            'empRole.required'=>'الصلاحية مطلوب',
            'empRole.in'=>'الصلاحية يجب ان تكون موجوده',

        ];
    }
}
