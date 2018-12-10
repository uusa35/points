<?php

namespace App\Models;


class Service extends PrimaryModel
{
    protected $guarded = [''];

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
}
