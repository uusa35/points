<?php

namespace App\Models;


class Setting extends PrimaryModel
{
    protected $localeStrings = ['name','address','description','on_home_speech'];
    protected $guarded = [''];

    public function gallery()
    {
        return $this->morphMany(Gallery::class, 'galleryable');
    }

}
