<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users|max:191',
            'name' => 'required|string',
            'user_category_id' => 'required|integer|gt:0',
            'password' => 'required|string|min:6',
            're_password' => 'required|string|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => "Vui lòng nhập email",
            'email.unique' => "Email này đã tồn tại",
            'email.email' => "Vui lòng nhập đúng định dạng email",
            'name.required' => "Vui lòng nhập họ tên",
            'user_category_id.required' => "Vui lòng điền nhóm thành viên",
            'birthday.required' => "Vui lòng nhập ngày sinh",
            'password.required' => "Vui lòng nhập mật khẩu",
            'password.min' => "Mật khẩu phải có ít nhất 6 kí tự",
            're_password.required' => "Nhập lại mật khẩu không được để trống",
            're_password.same' =>  "Mật khẩu không trùng khớp"
        ];
    }
}
