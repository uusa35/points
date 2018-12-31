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
        $validate = validator(request()->all(), ['order_id' => 'required||exists:orders,id']);
        if ($validate->fails()) {
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
        if ($element) {
            return redirect()->route('backend.job.show', $element->id)->with('success', trans('message.success_job_store'));
        }
        return redirect()->back()->with('error', trans('message.error_job_store'));
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

    public function toggleEnroll($id)
    {
        $job = Job::whereId($id)->first();
        $job->designers()->toggle([auth()->user()->id]);
        return redirect()->back()->with('success', 'successful enrolment process');
    }
}
