<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\order;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class PaymentsController extends Controller
{
    //

     public function __construct()
     {
         $this->middleware("auth");
     }


    public function checkout(Request $request){

    //  return $request->amount; // had fucntion katst9bl amount lihowa prix lisftna liha mzyan

    /* had function dawr dyalha tsta9bl amount lija mn view dcart otsift had amount
     lview lifih form dyal stripe dyal payment */
     return view("payments.checkout")->with([
        'amount'=>$request->amount,
     ]);


   }


   /* charge methode katst9bl token lijatha mn client side  okatsayb charge okatsifo
      lstripe oljawab lijaha katrdo lclient side */
   public function charge(Request $request){
     // dd($request->stripeToken); // ntesti wach token katji

     // nsayb charge onsifto
    $charge=Stripe::charges()->create([
        "currency"=> 'USD', // naw3 3omla
        "source" => $request->stripeToken , // token lijana z3ma mnin ayjiw flos achmn cart ohka masdar z3ma ..
        "amount"  =>(double)($request->amount/9.13), // convert to dollar
        "description"=>'test from laravel new app'
     ]);
       // charegId howa ra9m li4ayjini ila daz payment mzyan bla machakil
       $chargeId = $charge['id'];
       if($chargeId){// ila ja id machi null donc daz payment mzyan
         // Add order in table Order
         foreach(\Cart::getContent() as $item){
            order::create([
          "user_id"=>auth()->user()->id,
          "product_name"=>$item->name,
          "qte"=>$item->quantity,
          "price"=>$item->price,
          "total"=>$item->price * $item->quantity,
          "paid"=>1 , // z3ma rah khls safi 4asift lih


          ]);
          /* update product qte */
           DB::update("update items set Qte=Qte-? where id=?",[$item->quantity,$item->id]);

         // Clear cart
         \Cart::Clear();
      }

         return redirect()->route("home")->withSuccess("Payment was done , Thanks");
       }else{
           // fhalat payment madazch howa hadak
           return redirect()->back()->withErrors("There's a payment problem !! ");
       }
   }
}
