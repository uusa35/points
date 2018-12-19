<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = auth()->user()->orders()->paginate(self::PAGINATE);
        return view('backend.modules.file.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validate = validator(request()->all(), [
            'type' => 'required|alpha',
            'id' => 'required|numeric'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $className = '\App\Models\\' . title_case(request()->type);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId(request()->id)->first();
        return view('backend.modules.file.create', compact('element'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = validator(request()->all(), [
            'type' => 'required|alpha',
            'id' => 'required|numeric'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $className = '\App\Models\\' . title_case(request()->type);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId(request()->id)->first();
        if($request->has('image')) {

        }
        if($request->has('file')) {

        }
        return view('backend.modules.file.create', compact('element'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = Order::whereId($id)->with('job.versions.images', 'job.versions.files')->first();
        return view('backend.modules.file.show', compact('element'));
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
