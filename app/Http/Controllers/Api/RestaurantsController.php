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

        $restaurants = User::whereHas('typology', function ($query) use ($data) {
            $query->whereIn('id', $data);
        })->get();

        return response()->json($restaurants);
    }
    public function getPlates($slug)
    {
        $restaurant = User::where("slug", $slug)->with('Plate')->first();
        return response()->json($restaurant);
    }
}
