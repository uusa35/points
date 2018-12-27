<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Order;
use App\Models\User;
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
        $validate = validator(request()->all(), [
            'type' => 'required|alpha',
            'id' => 'required|numeric'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $element = User::whereId(auth()->id())->with('files.category', 'images.category', 'orders')->first();
        $categories = Category::where(['is_files' => true])->get();
        return view('backend.modules.file.index', compact('element', 'categories'));
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
        $categories = Category::where(['is_files' => true])->get();
        return view('backend.modules.file.create', compact('element', 'categories'))->with(['type' => request()->type, 'id' => request()->id]);
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
            'id' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'path' => 'mimes:pdf|nullable|max:50000',
            'image' => 'image',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $className = '\App\Models\\' . title_case(request()->type);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId(request()->id)->first();
        if ($request->hasFile('image')) {
            $file = $element->images()->create([
                'user_id' => auth()->id(),
                'category_id' => request('category_id'),
                'notes' => request('notes'),
                'name_ar' => request('name_ar'),
                'name_en' => request('name_en'),
                'caption_ar' => request('caption_ar'),
                'caption_en' => request('caption_en'),
                'order' => request('order'),
            ]);
            $this->saveMimes($file, $request, ['image'], ['250', '250'], true);
        }
        if ($request->hasFile('path')) {
            $file = $element->files()->create([
                'user_id' => auth()->id(),
                'category_id' => request('category_id'),
                'notes' => request('notes'),
                'name_ar' => request('name_ar'),
                'name_en' => request('name_en'),
                'caption_ar' => request('caption_ar'),
                'caption_en' => request('caption_en'),
                'order' => request('order'),
            ]);
            $this->saveMimes($file, $request, ['path'], ['750', '1334'], true);
        }
        return redirect()->route('backend.file.create', ['type' => request()->type, 'id' => request()->id]);
//        return redirect()->route('backend.file.create', compact('element'))
//            ->with(['success' => trans('message.file_or_image_saved_successfully'), 'type' => request()->type, 'id' => request()->id]);
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

    public function getShowList(Request $request)
    {
        $validate = validator($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|alpha',
            'id' => 'required|numeric',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $className = '\App\Models\\' . title_case(request()->type);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId(request()->id)->with(['files' => function ($q) {
            return $q->where(['user_id' => auth()->id(), 'category_id' => request('category_id')]);
        }])->with(['images' => function ($q) {
            return $q->where(['user_id' => auth()->id(), 'category_id' => request('category_id')]);
        }])->first();
        return view('backend.modules.file.show_list', compact('element'));
    }
}
