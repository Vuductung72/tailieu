<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SliderBlog;
use Illuminate\Http\Request;
use Exception;


class SliderBlogController extends Controller
{
    public function index()
    {
        $sliders = SliderBlog::orderBy('id', 'desc')->paginate();
        return view('admin.sliderblog.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliderblog.create');
    }

    public function store(Request $request)
    {

        try {
            $data = $request->only('name', 'status', 'position', 'content');
            $data['image'] = $this->uploadFile($request->image);
            SliderBlog::create($data);

            session()->flash('success', 'Thành công');
            return redirect()->route('ad.slider-blog.index');
        } catch(Exception $e) {
            session()->flash('error', 'Thất bại');
            return redirect()->back();
        }
    }

    public function edit(SliderBlog $slider_blog)
    {
        return view('admin.sliderblog.edit', compact('slider_blog'));
    }

    public function update(Request $request, SliderBlog $slider_blog)
    {
        $data = $request->only('name', 'status', 'position', 'content');

        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp'
            ]);

            $path = $this->uploadFile($request->image);
            $data['image'] = $path;

        }

        $slider_blog->update($data);
        session()->flash('success', 'Thành công');

        return redirect()->route('ad.slider-blog.index');
    }

    public function destroy(SliderBlog $slider_blog)
    {
        $slider_blog->delete();

        session()->flash('success', 'Thành công');
        return redirect()->back();
    }

    public function status(SliderBlog $slider_blog)
    {
        if($slider_blog->status == 1){
            $slider_blog->update(['status'=> 0]);
            return back()->with('success','Ẩn slider thành công!');
        }else{
            $slider_blog->update(['status'=> 1]);
            return back()->with('success','Hiện slider nhật thành công!');
        }
    }
}
