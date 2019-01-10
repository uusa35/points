<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\File;
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
        $categories = Category::onlyParent()->where(['is_files' => true])->get();
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
        $element = $element->withoutGlobalScopes()->whereId(request()->id)->with('files')->first();
        $categories = Category::onlyParent()->where(['is_files' => true])->get();
        if($element->has('files','>',0)) {
            $files = $element->files()->notImages()->get();
            $images = $element->files()->images()->get();
        }
        return view('backend.modules.file.create', compact('element', 'categories','files','images'))->with(['type' => request()->type, 'id' => request()->id]);
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
            'category_id' => 'nullable|exists:categories,id',
            'path[]' => 'array|mimes:pdf,jpeg,bmp,png,gif,xls,xlsx,psd,ai,doc,docs|max:50000',
            'image' => 'image',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $className = '\App\Models\\' . title_case(request()->type);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId(request()->id)->first();
        $request->request->add(['user_id' => auth()->id()]);
        if ($request->hasFile('image')) {
            $file = $element->images()->create($request->request->all());
            $this->saveMimes($file, $request, ['image'], ['250', '250'], true);
        }
        if ($request->hasFile(['path'])) {
            foreach ($request->path as $key => $fileElement) {
                $file = $element->files()->create([
                    'user_id' => request('user_id'),
                    'category_id' => request('category_id'),
                    'notes' => request('notes'),
                    'name_ar' => request('name_ar'),
                    'name_en' => request('name_en'),
                    'caption_ar' => request('caption_ar'),
                    'caption_en' => request('caption_en'),
                    'order' => request('order'),
                    'extension' => $request->file('path')[$key]->extension()
                ]);
                $path = $request->file('path')[$key]->store('public/uploads/files');
                $path = str_replace('public/uploads/files/', '', $path);
                $file->update(['path' => $path]);
            }
        }
        if (request()->type === 'order') {
            return redirect()->route('backend.file.create', ['type' => request('type'), 'id' => request('id')])->with('success', trans('general.file_saved'));
        } elseif (request()->type === 'job') {
            return redirect()->route('backend.job.show', $element->id)->with('success', trans('general.file_saved'));
        } elseif (request()->type === 'version') {
            return redirect()->route('backend.version.show', $element->id)->with('success', trans('general.file_saved'));
        }
        return redirect()->route('backend.file.index', ['type' => request()->type, 'id' => request()->id])->with('success', trans('message.file_uploaded_successfully'));
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
        $deleted = File::whereId($id)->delete();
        if ($deleted) {
            return redirect()->back()->with('warning', trans('message.file_deleted_succesfully'));
        }
        return redirect()->back()->with('error', trans('message.file_delete_failure'));

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
        $element = $element->withoutGlobalScopes()->whereId(request()->id)->first();
        $files = $element->files()->where(['category_id' => request()->category_id])->notImages()->get();
        $images = $element->files()->where(['category_id' => request()->category_id])->images()->get();
        return view('backend.modules.file.show_list', compact('element', 'files', 'images'));
    }
}
