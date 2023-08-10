<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RuleRequest;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules = Rule::orderBy('id', 'desc')->paginate(10);
        return view('admin.rules.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rules.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuleRequest $request)
    {
        $data = $request->only('name', 'type', 'content');
        $data['slug'] = Str::slug($request->name);
        Rule::create($data);
        return redirect()->route('ad.rule.index')->with('success', 'Thêm bài viết thành công!');

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
    public function edit(Rule $rule)
    {
        return view('admin.rules.edit', compact('rule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rule $rule)
    {
        $data = $request->only('name', 'type', 'content');
        $data['slug'] = Str::slug($request->name);
        $rule->update($data);
        return redirect()->route('ad.rule.index')->with('success', 'Sửa bài viết thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rule $rule)
    {
        $rule->delete();
        return redirect()->back()->with('success', 'Xoá bài viết thành công!');
    }
}
