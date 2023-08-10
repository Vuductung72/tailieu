<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function list(){
        $categories = Category::all();
        $type = 1;
        // $documents = Document::orderBy('position', 'asc')->paginate(12);
        $languages = Language::where('type', 1)->groupBy('name')->orderBy('position', 'asc')->paginate(12);
        return view('web.document.list', compact('categories', 'languages', 'type'));
    }

    public function listType($type){
        $categories = Category::all();
        // $documents = Document::orderBy('id', 'desc')->paginate(12);
        $languages = Language::where('type', $type)->groupBy('name')->orderBy('position', 'asc')->paginate(12);
        return view('web.document.list', compact('categories', 'languages', 'type'));
    }

    // public function listNew(){
    //     $categories = Category::all();
    //     $type = 1;
    //     // $documents = Document::orderBy('position', 'asc')->paginate(12);
    //     // $languages = Language::where('type', 1)->orderBy('position', 'asc')->paginate(12);
    //     $languages = Language::where('type', 1)->whereHas('document', function (Builder $query) {
    //         return $query->where('hot', 1);
    //     })->orderBy('position', 'asc')->paginate(12);
    //     return view('web.document.list_new', compact('categories', 'languages', 'type'));
    // }

    public function listCategory($slug){
        $categories = Category::all();
        $category = Category::where('slug', $slug)->first();
        $type = 1;
        // $documents = Document::where('id_category', $category->id)->orderBy('id', 'desc')->paginate(12);
        $languages = Language::where('type', 1)->whereHas('document', function (Builder $query) use($category) {
            return $query->where('id_category', $category->id);
        })->groupBy('name')->orderBy('position', 'asc')->paginate(12);
        return view('web.document.list', compact('categories', 'category', 'languages', 'type'));
    }

    public function listCategoryType($slug, $type){
        $categories = Category::all();
        $category = Category::where('slug', $slug)->first();
        // $documents = Document::where('id_category', $category->id)->orderBy('id', 'desc')->paginate(12);
        $languages = Language::where('type', $type)->whereHas('document', function (Builder $query) use($category) {
            return $query->where('id_category', $category->id);
        })->groupBy('name')->orderBy('position', 'asc')->paginate(12);
        return view('web.document.list', compact('categories', 'category', 'languages', 'type'));
    }

    public function document($slug, $document_slug){
        $document = Document::where('slug', $document_slug)->first();
        $language = Language::where('id_product', $document->id)->orderBy('type', 'asc')->first();
        $type_language = Language::where('id_product', $document->id)->orderBy('type', 'asc')->get();
        // dd($type_language);

        return view('web.document.document', compact('language', 'type_language'));
    }

    public function type(Request $request){
        $type = $request->type;
        $document_slug = $request->document_slug;
        $document = Document::where('slug', $document_slug)->first();
        $language = Language::where('id_product', $document->id)->where('type', $type)->first();
        return response($language, 200)
                  ->header('Content-Type', 'text/plain');
    }

    public function search(Request $request) {
        $document = $request->document ?? '';
        $type = 1;
        $categories = Category::all();
        // $documents = Document::where('code', 'like', '%' . $document . '%')->orderBy('id', 'desc')->paginate(12);
        $languages = Language::where('type', 1)->whereHas('document', function (Builder $query) use($document) {
            return $query->where('code', 'like', '%' . $document . '%');
        })->orderBy('position', 'asc')->paginate(12);
        return view('web.document.list', compact('categories', 'languages', 'document', 'type'));
    }
}
