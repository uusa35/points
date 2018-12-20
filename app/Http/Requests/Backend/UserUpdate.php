<?php

namespace App\Http\Requests\Backend;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UserUpdate extends FormRequest
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
            'username' => 'required|unique:users,username,' . request('user_id'),
            'name_ar' => 'required|max:55',
            'name_en' => 'required|max:55',
            'email' => 'required|unique:users,email,' . request('user_id'),
            'mobile' => 'required|max:55',
            'role_id' => 'required|exists:roles,id',
            'mobile' => 'nullable|numeric',
            'whatsapp' => 'nullable|numeric',
            'phone' => 'nullable|numeric',
            'fax' => 'nullable|numeric',
            'logo' => 'image|nullable',
            'bg' => 'image|nullable',
            'google_map_url' => 'nullable|url',
            'site_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
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
