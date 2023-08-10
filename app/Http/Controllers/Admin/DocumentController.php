<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CreateDocumentRequest;
use App\Http\Requests\admin\UpdateDocumentRequest;
use App\Models\Category;
use App\Models\Document;
use App\Models\Language;
use CreateDocumentsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        return view('admin.document.index', compact('documents', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.document.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('code', 'id_category', 'author', 'hot', 'new');
            $data['slug'] = Str::slug($request->code);
            $data['image'] = $this->uploadFile($request->image);
            // dd($data['image']);
            // dd($request->name_vi);
            $document = Document::create($data);
            if($request->name_vn != null){
                $request->validate([
                    'name_vn' => 'required',
                    'price_vn' => 'required|numeric',
                    'description_vn' => 'required',
                    'content_vn' => 'required'
                ],[
                    'name_vn.required' => 'Tên tài liệu không được để trống',
                    'price_vn.required' => 'Giá tài liệu không được để trống',
                    'price_vn.numeric' => 'Giá tài liệu phải là dạng số',
                    'description_vn.required' => 'Mô tả ngắn liệu không được để trống',
                    'content_vn.required' => 'Nội dung tài liệu không được để trống',
                ]);
                $language_vn['id_product'] = $document->id;
                $language_vn['name'] = $request->name_vn;
                $language_vn['price'] = $request->price_vn;
                $language_vn['description'] = $request->description_vn;
                $language_vn['content'] = $request->content_vn;
                $language_vn['type'] = 1;
                $language_vn['position'] = $request->position_vn;
                Language::create($language_vn);
            };

            if($request->name_en != null){
                $request->validate([
                    'name_en' => 'required',
                    'price_en' => 'required|numeric',
                    'description_en' => 'required',
                    'content_en' => 'required'
                ],[
                    'name_en.required' => 'Tên tài liệu không được để trống',
                    'price_en.required' => 'Giá tài liệu không được để trống',
                    'price_en.numeric' => 'Giá tài liệu phải là dạng số',
                    'description_en.required' => 'Mô tả ngắn liệu không được để trống',
                    'content_en.required' => 'Nội dung tài liệu không được để trống',
                ]);
                $language_en['id_product'] = $document->id;
                $language_en['name'] = $request->name_en;
                $language_en['price'] = $request->price_en;
                $language_en['description'] = $request->description_en;
                $language_en['content'] = $request->content_en;
                $language_en['type'] = 2;
                $language_en['position'] = $request->position_en;
                Language::create($language_en);
                // dd($request->name_en);
            };

            if($request->name_cn != null){
                $request->validate([
                    'name_cn' => 'required',
                    'price_cn' => 'required|numeric',
                    'description_cn' => 'required',
                    'content_cn' => 'required'
                ],[
                    'name_cn.required' => 'Tên tài liệu không được để trống',
                    'price_cn.required' => 'Giá tài liệu không được để trống',
                    'price_cn.numeric' => 'Giá tài liệu phải là dạng số',
                    'description_cn.required' => 'Mô tả ngắn liệu không được để trống',
                    'content_cn.required' => 'Nội dung tài liệu không được để trống',
                ]);
                $language_cn['id_product'] = $document->id;
                $language_cn['name'] = $request->name_cn;
                $language_cn['price'] = $request->price_cn;
                $language_cn['description'] = $request->description_cn;
                $language_cn['content'] = $request->content_cn;
                $language_cn['type'] = 3;
                $language_cn['position'] = $request->position_cn;
                Language::create($language_cn);
            };
            DB::commit();
            return redirect()->route('ad.document.index')->with('success', 'Thêm tài liệu thành công!');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Thêm tài liệu thất bại!');
            // dd($data);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $categories = Category::all();
        $languages = Language::where('id_product', $document->id)->orderBy('id', 'asc')->paginate();
        $language_vn = Language::where('id_product', $document->id)->where('type', 1)->first();
        $language_en = Language::where('id_product', $document->id)->where('type', 2)->first();
        $language_cn = Language::where('id_product', $document->id)->where('type', 3)->first();
        // dd($language_en);
        return view('admin.document.edit', compact('categories', 'document', 'language_vn', 'language_en', 'language_vn', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        try {
            DB::beginTransaction();
            $languageVN = Language::where('id_product', $document->id)->where('type', 1)->first();
            $languageEN = Language::where('id_product', $document->id)->where('type', 2)->first();
            $languageCN = Language::where('id_product', $document->id)->where('type', 3)->first();
            $data = $request->only('code', 'id_category', 'author', 'hot', 'new', 'position');
            $data['slug'] = Str::slug($request->code);
            if ($request->image != null) {
                $request->validate([
                    'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5120'
                ]);

                $path = $this->uploadFile($request->image);
                $data['image'] = $path;
            }
            // dd($request->name_vi);
            $document->update($data);
            if($request->name_vn != null){
                $request->validate([
                    'name_vn' => 'required',
                    'price_vn' => 'required|numeric',
                    'description_vn' => 'required',
                    'content_vn' => 'required'
                ],[
                    'name_vn.required' => 'Tên tài liệu không được để trống',
                    'price_vn.required' => 'Giá tài liệu không được để trống',
                    'price_vn.numeric' => 'Giá tài liệu phải là dạng số',
                    'description_vn.required' => 'Mô tả ngắn liệu không được để trống',
                    'content_vn.required' => 'Nội dung tài liệu không được để trống',
                ]);
                $language_vn['id_product'] = $document->id;
                $language_vn['name'] = $request->name_vn;
                $language_vn['price'] = $request->price_vn;
                $language_vn['description'] = $request->description_vn;
                $language_vn['content'] = $request->content_vn;
                $language_vn['type'] = 1;
                $language_vn['position'] = $request->position_vn;
                if ($languageVN) {
                    $languageVN->update($language_vn);
                } else {
                    Language::create($language_vn);
                }
            };

            if($request->name_en != null){
                $request->validate([
                    'name_en' => 'required',
                    'price_en' => 'required|numeric',
                    'description_en' => 'required',
                    'content_en' => 'required'
                ],[
                    'name_en.required' => 'Tên tài liệu không được để trống',
                    'price_en.required' => 'Giá tài liệu không được để trống',
                    'price_en.numeric' => 'Giá tài liệu phải là dạng số',
                    'description_en.required' => 'Mô tả ngắn liệu không được để trống',
                    'content_en.required' => 'Nội dung tài liệu không được để trống',
                ]);
                $language_en['id_product'] = $document->id;
                $language_en['name'] = $request->name_en;
                $language_en['price'] = $request->price_en;
                $language_en['description'] = $request->description_en;
                $language_en['content'] = $request->content_en;
                $language_en['type'] = 2;
                $language_en['position'] = $request->position_en;
                if ($languageEN) {
                    $languageEN->update($language_en);
                } else {
                    Language::create($language_en);
                }
            };

            if($request->name_cn != null){
                $request->validate([
                    'name_cn' => 'required',
                    'price_cn' => 'required|numeric',
                    'description_cn' => 'required',
                    'content_cn' => 'required'
                ],[
                    'name_cn.required' => 'Tên tài liệu không được để trống',
                    'price_cn.required' => 'Giá tài liệu không được để trống',
                    'price_cn.numeric' => 'Giá tài liệu phải là dạng số',
                    'description_cn.required' => 'Mô tả ngắn liệu không được để trống',
                    'content_cn.required' => 'Nội dung tài liệu không được để trống',
                ]);
                $language_cn['id_product'] = $document->id;
                $language_cn['name'] = $request->name_cn;
                $language_cn['price'] = $request->price_cn;
                $language_cn['description'] = $request->description_cn;
                $language_cn['content'] = $request->content_cn;
                $language_cn['type'] = 3;
                $language_cn['position'] = $request->position_cn;
                if ($languageCN) {
                    $languageCN->update($language_cn);
                } else {
                    Language::create($language_cn);
                }
            };
            DB::commit();
            return redirect()->route('ad.document.index')->with('success', 'Sửa tài liệu thành công!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Sửa tài liệu thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $language = Language::where('id_product', $document->id)->get();
        $document->delete();
        foreach ($language as $item) {
            $item->delete();
        }
        return redirect()->route('ad.document.index')->with('success', 'Xoá tài liệu thành công!');
    }

    public function type(Document $document)
    {
        if($document->hot == 1){
            $document->update(['hot'=> 0]);
            return back()->with('success','Ẩn tài liệu thành công!');
        }else{
            $document->update(['hot'=> 1]);
            return back()->with('success','Hiện tài liệu nhật thành công!');
        }
    }

    public function new(Document $document)
    {
        if($document->new == 1){
            $document->update(['new'=> 0]);
            return back()->with('success','Ẩn tài liệu thành công!');
        }else{
            $document->update(['new'=> 1]);
            return back()->with('success','Hiện tài liệu nhật thành công!');
        }
    }

    public function deleteLanguage(Language $language){
        $language->delete();
        return redirect()->back()->with('success', 'Xoá ngôn ngữ thành công!');
    }
}
