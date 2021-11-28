<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserAdd extends FormRequest
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
          // validate du lieu
        return [
            'name' => 'required',
            'email' => 'required|email|unique:account',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Tên tài khoản không được trống',
            'email.required' => 'Email không được trống',
            'email.email' =>'Email không đúng định dạng',
            'email.unique' =>'Email đã được sử dụng',
            'password.required' => 'Password không được trống',
            'confirm_password.required' => 'Không được trống',
            'confirm_password.same' => 'nhập lại mật khẩu không khớp',
        ];
    }
}
