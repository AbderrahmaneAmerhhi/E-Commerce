<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\item;
use App\Models\category;
use App\Models\comment;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware("auth:admin")->except("show");
    }
    public function index()
    {
        //
        return view("admin.items.index")->with([
            "items" => item::latest()->paginate(5),
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
        return view("admin.items.create")->with([
            "cats" => category::all(),
        ]);
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
        $request->validate([
            'title' => 'required|min:3|max:20',
            'description' => "required|min:5",
            'price' => 'numeric|Nullable',
            'Old_price' => 'numeric|Nullable',
            'price' => 'numeric|Nullable',
            'in_Stock' => 'numeric|Nullable',
            'Qte' => 'numeric|Nullable',
            'image' => 'required|image|mimes:png,jpg,jprg|max:7000',
            'category_id' => 'required|numeric'
        ]);


        if ($request->has("image")) {
            $file = $request->image;
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("images/items"), $imageName);
            $title = $request->title;
            //echo $title;
            if ($request->price === "" && $request->in_Stock === "" && $request->Qte === "" && $request->Old_price == "") {
                $request->price = 0;
                $request->in_Stock = 0;
                $request->Qte = 0;
                $request->Old_price = 0;
            } elseif ($request->price === "") {
                $request->price = 0;
            } elseif ($request->in_Stock == "") {
                $request->in_Stock = 0;
            } elseif ($request->Qte == "") {
                $request->Qte = 0;
            } elseif ($request->Old_price == "") {
                $request->Old_price = 0;
            }
            item::create([
                "title" => $title,
                "slug" => Str::slug($title),
                "description" => $request->description,
                "price" => $request->price,
                "Old_price" => $request->Old_price,
                "in_Stock" => $request->in_Stock,
                "Qte" => $request->Qte,
                "Country_Mad" => $request->Country_Mad,
                "image" => $imageName,
                "category_id" => $request->category_id
            ]);

            return redirect()->route("item.index")->with([
                "success" => "Product " . $title . " Added",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        //
        $comments = comment::where("item_id", $item->id)->latest()->paginate(4);
        $user = User::has('comments')->get();
        return view("items.show")->with([
            "item" => $item, // item
            "comments" => $comments,
            "users" => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(item $item)
    {
        //
        return view("admin.items.edit")->with([
            "item" => $item,
            "cats" => category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item $item)
    {
        //
        $request->validate([
            'title' => 'required|min:3|max:20',
            'description' => "required|min:5",
            'price' => 'numeric|Nullable',
            'Old_price' => 'numeric|Nullable',
            'price' => 'numeric|Nullable',
            'in_Stock' => 'numeric|Nullable',
            'Qte' => 'numeric|Nullable',
            'image' => 'image|mimes:png,jpg,jpeg|max:8000',
            'category_id' => 'required|numeric'
        ]);

        if ($request->has("image")) {
            $image_path = public_path("images/items/" . $item->image);
            if (File::exists($image_path)) {
                unlink($image_path);
            }

            $file = $request->image;
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("images/items"), $imageName);
            $item->image = $imageName;
        }
        $title = $request->title;
        //echo $title;
        if ($request->price === "" && $request->in_Stock === "" && $request->Qte === "" && $request->Old_price == "") {
            $request->price = 0;
            $request->in_Stock = 0;
            $request->Qte = 0;
            $request->Old_price = 0;
        } elseif ($request->price === "") {
            $request->price = 0;
        } elseif ($request->in_Stock == "") {
            $request->in_Stock = 0;
        } elseif ($request->Qte == "") {
            $request->Qte = 0;
        } elseif ($request->Old_price == "") {
            $request->Old_price = 0;
        }

        $item->update([
            "title" => $title,
            "slug" => Str::slug($title),
            "description" => $request->description,
            "price" => $request->price,
            "Old_price" => $request->Old_price,
            "in_Stock" => $request->in_Stock,
            "Qte" => $request->Qte,
            "Country_Mad" => $request->Country_Mad,
            "image" => $item->image,
            "category_id" => $request->category_id
        ]);

        return redirect()->route("item.index")->with([
            "success" => "Product " . $title . " Updated",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        //

        $image_path = public_path("images/items/" . $item->image);
        if (File::exists($image_path)) {
            unlink($image_path); // msh tswira  mn folder
        }
        $item->delete();
        return redirect()->route("item.index")->withSuccess("Product Deleted");
    }
}
