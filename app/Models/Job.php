<?php

namespace App\Models;


class Job extends PrimaryModel
{
    protected $guarded = [''];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function versions()
    {
        return $this->hasMany(Version::class);
    }

    public function designers()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * MorphRelation
     * MorphOne = many hasONe relation
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
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
