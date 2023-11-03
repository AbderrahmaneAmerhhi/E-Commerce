<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware("auth:admin")->except("indix", "show");
    }
    public function index()
    {
        // show index view

        return view("admin.categories.index")->with([
            "cats" => category::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $v = validator($request->all(), [
            "title" => "required|max:20|min:3",

        ]);
        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }
        $title = $request->title;
        category::Create([
            "title" => $title,
            "slug" => Str::slug($title),
            "visibility" => $request->visibility
        ]);


        return  redirect()->route("category.index")->with([
            "success" => " Category " . $title . " Added "
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //

        return view("admin.categories.edit")->with([
            "cat" => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
        //
        $v = validator($request->all(), [
            "title" => "required|max:20|min:3",

        ]);
        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }

        $title = $request->title;
        $category->update([
            "title" => $title,
            "slug" => Str::slug($title),
            "visibility" => $request->visibility
        ]);


        return  redirect()->route("category.index")->with([
            "success" => " Category " . $title . " Updated "
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
        $category->delete();
        return  redirect()->route("category.index")->with([
            "success" => " Category " . $category->title . " Deleted "
        ]);
    }
}
