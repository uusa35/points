<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;

class File extends PrimaryModel
{
    use LocaleTrait;
    protected $guarded = [''];
    protected $localeStrings = ['name', 'caption'];

    public function filable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeImages($q)
    {
        return $q->whereIn('extension', ['jpeg', 'jpg', 'png', 'gif']);
    }

    public function scopeNotImages($q)
    {
        return $q->whereNotIn('extension', ['jpeg', 'jpg', 'png', 'gif']);
    }

}
