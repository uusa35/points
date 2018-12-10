<?php

namespace App\Models;

trait UserHelpers
{
    public function getIsAdminAttribute()
    {
        return $this->role->is_admin;
    }

    public function getIsSuperAttribute()
    {
        return $this->role->is_super;
    }

    public function getIsClientAttribute()
    {
        return $this->role->is_client;
    }

    public function getIsDesignerAttribute()
    {
        return $this->role->is_designer;
    }

    public function getCategoryNameAttribute()
    {
        $category = $this->category()->first();
        return $this->attributes['categoryName'] = ($category) ? $category->name : null;
    }

    public function scopeOnlyClients($q)
    {
        $q->whereHas('role', function ($q) {
            return $q->where('is_client', true);
        });
    }

    public function scopeOnlyDesigners($q)
    {
        $q->whereHas('role', function ($q) {
            return $q->where('is_client', true);
        });
    }


    public function scopeOnlySupers($q)
    {
        $q->whereHas('role', function ($q) {
            return $q->where('is_super', true);
        });
    }

    public function scopeOnlyAdmins($q)
    {
        $q->whereHas('role', function ($q) {
            return $q->where('is_admin', true);
        });
    }

}
