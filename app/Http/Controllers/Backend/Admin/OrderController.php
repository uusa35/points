<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('is_complete')) {
            $elements = Order::where(['is_complete' => request()->is_complete, 'is_paid' => true])->with('job', 'service.category', 'client')->orderBy('id', 'desc')->paginate(self::PAGINATE);
        } elseif (request()->has('is_paid')) {
            $elements = Order::where(['is_paid' => request()->is_paid])->with('job', 'service.category', 'client')->orderBy('id', 'desc')->paginate(self::PAGINATE);
        } elseif (request()->has('jobs')) {
            $elements = Order::where(['is_paid' => true, 'is_complete' => false])->doesntHave('job')->with('service.category', 'client')->orderBy('id', 'desc')->paginate(self::PAGINATE);
        } else {
            $elements = Order::with('job.versions', 'client', 'service.category')->orderBy('id', 'desc')->paginate(self::PAGINATE);
        }
        return view('backend.modules.order.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = Order::whereId($id)->first();
        return view('backend.modules.order.show', compact('element'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
