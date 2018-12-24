<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PaymentPlanUpdate extends FormRequest
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
            'name' => 'required|unique:payment_plans:name,' . request('id'),
            'slug_ar' => 'required',
            'slug_en' => 'required',
            'description_ar' => 'nullable',
            'description_en' => 'nullable',
            'image' => 'image|nullable',
            'path' => 'mimes:pdf|nullable',
            'color' => 'nullable',
            'price' => 'required|numeric',
            'bonus' => 'required|numeric',
            'apply_bonus' => 'required|boolean',
            'order' => 'required|numeric',
            'active' => 'nullable|boolean',
        ];
    }
}
