<?php

namespace App\Models;


use App\Services\Traits\LocaleTrait;

class Order extends PrimaryModel
{
    use LocaleTrait;
    protected $guarded = [''];
    protected $localeStrings = ['name','description'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class,'user_id');
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
     * MorphRelation
     * MorphOne = many hasONe relation
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function files()
    {
        return $this->morphMany(File::class, 'filable');
    }

    public function job() {
        return $this->hasOne(Job::class);
    }

    public function getStatusAttribute() {
        return $this->is_complete ? 'complete' : 'on_process';
    }

    public function getOnProgressAttribute() {
        return !$this->is_complete;
    }
}
