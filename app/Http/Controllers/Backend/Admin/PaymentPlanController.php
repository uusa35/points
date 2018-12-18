<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Requests\Backend\PaymentPlanStore;
use App\Http\Requests\Backend\PaymentPlanUpdate;
use App\Models\PaymentPlan;
use App\Http\Controllers\Controller;

class PaymentPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = PaymentPlan::all();
        return view('backend.modules.plan.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('plan.create');
        return view('backend.modules.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentPlanStore $request)
    {
        $element = PaymentPlan::create($request->request->all());
        if ($element) {
            if ($request->hasFile('image')) {
                $this->saveMimes($element, $request, ['image'], ['500', '500'], true);
            }
            if ($request->hasFile('path')) {
                $path = $request->file('path')->store('public/uploads/files');
                $path = str_replace('public/uploads/files/', '', $path);
                $element->update(['path' => $path]);
            }
            return route('backend.plan.index')->with('success', 'plan stored.');
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
        $element = PaymentPlan::whereId($id)->first();
        $this->authorize('plan.update',$element);
        return view('backend.modules.plan.show', compact('element'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = PaymentPlan::whereId($id)->first();
        $this->authorize('plan.update',$element);
        return view('backend.modules.plan.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentPlanUpdate $request, $id)
    {
        $element = PaymentPlan::whereId($id)->first();
        $updated = $element->update($request->request->all());
        if ($updated) {
            if ($request->hasFile('image')) {
                $this->saveMimes($element, $request, ['image'], ['500', '500'], true);
            }
            if ($request->hasFile('path')) {
                $path = $request->file('path')->store('public/uploads/files');
                $path = str_replace('public/uploads/files/', '', $path);
                $element->update(['path' => $path]);
            }
            return route('backend.plan.index')->with('success', 'plan stored.');
        }
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
