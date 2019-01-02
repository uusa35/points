<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Requests\Backend\ServiceStore;
use App\Http\Requests\Backend\ServiceUpdate;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Service::with('category')->get();
        return view('backend.modules.service.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('service.create');
        $categories = Category::active()->get();
        return view('backend.modules.service.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceStore $request)
    {
        $element = Service::create($request->request->all());
        if ($element) {
            if ($request->hasFile('image')) {
                $this->saveMimes($element, $request, ['image'], ['500', '500'], true);
            }
            if ($request->hasFile('path')) {
                $path = $request->file('path')->store('public/uploads/files');
                $path = str_replace('public/uploads/files/', '', $path);
                $element->update(['path' => $path]);
            }
            return redirect()->route('backend.admin.service.index')->with('success', 'service updated');
        }
        return redirect()->route('backend.service.index')->with('success', 'service updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Service::whereId($id)->first();
        $categories = Category::active()->get();
        return view('backend.modules.service.edit', compact('element', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceUpdate $request, $id)
    {
        $element = Service::whereId($id)->first();
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
            return redirect()->route('backend.admin.service.index')->with('success', 'service updated');
        }
        return redirect()->route('backend.service.index')->with('success', 'service updated');
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
