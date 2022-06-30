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
        return response()->json([
            'response' => Typology::with("User")->where("id", $id)->get()
        ]);
    }
    public function getPlates($slug)
    {
        $restaurant = User::where("slug", $slug)->with('Plate')->first();
        return response()->json($restaurant);
    }
}
