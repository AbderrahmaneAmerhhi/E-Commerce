<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\comment;
use App\Models\item;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth:admin")->except("showAdminLoginForm", "adminLogin");
    }

    public function index()
    {
        return view("admin.index")->with([
            'items' => item::all(),
            'cats' => category::all(),
            "orders" => order::all(),
            "comments" => comment::all(),
        ]);
    }

    public function showAdminLoginForm()
    {
        return view("admin.auth.login");
    }

    public function adminLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => "required",
        ]);

        //login admin:
        if (auth()->guard("admin")->attempt([
            'email' => $request->email,
            'password' => $request->password

        ], $request->get("remember"))) {
            return redirect()->route("admin.index");
        } else {
            return redirect()->route("admin.login")->with([
                "errorLink" => "The password or email is incorrect. ",
            ]);
        }
    }

    public function adminLogOut()
    {
        auth()->guard("admin")->logout();
        return redirect()->route("admin.login");
    }
}
