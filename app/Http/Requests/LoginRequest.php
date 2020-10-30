<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'     => 'required|email|exists:users,email'      ,
            'password'  => 'required'                                ,        
        ];
    }


    public function messages()
    {
        return [
            'email.required'        =>  __('site.email_required')      ,
            'email.exists'          =>  __('site.email_not_exists')    ,
            'email.email'           =>  __('site.email_email')         ,
            'password.required'     =>  __('site.password_required')   ,
        ];
    }
}
