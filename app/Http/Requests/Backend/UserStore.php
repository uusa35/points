<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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
            'email' => 'email|unique:users|required',
            'role_id' => 'required|exists:roles,id',
            'name_ar' => 'nullable|unique:users',
            'name_en' => 'nullable|unique:users',
            'mobile' => 'nullable|numeric',
            'whatsapp' => 'nullable|numeric',
            'phone' => 'nullable|numeric',
            'fax' => 'nullable|numeric',
            'logo' => 'image|nullable',
            'bg' => 'image|nullable',
            'google_map_url' => 'nullable|url',
            'site_url' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'google_url' => 'nullable|url|url',
            'snap_url' => 'nullable|url|url',
            'google_play_url' => 'nullable|url',
            'app_store_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
        ];
    }
}
