<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required',
            'password_confinmation'=> 'required|same:password',
            'phone'=> 'required|unique:users,phone', 
            'birthday'=> 'required',
        ];
    }

    public function messages(){
        return [
            'fullname.required' => 'Không được để trống họ tên',
            'email.required'=> 'Không được để trống email',
            'email.email'=> 'Không phải email',
            'email.unique'=> 'Email đã tồn tại',
            'password.required'=> 'Không được để trống mật khẩu',
            'password_confinmation.required'=> 'Không được để trống nhập lại mật khẩu',
            'password_confinmation.same'=> 'Mật khẩu không khớp',
            'phone.required'=> 'Không được để trống số điện thoại', 
            'phone.unique'=> 'Số điện thoại đã tồn tại', 
            'birthday.required'=> 'Không được để trống ngày sinh',
        ];
    }
}
