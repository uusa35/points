<?php
namespace App\Models;
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 9/15/17
 * Time: 11:16 PM
 */
trait ModelHelpers
{
    public function scopeActive($q)
    {
        return $q->where('active', true);
    }

    public function scopeFeatured($q)
    {
        return $q->where('is_featured', true);
    }

    public function scopeIsParent($q)
    {
        return $q->where('is_parent', true)->where('parent_id', 0);
    }

    public function scopeIsCompany($q)
    {
        return $q->where('is_company', true);
    }

    public function scopeIsIndividual($q)
    {
        return $q->where('is_individual', true);
    }

    public function scopeOnHome($q)
    {
        return $q->where('is_home', true);
    }

    public function scopeValid($q)
    {
        $q->where('valid', true);
    }

    public function scopeNotExpired($q)
    {
        $q->where('end_date', '>', Carbon::now());
    }

    public function scopeExpired($q)
    {
        $q->where('end_date', '<', Carbon::now());
    }

    public function scopeIsPaid($q)
    {
        return $q->where('is_paid', true);
    }

    public function scopeNotAdmin($q)
    {
        return $q->where('is_admin', false);
    }

    public function scopeIsVisible($q)
    {
        return $q->where('is_visible', true);
    }

    public function scopeNotIsVisible($q)
    {
        return $q->where('is_visible', false);
    }

    public function scopeNotParent($q)
    {
        return $q->where('is_parent', false);
    }
}