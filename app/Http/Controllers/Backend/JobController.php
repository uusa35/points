<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\JobStore;
use App\Http\Requests\Backend\JobUpdate;
use App\Models\Job;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validate = validator($request->all(), [
            'order_id' => 'required|exists:orders,id'
        ]);
        if ($validate->fails()) {
            return route('backend.order.show', $request->order_id)->withErrors($validate);
        }
        $element = Job::where(['order_id' => $request->order_id])->with('versions')->first();
        return view('backend.modules.job.index', compact('element'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validate = validator(request()->all(),['order_id' => 'required||exists:orders,id']);
        if($validate->fails()) {
            return redirect()->route('backend.home')->withErrors($validate->errors());
        }
        $element = Order::whereId(request()->order_id)->first();
        return view('backend.modules.job.create', compact('element'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobStore $request)
    {
        $element = Job::create($request->request->all());
        if($element) {
            if ($request->hasFile('logo')) {
                $this->saveMimes($setting, $request, ['logo'], ['500', '500'], true);
            }
            if ($request->hasFile('zapper')) {
                $this->saveMimes($setting, $request, ['zapper'], ['500', '500'], true);
            }
            if ($request->hasFile('path')) {
                $path = $request->file('path')->store('public/uploads/files');
                $path = str_replace('public/uploads/files/', '', $path);
                $setting->update(['path' => $path]);
            }
            return redirect()->route('backend.setting.index')->with('success', 'setting updated');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = Job::whereId($id)->with('versions')->first();
        return view('backend.modules.job.show', compact('element'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Job::whereId($id)->first();
        return view('backend.modules.job.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobUpdate $request, $id)
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
