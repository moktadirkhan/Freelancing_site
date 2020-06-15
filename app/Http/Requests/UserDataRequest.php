<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDataRequest extends FormRequest
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
          'skills'=>'required',
        'work_link'=>'required',
        'image'=>'required|image',
        'type_of_developer'=>'required',
        'bio'=>'required',
        //'user_id'=>'required',
                ];
    }
}
