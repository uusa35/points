<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Color;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Country;
use App\Models\Field;
use App\Models\Group;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Role;
use App\Models\Size;
use App\Models\User;
use Illuminate\View\View;

class ViewComposers
{
    public function getRoles(View $view)
    {
        if (auth()->user()->isSuper) {
            $roles = Role::all();
        } elseif (auth()->user()->isAdmin) {
            $roles = Role::where('id', '!=', 1)->get();
        }
        return $view->with(compact('roles'));
    }

    public function getSettings(View $view) {
        $settings = Setting::first();
        return $view->with(compact('settings'));
    }
}

