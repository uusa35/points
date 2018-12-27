<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use phpDocumentor\Reflection\Types\Self_;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designers = User::active()->onlyDesigners()->with('role')->orderBy('id','desc')->take(5)->get();
        $clients = User::active()->onlyClients()->orderBy('id','desc')->with('role')->orderBy('created_at','desc')->take(5)->get();
        $transactions = Transaction::where(['is_complete' => true])->with('user', 'payment_plan')->orderBy('created_at', 'desc')->take(5)->get();
        $orders = Order::where(['user_id' => auth()->id(), 'is_paid' => true])->active()->with('service.category', 'client')->orderBy('created_at', 'desc')->paginate(50, ['*'], 'orders');
        return view('backend.home', compact('designers', 'clients', 'transactions', 'orders'));
    }

    public function changeLanguage()
    {
        app()->setLocale(request('locale'));
        session()->put('locale', request('locale'));
        return redirect()->back();
    }

    public function toggleActivate(Request $request)
    {
        $className = '\App\Models\\' . title_case($request->model);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId($request->id)->first();
        $element->update([
            'active' => !$element->active
        ]);
        return redirect()->back()->with('success', 'Process Success');
    }

    public function toggleFeatured(Request $request)
    {
        $className = '\App\Models\\' . title_case($request->model);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId($request->id)->first();
        if (isset($element->featured)) {
            $element->update([
                'featured' => !$element->featured
            ]);
            return redirect()->back()->with('success', 'Process Success');
        }
        return redirect()->back()->with('error', 'Process Failure .. no such thing');
    }

    public function toggleOnHome(Request $request)
    {
        $className = '\App\Models\\' . title_case($request->model);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId($request->id)->first();
        if (isset($element->is_home)) {
            $element->update([
                'is_home' => !$element->is_home
            ]);
            return redirect()->back()->with('success', 'Process Success');
        }
        return redirect()->back()->with('error', 'Process Failure .. no such thing');
    }

    public function toggleOnSale(Request $request)
    {
        $className = '\App\Models\\' . title_case($request->model);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId($request->id)->first();
        if (isset($element->on_sale)) {
            $element->update([
                'on_sale' => !$element->on_sale
            ]);
            return redirect()->back()->with('success', 'Process Success');
        }
        return redirect()->back()->with('error', 'Process Failure .. no such thing');
    }

    public function BackupDB()
    {
        Artisan::call('backup:db');

        return back()->with('success', 'db packed successfully');
    }

    public function exportTranslations()
    {
        Artisan::call('publish-trans');

        return redirect()->back()->with('success', 'translations exported');
    }
}
