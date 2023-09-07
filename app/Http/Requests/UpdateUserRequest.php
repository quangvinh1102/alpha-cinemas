<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email'=> 'required|email',
            'phone'=> 'required', 
        ];
    }

    public function messages(){
        return [
            'fullname.required' => 'Không được để trống họ tên',
            'fullname.unique' => 'Tên đã tồn tại',
            'email.required'=> 'Không được để trống email',
            'email.email'=> 'Không phải email',
            'password.required'=> 'Không được để trống mật khẩu',
            'phone.required'=> 'Không được để trống số điện thoại', 
        ];
    }
}
