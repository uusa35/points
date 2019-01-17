<?php

namespace App\Models;


use App\Services\Traits\LocaleTrait;

class Service extends PrimaryModel
{
    use LocaleTrait;
    protected $guarded = [''];
    protected $localeStrings = ['slug','description','caption'];

    public function orders() {
        return $this->hasMany(Order::class);
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

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getFinalPointsAttribute() {
        return $this->on_sale ? $this->sale_points : $this->points;
    }
}
