<?php
namespace App\Services\Search;

use App\Models\Governate;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 2/7/17
 * Time: 8:40 AM
 */
class Filters extends QueryFilters
{
    public function __construct(Request $request, User $user)
    {
        parent::__construct($request);
    }

    public function text($search)
    {
        $this->builder->where(function ($q) use ($search) {
            $q->where('name_ar', 'like', "%{$search}%")
                ->orWhere('name_en', 'like', "%{$search}%")
                ->orWhere('description_ar', 'like', "%{$search}%")
                ->orWhere('description_en', 'like', "%{$search}%")
                ->orWhere('caption_ar', 'like', "%{$search}%")
                ->orWhere('caption_en', 'like', "%{$search}%");
        });
    }

}