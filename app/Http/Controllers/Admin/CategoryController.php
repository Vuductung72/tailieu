<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCatgoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
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
        $categories = Category::orderBy('id', 'desc')->paginate();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCatgoryRequest $request)
    {
        $data = $request->only('name');
        $data['slug'] = Str::slug($request->name);
        $data['image'] = $this->uploadFile($request->image);
        Category::create($data);
        session()->flash('success', 'Thêm mới danh mục tài liệu thành công');

        return redirect()->route('ad.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCatgoryRequest $request, Category $category)
    {
        $data = $request->only('name');
        $data['slug'] = Str::slug($request->name);
        if ($request->image != null) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5120'
            ]);

            $path = $this->uploadFile($request->image);
            $data['image'] = $path;
        }
        // if ($data['name'] === $category->name) {
        //     session()->flash('success', 'Sửa danh mục tài liệu thành công');
        //     return redirect()->route('ad.category.index');
        // }
        $category->update($data);
        session()->flash('success', 'Sửa danh mục tài liệu thành công');
        return redirect()->route('ad.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
