<?php

namespace App\Http\Controllers\Admin;

use App\Plate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'price'=> 'required|numeric|min:0.01',
            'visible'=> 'required',
            'image'=> 'required|mimes:jpg,bmp,png,jpeg|max:4096',
        ],
        [
            'name.required'=>'Il campo nome è obbligatorio.',
            'description.required'=>'Il campo descrizione è obbligatorio.',
            'price.required'=>'Il prezzo è obbligatorio.',
            'price.numeric'=>'Formato prezzo non valido.',
            'price.min'=>'Il prezzo deve essere uguale o maggiore a 0.01',
            'image.required' => 'Carica un immagine.',
            'image.mimes' => 'Formato immagine non valido.',
            'image.max' => 'Dimensioni massime consentite 4096kb.'
        ]
    );


        $plateData = $request->all();
        $newPlate = new Plate();
        $newPlate->fill($plateData);
        $img_path = Storage::put('plates', $plateData['image']);
        $newPlate->image = $img_path;
        $newPlate->user_id = Auth::user()->id;
        $newPlate->save();
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
        if ($plate->user_id != Auth::user()->id) {
            return view('404.notFound');
        } else {
            return view('admin.plate.edit', compact('plate'));
        }
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
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'price'=> 'required|numeric|min:0.1',
            'visible'=> 'required',
            'image'=> 'required|mimes:jpg,bmp,png,jpeg|max:4096',
        ],
        [
            'name.required'=>'Il campo nome è obbligatorio.',
            'description.required'=>'Il campo descrizione è obbligatorio.',
            'price.required'=>'Il prezzo è obbligatorio.',
            'price.numeric'=>'Formato prezzo non valido.',
            'price.min'=>'Il prezzo deve essere uguale o maggiore a 0.10',
            'image.required' => 'Carica un immagine.',
            'image.mimes' => 'Formato immagine non valido.',
            'image.max' => 'Dimensioni massime consentite 4096kb.'
        ]
    );

        $plate = Plate::findOrFail($id);
        $plateUpdated = $request->all();
        if (array_key_exists('image', $plateUpdated)) {
            if ($plate->image) {
                Storage::delete($plate->image);
            }
            $img_path = Storage::put("uploads", $plateUpdated["image"]);
            $plate['image'] = $img_path;
        }
        $plate->fill($plateData);
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
        if ($plate->image) {
            Storage::delete($plate->image);
        }
        $plate->delete();
        return redirect()->route('admin.plate.index');
    }
}