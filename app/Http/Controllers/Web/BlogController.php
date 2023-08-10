<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CategoryBlog;
use App\Models\Comment;
use App\Models\SliderBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function list()
    {
        $blogs = Blog::orderBy('position', 'asc')->orderBy('created_at', 'desc')->get();
        $blog_new = Blog::orderBy('propose', 'desc')->orderBy('position', 'asc')->orderBy('created_at', 'desc')->paginate(2);
        $categories = CategoryBlog::all();
        $sliders = SliderBlog::where('status', 1)->orderBy('position', 'asc')->paginate();
        return view('web.blog.list', compact('blogs', 'categories', 'blog_new', 'sliders'));
    }

    public function listCategory($category_slug) {
        $category = CategoryBlog::where('slug', $category_slug)->first();
        $blogs = Blog::where('category_blog_id', $category->id)->orderBy('position', 'asc')->orderBy('created_at', 'desc')->paginate(12);
        $blogs_new = Blog::orderBy('propose', 'desc')->orderBy('position', 'asc')->orderBy('created_at', 'desc')->paginate(3);
        return view('web.blog.list_category', compact('category', 'blogs', 'blogs_new'));

    }

    public function blog($category_slug, $slug)
    {
        $category = CategoryBlog::where('slug', $category_slug)->first();
        $blog =Blog::where('slug', $slug)->where('category_blog_id', $category->id)->first();
        $blogs_new = Blog::where('id', '<>', $blog->id)->orderBy('propose', 'desc')->orderBy('position', 'asc')->orderBy('created_at', 'desc')->paginate(1);
        $blogs_relates = Blog::where('category_blog_id', $blog->category_blog_id)->where('id', '<>', $blog->id)->orderBy('position', 'asc')->orderBy('created_at', 'desc')->paginate(3);
        $blogs_relate = Blog::where('category_blog_id', $blog->category_blog_id)->where('id', '<>', $blog->id)->orderBy('position', 'asc')->orderBy('created_at', 'desc')->paginate(1);
        // $comments = Comment::where('id_blog', $blog->id)->orderBy('id', 'desc')->paginate(5);
        return view('web.blog.blog', compact('blog', 'blogs_new', 'blogs_relates', 'blogs_relate'));
    }

    // public function comment(Request $request, $slug){
    //     $blog =Blog::where('slug', $slug)->first();
    //     $request->validate([
    //         'content' => 'required'
    //     ],[
    //         'content.required' => 'Nội dung không được để trống!',
    //     ]);
    //     $data = $request->only('content');
    //     $data['id_blog'] = $blog->id;
    //     $data['id_user'] = Auth::guard('user')->user()->id;
    //     $data['status'] = 1;
    //     Comment::create($data);
    //     return redirect()->back()->with('success', 'Bình luận bài viết thành công!');
    // }
}
