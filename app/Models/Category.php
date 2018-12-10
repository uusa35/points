<?php

namespace App\Models;

use App\Services\Search\QueryFilters;
use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends PrimaryModel
{
    use LocaleTrait, SoftDeletes;
    public $localeStrings = ['slug','caption','description'];
    protected $guarded = [''];

    /**
     * * ParentCategory
     * reverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * * ChildCategory
     * hasMany
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {

        return $this->hasMany(Category::class, 'parent_id');
    }


    /**
     * MorphRelation
     * MorphOne = many hasONe relation
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imagable');
    }


    /**
     * @param $query
     * @param QueryFilter $filters
     * @return \Illuminate\Database\Eloquent\Builder
     * Usage : Category Page - Filtering all products according to parameters
     * Description : chaining filters within the Query String
     */
    public function scopeFilters($query, QueryFilters $filters)
    {
        return $filters->apply($query);
    }

    public function scopeOnlyParent($q)
    {
        return $q->where('parent_id', 0);
    }

    public function getIsParentAttribute()
    {
        return $this->parent_id === 0 ? true : false;
    }

}
