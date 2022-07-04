<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Typology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantsController extends Controller
{
    public function filterRestaurants($id)
    {
        $data = json_decode($id);
        // dd($data[0]);
        // foreach ($data as $value) {
        // dd($value);
        return response()->json([
            'response' => Typology::with("User")->whereIn("id", $data)->get()
        ]);
        // }
    }
    public function getPlates($slug)
    {
        $restaurant = User::where("slug", $slug)->with('Plate')->first();
        return response()->json($restaurant);
    }
}
