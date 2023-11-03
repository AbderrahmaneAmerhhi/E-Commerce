<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserContrller extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getUserOrders()
    {
        return view("user.orders.index")->with([
            'user' => auth()->user(),
            'orders' => order::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function edit(User $user)
    {
        return view('user.profile.profile')->with([
            'user' => $user,
        ]);
    }

    public function update(User $user, Request $request)
    {
        if (!empty($request->FullName) || !empty($request->password) || $request->email !== $user->email || $request->name !== $user->name || !empty($request->has('image'))) {


            if (!empty($request->FullName)) {
                $request->validate([
                    'FullName' => ['string', 'max:100'],
                ]);
                $user->FullName = $request->FullName;
            }
            if (!empty($request->password)) {
                $request->validate([
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'password_confirmation' => 'required_with:password|same:password',
                ]);
                $user->password = Hash::make($request->password);
            }
            if ($request->email !== $user->email) {
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

                ]);
                $user->email = $request->email;
            }
            if ($request->name !== $user->name) {
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],

                ]);
                $user->name = $request->name;
            }

            if ($request->has('image')) {
                if (!empty($request->image)) {
                    $request->validate([
                        'image' => 'image|mimes:png,jpg,jpeg|max:8000',

                    ]);
                    $image_path = (public_path("images/users/" . $request->image));
                    if (File::exists($image_path)) {
                        unlink($image_path);
                    }
                    $file = $request->image;
                    $image_name = time() . "_" . $file->getClientOriginalName();
                    $file->move(public_path("images/users"), $image_name);
                    $user->image = $image_name;
                }
            }



            $user->update([
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'FullName' => $user->FullName,
                'image' => $user->image,
            ]);



            return redirect()->route('user.edit', $user->id)->withSuccess('Your personal information has been successfully modified.');
        } else {

            return "kakaka";
        }
    }
}
