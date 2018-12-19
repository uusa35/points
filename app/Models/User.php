<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, UserHelpers, LocaleTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];
//    protected $with = ['role'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $localeStrings =  ['name','caption','description','service','address'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // jobs that are created by designers only
    public function jobs()
    {
        return $this->belongsToMany(Job::class,'job_user');
    }

    // only clients have one balance record
    public function balance()
    {
        return $this->hasOne(Balance::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }


}
