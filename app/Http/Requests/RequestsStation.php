<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestsStation extends FormRequest
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
            'Station_name' =>'required|max:25',
           
        ];
    }
    public function messages()
    {

        return [
            'Station_name.required' =>'أسم المحظة مطلوب' ,
            'Station_name.max' =>'لايزيد عن 25 حرف',
           // 'directorate_name.unique' =>'الاسم يجب ان يكون فريد' ,
        ];
    }
}

