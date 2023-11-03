<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware("auth:admin")->except("store");
        $this->middleware("auth");
    }
    public function index()
    {
        //
        return view("admin.comments.index")->with([
            "comments" => comment::latest()->paginate(10),
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
        $comment = filter_var($request->comment, FILTER_SANITIZE_STRING);
        $userId = auth()->user()->id;
        if (!empty($comment)) {
            comment::create([
                "comment" => $comment,
                "status" => 0,
                "item_id" => $request->item_id,
                "user_id" => $userId,
            ]);
            return redirect()->route("home")->with([
                "success" => "Your comment is awaiting validation "
            ]);
        } else {
            return redirect()->route("home")->with([
                "error" => "Sorry, it is not possible to enter an empty value in Comment !! "
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $comment = comment::findOrFail($id);

        $comment->update([
            'status' => 1,
        ]);
        return redirect()->route("Comment.index")->with([
            "success" => "Comment Approved",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $comment = comment::findOrFail($id);
        $comment->delete();
        return redirect()->route("Comment.index")->with([
            "success" => "Comment Deleted",
        ]);
    }
}
