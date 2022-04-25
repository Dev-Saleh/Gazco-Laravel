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
            'staName' =>'required|max:25|unique:stations,staName,'.$this->id,
           
        ];
    }
    public function messages()
    {

        return [
            'staName.required' =>'أسم المحظة مطلوب' ,
            'staName.max' =>'لايزيد عن 25 حرف',
            'staName.unique' =>'الاسم يجب ان يكون فريد' ,
        ];
    }
}

