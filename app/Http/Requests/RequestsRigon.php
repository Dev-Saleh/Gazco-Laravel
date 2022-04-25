<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestsRigon extends FormRequest
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
            'rigName' =>'required|max:25|unique:rigons,rigName,'.$this->id,
            'dirId' => 'required|exists:directorates,id',
        ];
    }
    public function messages()
    {

        return [

            'rigName.required' =>'أسم المربع مطلوب' ,
            'rigName.max' =>'لايزيد عن 25 حرف',
            'rigName.unique' =>'الاسم يجب ان يكون فريد' ,
            'dirId.required' =>'أسم المديرية مطلوب' ,
            'dirId.exists' =>'أسم المديرية غير موجود' ,
        ];
    }
}
