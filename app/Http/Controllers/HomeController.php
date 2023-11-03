<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            "items" => item::latest()->paginate(9),
            "cats" => category::has("items")->get(),

        ]);
    }



    public function getItemByCategory(category $category)
    {
        $items = $category->items()->paginate(9);
        return view('home')->with([
            "items" => $items,
            'cats' => category::has('items')->get(),
        ]);
    }
}
