<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends BaseController
{

    public function index(Request $request)
    {
        $query = Blog::orderBy('id', 'DESC')->with('categoryBlog');

        $blogs = $query->paginate(5);

        $categories = CategoryBlog::get();

        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    public function create()
    {
        $categories = CategoryBlog::all();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(CreateBlogRequest $request)
    {
        $data = $request->only('name', 'content', 'description', 'category_blog_id', 'keyword', 'position', 'propose');

        if($request->image != null){
            $data['image'] = $this->uploadFile($request->image);
        }else{
            $data['image'] = asset('/images/no_image.png');
        }

        $data['slug'] = Str::slug($request->name);

        Blog::create($data);
        session()->flash('success', 'Thành Công');

        return redirect()->route('ad.blog.index');
    }

    public function edit(Blog $blog)
    {
        $categories = CategoryBlog::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->only('name', 'description', 'category_blog_id', 'content', 'keyword', 'position', 'propose');

        if ($request->image != null) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:5120'
            ]);

            $path = $this->uploadFile($request->image);
            $data['image'] = $path;
        }

        $data['slug'] = Str::slug($request->name);

        $blog->update($data);

        session()->flash('success', 'Thành công');

        return redirect()->route('ad.blog.index');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        session()->flash('success', 'Thành Công!');
        return redirect()->route('ad.blog.index');
    }

    public function search(Request $request){
        if($request->category_id == null){
            $blogs = Blog::where('name', 'like', '%' .$request->name. '%')->orderBy('id', 'DESC')->paginate(5);
        }else{
            $blogs = Blog::where('category_id',$request->category_id)->where('name', 'like', '%' .$request->name. '%')->orderBy('id', 'DESC')->paginate(5);
        }
        $name = $request->name;
        $category_id = $request->category_id;
        $categories = CategoryBlog::get();

        return view('admin.blogs.index', compact('blogs', 'categories','name','category_id'));
    }

    // public function updateStatus(Blog $blog){
    //     if($blog->status == 1){
    //         $blog->update(['status'=> 0]);
    //     }else{
    //         $blog->update(['status'=> 1]);
    //     }

    //     return back()->with('success','Cập nhật thành công!');
    // }

    public function propose(Blog $blog)
    {
        if($blog->propose == 0){
            $blog->update(['propose'=> 1]);
            return back()->with('success','Đề xuất thành công!');
        }else{
            $blog->update(['propose'=> 0]);
            return back()->with('success','Ẩn đề xuất thành công!');
        }
    }
}
