<?php

namespace App\Http\Controllers;

use App\Models\item;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function index()
    {

        $CartContent = \Cart::getContent();
        return view("cart.index")->with([
            "items" => $CartContent,
            "countcart" => $CartContent->count(), // Qte
        ]);
    }

    public function addItemToCart(item $item, Request $request)
    {
        \Cart::add(array(
            "id" => $item->id,
            "name" => $item->title,
            "price" => $item->price,
            "quantity" => $request->qte,
            "attributes" => array(),
            "associatedModel" => $item,
        ));
        return redirect()->route('cart.index');
    }

    public function updateItemOnCart(item $item, Request $request)
    {

        // update card
        \Cart::update($item->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity,
            ),

        ));
        return redirect()->route('cart.index');
    }

    public function removeItemFromCart(item $item, Request $request)
    {
        // remove cart
        \Cart::remove($item->id);
        return redirect()->route('cart.index');
    }
}
