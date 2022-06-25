<?php

namespace App\Http\Controllers\Admin;

use App\Plate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
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
        //
        $user = Auth::user();
        $plates = $user->plate;
        return view('admin.plate.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.plate.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPlate = $request->all();
        $plate = new Plate();
        $plate->name = $newPlate["name"];
        $plate->description = $newPlate["description"];
        $plate->price = $newPlate["price"];
        $plate->visible = $newPlate["visible"];
        $img_path = Storage::put('uploads', $newPlate['image']);
        $plate->image = $img_path;
        $plate->user_id = Auth::user()->id;
        $plate->save();
        return redirect()->route('admin.plate.index');
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
        $plate = Plate::findOrFail($id);
        return view('admin.plate.edit', compact('plate'));
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
        $plate = Plate::findOrFail($id);
        $plateUpdated = $request->all();
        if(array_key_exists('image', $plateUpdated)){
            if($plate->image){
                Storage::delete($plate->image);
                }
            $img_path = Storage::put("uploads", $plateUpdated["image"]);
            $plate['image'] = $img_path;
            }
        $plate->name = $plateUpdated['name'];
        $plate->description = $plateUpdated['description'];
        $plate->price = $plateUpdated['price'];
        $plate->visible = $plateUpdated['visible'];
        $plate->save();
        return redirect()->route('admin.plate.index');

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
        $plate = Plate::findOrFail($id);
        if($plate->image){
            Storage::delete($plate->image);
        }
        $plate->delete();
        return redirect()->route('admin.plate.index');
    }
}
