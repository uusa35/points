<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Core\PrimaryController;
use App\Core\Services\Image\PrimaryImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryStore;
use App\Models\Category;
use App\Src\Category\CategoryRepository;
use App\Http\Requests\Backend\CategoryUpdate;
use App\Http\Requests\Backend\CategoryCreate;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Category::onlyParent()->get();
        return view('backend.modules.category.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryCreate $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {
        $element = Category::create($request->request->all());
        if ($element) {
            if ($request->hasFile('image')) {
                $this->saveMimes($element, $request, ['image'], ['1000', '1000'], false);
            }
            return redirect()->route('backend.admin.category.index')->with('success', 'category created.');
        }
        return redirect()->route('backend.admin.category.index')->with('error', 'category error.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Category::whereId($id)->with('children')->first();
        return view('backend.modules.category.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryUpdate $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdate $request, $id)
    {
        $element = Category::whereId($id)->first();
        $updated = $element->update($request->request->all());
        if ($updated) {
            if ($request->hasFile('image')) {
                $this->saveMimes($element, $request, ['image'], ['1000', '1000'], false);
            }
            return redirect()->route('backend.admin.category.index')->with('success', 'category created.');
        }
        return redirect()->route('backend.admin.category.index')->with('error', 'category error.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Category::whereId($id)->with('projects')->first();
        if ($element->projects->isEmpty()) {
            $element->delete();
            return redirect()->route('backend.admin.category.index')->with('success', trans('message.category_deleted_successfully'));
        }
        return redirect()->back()->with('error', trans('message.category_has_children_can_not_be_deleted'));
    }
}
