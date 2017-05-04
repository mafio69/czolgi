<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\gallery;
use App\typeTank;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = gallery::paginate(35);
        $types_gallery = TypeTank::all();
        $title = 'Encyklopedia';


        return view('admin.galleries.index', compact('galleries', 'title','types_gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = typeTank::all();
        $title = 'Dodaj czołg';

        return view('admin.galleries.create', compact('types', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $niceNames = [  //nazwy dla pól formularza
            'nazwaGaleria' => 'nazwa czołgu',
            'aliasGaleria' => 'alias - inna nazwa',
            'krajGaleria' => 'kraj pochodzenia',
            'rokPowstaniaGaleria' => 'rok powstania',
            'zdjecieGaleria' => 'zdjęcie czołgu',
            'type_tank_id' => 'typ wozu',
            'opisGaleria' => 'opis',
            'daneGaleria' => 'dane',

        ];
        $rules = [  //zasady walidacji
            'nazwaGaleria' => 'required|max:125|min:3',
            'aliasGaleria' => 'required|max:125|min:3',
            'krajGaleria' => 'required|max:125|min:3',
            'rokPowstaniaGaleria' => 'required|min:4',
            'zdjecieGaleria' => 'required|file|mimes:jpeg,bmp,png,jpg,gif',
            'type_tank_id' => 'required|numeric',
            'opisGaleria' => 'required|min:20',
            'daneGaleria' => 'required|min:20',
        ];
        $message = [ //wiadomości wyswietlane
            'required' => 'Pole :attribute jest wymagane.',
            'min' => 'Pole :attribute  musi mieć minimum :min znaków.',
            'date_format' => 'Pole :attribute musi być poprawną data: RRRR-MM-DD.',
            'numeric' => "Pole typ czołgu ma nie prawidłową wartość.",
        ];
        $this->validate($request, $rules, $message, $niceNames);
        $name = $request->file('zdjecieGaleria')->getClientOriginalName();
        $wozy_path = 'storage/wozy/';
        Image::make($request->file('zdjecieGaleria'))->widen(800)->save($wozy_path . $name);
        Image::make($request->file('zdjecieGaleria'))->widen(150)->save($wozy_path . '/male/' . $name);
        //$duzy->storeAs($user_document_path, $name);
        //$maly->storeAs($user_document_path.'/maly/', $name);

        $tank = new Gallery;
        $tank->user_id = auth()->id();
        $tank->type_tank_id = $request->type_tank_id;
        $tank->aliasGaleria = $request->aliasGaleria;
        $tank->nazwaGaleria = $request->nazwaGaleria;
        $tank->krajGaleria = $request->krajGaleria;
        $tank->zdjecieGaleria = $name;
        $tank->opisGaleria = $request->opisGaleria;
        $tank->daneGaleria = $request->daneGaleria;
        $tank->rokPowstaniaGaleria = $request->rokPowstaniaGaleria;
        $tank->zatwierdzGaleria = Null;
        $tank->dataUtworzeniaGaleria = date('Y-m-d H:i:s');
        $tank->save();

        return redirect('/admin/encyklopedia');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = gallery::find($id);
        $title = 'Oglądasz' . $gallery->nazwaGaleria;

        return view('admin.galleries.show', compact('gallery', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = gallery::with('typeTank')->find($id);
        $types = typeTank::all();
        $title = 'Edycja ' . $gallery->nazwaGaleria;

        return view('admin.galleries.edit', compact('gallery', 'title', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $tank = gallery::find($id);
        $niceNames = [  //nazwy dla pól formularza
            'nazwaGaleria' => 'nazwa czołgu',
            'aliasGaleria' => 'alias - inna nazwa',
            'krajGaleria' => 'kraj pochodzenia',
            'rokPowstaniaGaleria' => 'rok powstania',
            'zdjecieGaleria' => 'zdjęcie czołgu',
            'type_tank_id' => 'typ wozu',
            'opisGaleria' => 'opis',
            'daneGaleria' => 'dane',

        ];
        $rules = [  //zasady walidacji
            'nazwaGaleria' => 'required|max:125|min:3',
            'aliasGaleria' => 'required|max:125|min:3',
            'krajGaleria' => 'required|max:125|min:3',
            'rokPowstaniaGaleria' => 'required|min:4',
            'zdjecieGaleria' => 'image',
            'type_tank_id' => 'required|numeric',
            'opisGaleria' => 'required|min:20',
            'daneGaleria' => 'required|min:20',
        ];
        $message = [ //wiadomości wyswietlane
            'required' => 'Pole :attribute jest wymagane.',
            'min' => 'Pole :attribute  musi mieć minimum :min znaków.',
            'date_format' => 'Pole :attribute musi być poprawną data: RRRR-MM-DD.',
            'numeric' => "Pole typ czołgu ma nie prawidłową wartość.",
        ];
        $this->validate($request, $rules, $message, $niceNames);
        if (!empty($request->zdjecieGaleria)) {
            $name = $request->file('zdjecieGaleria')->getClientOriginalName();
            $wozy_path = 'storage' . DIRECTORY_SEPARATOR . 'wozy' . DIRECTORY_SEPARATOR;
            // $wozy_path2='wozy'.DIRECTORY_SEPARATOR;
            $delete_path = public_path() . DIRECTORY_SEPARATOR . $wozy_path;
            $delete_path_male = public_path() . DIRECTORY_SEPARATOR . $wozy_path . 'male' . DIRECTORY_SEPARATOR;
            echo $delete_path_male . $tank->zdjecieGaleria;
            if (file_exists($delete_path . $tank->zdjecieGaleria)) {
               unlink($delete_path . $tank->zdjecieGaleria);
                            }
            if (file_exists($delete_path_male . $tank->zdjecieGaleria)) {
                unlink($delete_path_male . $tank->zdjecieGaleria);
            }
            Image::make($request->file('zdjecieGaleria'))->widen(800)->save($wozy_path . $name);
            Image::make($request->file('zdjecieGaleria'))->widen(150)->save($wozy_path . '/male/' . $name);

        } else {
            $name = $tank->zdjecieGaleria;
        }

        $tank->user_id = auth()->id();
        $tank->type_tank_id = $request->type_tank_id;
        $tank->aliasGaleria = $request->aliasGaleria;
        $tank->nazwaGaleria = $request->nazwaGaleria;
        $tank->krajGaleria = $request->krajGaleria;
        $tank->zdjecieGaleria = $name;
        $tank->opisGaleria = $request->opisGaleria;
        $tank->daneGaleria = $request->daneGaleria;
        $tank->rokPowstaniaGaleria = $request->rokPowstaniaGaleria;
        $tank->zatwierdzGaleria = Null;
        $tank->dataUtworzeniaGaleria = date('Y-m-d H:i:s');
        $tank->save();
         return redirect('/admin/encyklopedia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tank = gallery::find($id);
        $wozy_path = 'storage/wozy/';
        $delete_path = public_path() . '/' . $wozy_path;
        $delete_path_male = public_path() . '/' . $wozy_path . 'male/';
        if (file_exists($delete_path . $tank->zdjecieGaleria)) {
            unlink($delete_path . $tank->zdjecieGaleria);
        }
        if (file_exists($delete_path_male . $tank->zdjecieGaleria)) {
            unlink($delete_path_male . $tank->zdjecieGaleria);
        }
        $tank->delete();
        return response()->json($tank);
    }

    public function dane($id)
    {
        $tank = gallery::find($id);

        return response()->json($tank, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
