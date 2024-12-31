<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
class PaymentController extends Controller
{
    public function paymentPost(Request $request)
    {	       
	Stripe\Stripe::setApiKey('sk_test_51JMZxHLv3qp2oXfmezUo5RgG5cUGOjRSoFV1VieHFgwxvP9ekVtXV2Xc1VX7jJTaQHVBwXOi0BrL3QplbkC7wjfH00nDXc6tqH');
        Stripe\Charge::create ([
                "amount" => $request->sub*100,   // RM10  10=10 cen 10*100=1000 cen
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of southern online",
        ]);
           
        return back();
    }
}
