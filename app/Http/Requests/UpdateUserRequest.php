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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users,email, ' . $this->id . '|max:191',
            'name' => 'required|string',
            'user_category_id' => 'required|integer|gt:0'
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
        ];
    }
}
