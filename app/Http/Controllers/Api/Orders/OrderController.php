<?php

namespace App\Http\Controllers\Api;

use App\Plate;
use App\Order;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Orders\OrderRequest;
use App\Http\Requests\Orders\OrderTableRequest;

class OrderController extends Controller
{
    //
    public function payment(Request $request){
        $data = $request->all();
        // return($data);
        $newOrder = new Order();
        $newOrder->fill($data);
        $newOrder->save();

        $plates_id = [];
        $plates_quantity = [];
        foreach($data['plates'] as $plate){
            $plates_id[] = $plate['id'];
            $plates_quantity[] = $plate['quantity'];
        }

        $sync_data = [];
        for($i = 0; $i < count($plates_id); $i++)
            $sync_data[$plates_id[$i]] = ['quantity' => $plates_quantity[$i]];

        $newOrder->dishes()->sync($sync_data);

        if($newOrder){
            return 'data saved succesfully';
        } else {
            return 'data not sent';
        }

            // $validator = Validator::make($data , [
            //         'name' => 'required|string|max:30',
            //         'surname' => 'required|string|max:30',
            //         'email' => 'required|string|max:255',
            //         'phone' => 'required|numeric',
            //         'address' => 'required|string|max:255',
            //         'restaurant_id' => 'required',
            //         'status' => 'required',
            //         'total' => 'required',
            //     ]);

            //     $control = $validator->fails();
            //     if($control){
            //             return response()->json([
            //                     "mess" => 'ERRORE MADORNALE',
            //                     "old" => $validator->errors(),
            //                     "status" => false,
            //                 ]);
            //     }


                    //     if(isset($data['email']) && isset($data['user_email'])){
                        //         $order->plates;
                        //         Mail::to($data['email'])->send(new SendNewMail($order));
                        //         Mail::to($data['user_email'])->send(new SendNewMail($order));
                        // }

                            // return response()->json([
                            //         "mess" => 'creato',
                            //         "status" => true,
                            //     ]);
                            // return response()->json($data);

    }

    public function generate(Request $request, Gateway $gateway){

        $token = $gateway->clientToken()->generate();

        $data = [

            'success' => true,

            'token' => $token

        ];

        return response()->json($data, 200);
	}

	public function makePayment(OrderRequest $request, Gateway $gateway){

        // $dish = Dish::find($request->dish);
        // return 'make payment';
        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

            if($result->success){

                $data = [

                    'success' => true,

                    'message' => ' Transazione eseguita'

                ];

                return response()->json($data, 200);

            }else{

                $data = [

                    'success' => false,

                    'message' => 'Transazione fallita'

                ];

                return response()->json($data, 401);

            }

	}

}
