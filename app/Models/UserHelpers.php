<?php

namespace App\Models;

trait UserHelpers
{
    public function getIsAdminAttribute()
    {
        return $this->role->is_super ? $this->role->is_super : $this->role->is_admin;
    }

    public function getIsSuperAttribute()
    {
        return $this->role->is_super;
    }

    public function getIsClientAttribute()
    {
        return $this->role->is_client;
    }

    public function getIsSubContractorAttribute()
    {
        return $this->role->name === 'subcontractor' ? true : false;
    }

    public function getIsConsultantAttribute()
    {
        return $this->role->name === 'consultant' ? true : false;
    }

    public function getCategoryNameAttribute()
    {
        $category = $this->category()->first();
        return $this->attributes['categoryName'] = ($category) ? $category->name : null;
    }

    public function scopeOnlyClients($q)
    {
        $q->whereHas('role', function ($q) {
            return $q->where('name', 'client');
        });
    }

    public function scopeOnlySubContractors($q)
    {
        $q->whereHas('role', function ($q) {
            return $q->where('name', 'subcontractor');
        });
    }

    public function scopeOnlyConsultants($q)
    {
        $q->whereHas('role', function ($q) {
            return $q->where('name', 'consultant');
        });
    }

    public function scopeOnlySuppliers($q)
    {
        $q->whereHas('role', function ($q) {
            return $q->where('name', 'supplier');
        });
    }

}