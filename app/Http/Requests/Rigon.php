<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Rigon extends FormRequest
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
            'rigon_name' =>'required|max:25',
           
        ];
    }
    public function messages()
    {

        return [
            'rigon_name.required' =>'أسم المربع مطلوب' ,
            'rigon_name.max' =>'لايزيد عن 25 حرف',
           // 'directorate_name.unique' =>'الاسم يجب ان يكون فريد' ,
        ];
    }
}
