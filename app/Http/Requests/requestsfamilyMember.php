<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestsfamilyMember extends FormRequest
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
            'fmName'         =>  'required|max:35|unique:family_members,fmName,'.$this -> id,
            'identityNum'    =>  'required|max:30|unique:family_members,identityNum,'.$this -> id,
            'citId'          =>  'required|exists:citizens,id',
            'sex'            =>  'required|in:1,0',
            'relationship'   =>  'required|in:0,2,3,4,5',
        ];
    }
    public function messages()
    {

        return
         [
            'fmName.required'            => 'أسم الكامل مطلوب' ,
            'fmName.max'                 => ' الاسم الكامل لايزيد عن 35 حرف',
            'fmName.unique'              => 'الاسم يجب ان يكون فريد' ,
            'identityNum.required'       => 'رقم الهويه مطلوب' ,
            'identityNum.max'            => 'رقم الهوية لايزيد عن 30 رقم',
            'identityNum.unique'         => 'رقم الهويه يجب ان يكون فريد' ,
            'citId.required'             =>'رب الاسره مطلوبه',
            'citId.exists'               =>'رب الاسره غير موجود',
            'sex.required'               =>'الجنس مطلوب',
            'sex.in'                     =>'الجنس يجب ان تكون موجوده',
            'relationship.required'      =>'صلة القرابه مطلوب',
            'relationship.in'            =>'صلة القرابه يجب ان تكون موجوده',   
         ];
    }
}
