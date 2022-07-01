<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            "success" => true,
            "token" => $token
        ];
        return response()->json($data, 200);
    }
    public function makePayment(Request $request, Gateway $gateway)
    {
        return "prova";
    }
}
