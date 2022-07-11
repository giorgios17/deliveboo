<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Plate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Plate::where('user_id', Auth::user()->id)->orderBy('name', 'asc')->get();

        //recupero user
        $orders = Order::where('user_id', Auth::user()->id)->with('plate')->orderBy('created_at', 'desc')->get();

        // recupero dati per grafico statistiche
        $chartData = Order::select('id','created_at', 'total_price')->where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->get()->groupBy(function ($chartData){
            return Carbon::parse($chartData->created_at)->format('Y-m');
        });

        $months = [];
        $monthsTotal = [];
        $monthsProfit = [];
        foreach ($chartData as $month => $value) {
            $months[] = $month;
            $monthsTotal[] = count($value);
            $monthsProfit[] = $value->sum('total_price');
        }



        return view('user.index', compact('plates', 'orders', 'months','monthsTotal', 'monthsProfit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}