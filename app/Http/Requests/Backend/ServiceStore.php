<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->isSuper;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:services,name',
            'slug_ar' => 'required',
            'slug_en' => 'required',
            'description_en' => 'nullable',
            'description_ar' => 'nullable',
            'caption_ar' => 'nullable',
            'caption_en' => 'nullable',
            'duration' => 'required|numeric',
            'image' => 'image|nullable',
            'path' => 'mimes:pdf|nullable',
            'order' => 'required|nullable',
            'on_sale' => 'required|boolean',
            'points' => 'required|numeric',
            'sale_points' => 'required|numeric',
            'active' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
