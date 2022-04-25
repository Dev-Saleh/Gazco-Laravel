<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestsDirectorates extends FormRequest
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
            'dirName' =>'required|max:25|unique:directorates,dirName,'.$this -> id,
        ];
    }
    public function messages()
    {

        return [
            'dirName.required' =>'أسم المديرية مطلوب' ,
            'dirName.max' =>'لايزيد عن 25 حرف',
            'dirName.unique' =>'الاسم يجب ان يكون فريد' ,
        ];
    }
}

