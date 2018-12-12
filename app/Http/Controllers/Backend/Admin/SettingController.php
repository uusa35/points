<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Notification;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $element = Setting::first();
        return view('backend.modules.setting.index', compact('element'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $element = Setting::first();
        return view('backend.modules.setting.edit', compact('element'));
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
        $setting = Setting::first();

        if ($setting->update($request->request->all())) {
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
        return redirect()->route('backend.setting.index')->with('error', 'setting error');
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

    public function getNotifications()
    {
        $elements = Notification::with('project')->orderBy('id', 'desc')->paginate(self::PAGINATE);
        return view('backend.modules.setting.notifications', compact('elements'));
    }
}
