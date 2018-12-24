<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class JobStore extends FormRequest
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
            'notes' => 'required',
            'description' => 'nullable',
            'active' => 'nullable|boolean',
            'is_complete' => 'nullable|boolean',
            'is_client_viewed' => 'nullable|boolean',
            'is_designer_viewed' => 'nullable|boolean',
            'priority' => 'nullable|numeric',
            'is_urgent' => 'nullable|boolean',
            'order_id' => 'required|exists:orders,id',
        ];
    }
}
