<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Paystack\Facades\Paystack as FacadesPaystack;
class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack's Payment Page
     *
     * @return Url
     */
    public function redirectToGateway () {

        return FacadesPaystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = FacadesPaystack::getPaymentData();

        return true;
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }


}
