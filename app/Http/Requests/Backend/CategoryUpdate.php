<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdate extends FormRequest
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
            'name' => 'required',
            'path' => 'mimes:pdf|max:50000',
            'image' => 'image',
            'slug_ar' => 'required',
            'slug_en' => 'required',
            'caption_ar' => 'nullable',
            'caption_en' => 'nullable',
            'description_ar' => 'nullable',
            'description_en' => 'nullable',
            'duration' => 'nullable',
            'parent_id' => 'nullable',
            'order' => 'nullable|numeric',
            'active' => 'nullable|boolean',
        ];
    }
}
