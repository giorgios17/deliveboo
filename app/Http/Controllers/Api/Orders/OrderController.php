<?php

namespace App\Http\Controllers\Api\Orders;

use App\User;
use App\Order;
use App\Plate;
use Braintree\Gateway;
use App\Mail\NewOrderUser;
use Illuminate\Http\Request;
use App\Mail\NewOrderCustomer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Orders\OrderRequest;
use App\Http\Requests\Orders\OrderTableRequest;

class OrderController extends Controller
{
    public function payment(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'customer_name' => 'required|string|max:50',
                'customer_surname' => 'required|string|max:50',
                'customer_address' => 'required|string|max:255',
                'customer_phone' => 'required|numeric',
                'customer_email' => 'required|string|max:255',
            ],
            [
                'customer_name.required' => 'Il nome è obbligatorio',
                'customer_name.max' => 'Il nome non può essere più lungo di 50 caratteri',
                'customer_surname.required' => 'Il cognome è obbligatorio',
                'customer_surname.max' => 'Il cognome non può essere più lungo di 50 caratteri',
                'customer_address.required' => 'L\'indirizzo è obbligatorio',
                'customer_address.max' => 'L\'indirizzo non può essere più lungo di 255 caratteri',
                'customer_phone.required' => 'Il numero di telefono è obbligatorio',
                'customer_phone.numeric' => 'Il numero di telefono deve essere numerico',
                'customer_email.required' => 'L\'email è obbligatoria',
                'customer_email.max' => 'L\'email non può essere più lunga di 255 caratteri',
            ]
        );

        $newOrder = new Order();
        $newOrder->fill($data);
        $newOrder->save();

        $plates_id = [];
        $plates_quantity = [];
        foreach ($data['plates'] as $plate) {
            $plates_id[] = $plate['id'];
            $plates_quantity[] = $plate['quantity'];
        }

        $sync_data = [];
        for ($i = 0; $i < count($plates_id); $i++)
            $sync_data[$plates_id[$i]] = ['quantity' => $plates_quantity[$i]];

        $newOrder->plate()->sync($sync_data);

        $userMail = User::where('id', $data['user_id'])->get();
        if(isset($data['customer_email']) && isset($userMail)){
        $newOrder->plates;
        Mail::to($data['customer_email'])->send(new NewOrderCustomer($newOrder));
        Mail::to($userMail)->send(new NewOrderUser($newOrder));
        }

        if ($newOrder) {
            return 'data saved succesfully';
        } else {
            return 'data not sent';
        }

        return response()->json([
            "mess" => 'creato',
            "status" => true,
        ]);
        return response()->json($data);
    }

    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            "success" => true,
            "token" => $token
        ];
        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {
        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => ' Transazione eseguita'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione fallita'
            ];
            return response()->json($data, 401);
        }
    }


}