<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Color;
use App\Models\Job;
use App\Models\Order;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Country;
use App\Models\Field;
use App\Models\Group;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Role;
use App\Models\Size;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Version;
use Illuminate\View\View;

class ViewComposers
{
    public function getRoles(View $view)
    {
        if (auth()->check() && auth()->user()->isSuper) {
            $roles = Role::all();
        } elseif (auth()->check() && auth()->user()->isAdmin) {
            $roles = Role::where('id', '!=', 1)->get();
        } else {
            $roles = Role::where(['is_visible' => true])->get();
        }
        return $view->with(compact('roles'));
    }

    public function getSettings(View $view)
    {
        $settings = Setting::first();
        return $view->with(compact('settings'));
    }

    public function getTotalClientActiveOrders(View $view)
    {
        $totalClientActiveOrders = Order::active()->where(['is_paid' => true, 'user_id' => auth()->id()])->count();
        return $view->with(compact('totalClientActiveOrders'));
    }

    public function getTotalClientOnProgressOrders(View $view)
    {
        $totalClientOnProgressOrders = Order::active()->where(['is_paid' => true, 'is_complete' => false, 'user_id' => auth()->id()])->count();
        return $view->with(compact('totalClientOnProgressOrders'));
    }

    public function getTotalClientCompletedOrders(View $view)
    {
        $totalClientCompletedOrders = Order::active()->where(['is_paid' => true, 'is_complete' => true, 'user_id' => auth()->id()])->count();
        return $view->with(compact('totalClientCompletedOrders'));
    }

    public function getTotalActivePaidCompletedOrders(View $view)
    {
        $totalActiveClientCompletedOrders = Order::active()->where(['is_paid' => true, 'is_complete' => true])->count();
        return $view->with(compact('totalActiveClientCompletedOrders'));
    }

    public function getTotalActivePaidOnProgressOrders(View $view)
    {
        $totalActiveClientOnProgressOrders = Order::active()->where(['is_paid' => true, 'is_complete' => false])->count();
        return $view->with(compact('totalActiveClientOnProgressOrders'));
    }

    public function getTotalSuccessfulTransactions(View $view)
    {
        $totalSuccessfulTransactions = Transaction::where(['is_complete' => false])->count();
        return $view->with(compact('totalSuccessfulTransactions'));
    }

    public function getTotalLastVersionFiles(View $view)
    {
        $totalLastVersionFiles =  Version::whereHas('job', function ($q) {
            return $q->where(['is_complete' => true])->whereHas('order', function ($q) {
                return $q->where(['is_paid' => true, 'is_complete' => true, 'user_id' => auth()->id()]);
            });
        })->with('images', 'files')->get();
        return $view->with(compact('totalLastVersionFiles'));
    }
}

