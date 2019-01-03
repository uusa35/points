<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\VersionStore;
use App\Http\Requests\VersionUpdate;
use App\Models\Job;
use App\Models\Version;
use App\Http\Controllers\Controller;

class VersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validate = validator(request()->all(), [
            'job_id' => 'required|exists:jobs,id'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with($validate->errors());
        }
        $element = Job::whereId(request()->job_id)->first();
        $this->authorize('version.create', $element);
        return view('backend.modules.version.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(VersionStore $request)
    {
        $version = Version::create($request->request->all());
        if ($version) {
            return redirect()->route('backend.job.show', $version->job_id);
        }
        return redirect()->back()->with('error', trans('message.version_create_error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = Version::whereId($id)->with('files', 'images', 'job.order')->first();
        $files = $element->files()->notImages()->get();
        $images = $element->files()->images()->get();
        return view('backend.modules.version.show', compact('element', 'files', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Version::whereId($id)->first();
        return view('backend.modules.version.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(VersionUpdate $request, $id)
    {
        $version = Version::whereId($id)->first();
        if($version) {
            $version->update($request->request->all());
        }
        return redirect()->back()->with('error', trans('message.version_update_error'));
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
