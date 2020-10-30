<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username'  => 'required|unique:users,username'             ,
            'email'     => 'required|email|unique:users,email'      ,
            'password'  => 'required|min:8'                         ,
            'img'       => 'required|mimes:jpeg,png,jpg,svg'  ,
        ];
    }


    public function messages()
    {
        return [
            'username.required'     =>  __('site.username_required')   ,
            'username.unique'       =>  __('site.username_unique')     ,
            'email.required'        =>  __('site.email_required')      ,
            'email.unique'          =>  __('site.email_unique')        ,
            'email.email'           =>  __('site.email_email')         ,
            'password.required'     =>  __('site.password_required')   ,
            'password.min'          =>  __('site.password_min')        ,
            'img.required'          =>  __('site.img_required')        ,
            'img.image'             =>  __('site.img_image')           ,
            'img.mimes'             =>  __('site.img_mimes')           ,
        ];
    }
}
