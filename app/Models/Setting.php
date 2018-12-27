<?php

namespace App\Models;


class Setting extends PrimaryModel
{
    protected $localeStrings = ['name','address','description','on_home_speech','section_one','section_two','section_three'];
    protected $guarded = [''];

    public function gallery()
    {
        return $this->morphMany(Gallery::class, 'galleryable');
    }

    public function getEmailAttribute() {
        return $this->info_email;
    }

}
