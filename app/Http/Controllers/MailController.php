<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function SendEmail(Request $request)
    {
        $details = [
            'title' => $request->subject,
            'body' => $request->msj,
        ];
        Mail::to("benalitaha55@gmail.com")->send(new TestMail($details));
        return redirect()->route('home')->with([

            'success-mail' => 'Email Sent'
        ]);
    }
}
