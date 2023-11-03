<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\order;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;

class PaypalPaymentController extends Controller
{
    //
    public function  __construct()
    {
        $this->middleware("auth");
    }

    public function handelPayment()
    {
        $data = [];
        $data['items'] = [];

        foreach (\Cart::getContent() as $item) {
            array_push($data['items'], [
                'name' => $item->name,
                'price' => (int)($item->price / 9),
                'desc'  =>  $item->associatedModel->description,
                'qty' => $item->quantity
            ]);
        }
        $data['invoice_id'] = auth()->user()->id;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('success.payment');
        $data['cancel_url'] = route('cancel.payment');

        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
        $data['total'] = $total;
        $paypalModule = new ExpressCheckout();

        $res = $paypalModule->setExpressCheckout($data);
        $res = $paypalModule->setExpressCheckout($data, true);

        return redirect($res['paypal_link']);
    }
    public function CancelPayment()
    {
        return redirect()->route("cart.index")->with([
            'info' => "You have declined the payment.",
        ]);
    }
    public function SuccessPayment(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $reponse = $paypalModule->getExpressCheckoutDetails($request->token);
        if (in_array(strtoupper($reponse["ACK"]), ["SUCCESS", "SUCCESSWITHWARNING"])) {
            foreach (\Cart::getContent() as $item) {
                order::create([
                    "user_id" => auth()->user()->id,
                    "product_name" => $item->name,
                    "qte" => $item->quantity,
                    "price" => $item->price,
                    "total" => $item->price * $item->quantity,
                    "paid" => 1,


                ]);
                //update qte in item table
                DB::update("update items set Qte=Qte-? where id=?", [$item->quantity, $item->id]);
                // nkhwi panier
                \Cart::Clear();
            }
            return redirect()->route('home')->with([
                'success' => 'Payment has been made successfully.'
            ]);
        }
    }
}
