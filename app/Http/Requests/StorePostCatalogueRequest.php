<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostCatalogueRequest extends FormRequest
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
            'name' => 'required',
            'canonical' => 'required|unique:post_catalogue_language,canonical',
            'parent_id' => 'gt:0'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Vui lòng nhập nhóm bài viết",
            'canonical.required' => "Vui lòng nhập đường dẫn",
            'canonical.unique' => "Đường dẫn này đã tồn tại",
            'parent_id.gt' => "Bạn chưa chọn danh mục cha",
        ];
    }
}
