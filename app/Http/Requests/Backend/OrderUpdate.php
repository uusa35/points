<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdate extends FormRequest
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
            'title' => 'required',
            'name_ar' => 'nullable',
            'name_en' => 'nullable',
            'slogan' => 'nullable',
            'website' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'youtube' => 'nullable',
            'twitter' => 'nullable',
            'mobile' => 'nullable',
            'phone_one' => 'nullable',
            'phone_two' => 'nullable',
            'fax' => 'nullable',
            'whatsapp' => 'nullable',
            'snapchat' => 'nullable',
            'iphone' => 'nullable',
            'android' => 'nullable',
            'lang' => 'nullable',
            'points' => 'nullable',
            'description_ar' => 'nullable',
            'description_en' => 'nullable',
            'notes_ar' => 'nullable',
            'notes_en' => 'nullable',
            'address_ar' => 'nullable',
            'address_en' => 'nullable',
            'is_paid' => 'nullable',
            'service_id' => 'nullable',
            'user_id' => 'required|exists:users,id',
            'preferred_colors_1' => 'nullable',
            'preferred_colors_2' => 'nullable',
            'preferred_colors_3' => 'nullable',
            'unwanted_colors_1' => 'nullable',
            'unwanted_colors_2' => 'nullable',
            'unwanted_colors_3' => 'nullable',
            'google_map_url' => 'nullable|url',
            'active' => 'nullable|boolean',
        ];
    }
}
