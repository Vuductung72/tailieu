<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCatgoryRequest;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryBlogController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_blog = CategoryBlog::orderBy('id', 'desc')->paginate();
        return view('admin.category-blog.index', compact('category_blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category-blog.create');
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
        CategoryBlog::create($data);
        session()->flash('success', 'Thêm mới danh mục bài viết thành công');

        return redirect()->route('ad.category-blog.index');
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
    public function edit(CategoryBlog $category_blog)
    {
        return view('admin.category-blog.edit', compact('category_blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCatgoryRequest $request, CategoryBlog $category_blog)
    {
        $data = $request->only('name');
        $data['slug'] = Str::slug($request->name);
        if ($request->image != null) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:5120'
            ]);

            $path = $this->uploadFile($request->image);
            $data['image'] = $path;
        }        // if ($data['name'] === $category->name) {
        //     session()->flash('success', 'Sửa danh mục bài viết thành công');
        //     return redirect()->route('ad.category-blog.index');
        // }
        $category_blog->update($data);
        session()->flash('success', 'Sửa danh mục bài viết thành công');
        return redirect()->route('ad.category-blog.index');
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
