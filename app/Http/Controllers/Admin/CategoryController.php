<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        Gate::authorize('category.view');
        $category=Category::all();

        $categories = Category::latest()->paginate(7);
        //dd($categores);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('category.create');
        $category = new category();
        return view('admin.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Gate::authorize('category.create');

        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);
        $data = $request->except('image');
        if ($request->hasFile('image')) { //check isset image

            $file = $request->file('image'); //return object
            $path_name = 'category' . date('d-m-y');
            $path = $file->store('uploads/categories', ['disk' => 'public']);
            $data['image'] = $path;
        }

        Category::create($data);
        return redirect()->route('category.index')->with('success', __('operation addion accomplished successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('category.update');
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        Gate::authorize('category.update');
        $category = Category::findOrFail($id);

        $old_image = $category->image;
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/categories', ['disk' => 'public']);
            $data['image'] = $path;
        }
        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }
        $category->update($data);
        return redirect()->route('category.index')->with('success', __('operation updation accomplished successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('category.delete');
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', __("Category deletion completed Successfully"));
    }

    public function trash()
    {
        Gate::authorize('category.trash');
        $categories = Category::onlyTrashed()->get();
        return view('admin.category.trash', compact('categories'));
    }

    public function forceDelete($id)
    {
        Gate::authorize('category.forceDelete');
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        return redirect()->back()->with('success', __("Category deletion completed Successfully"));
    }

    public function restore($id)
    {
        Gate::authorize('category.restore');
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->back()->with('success', __("Category  completed Successfully"));
    }

    public function restoreAll()
    {
        Gate::authorize('category.restoreAll');
        Category::onlyTrashed()->restore();
        return redirect()->back()->with('success', __("Category deletion completed Successfully"));
    }
}
