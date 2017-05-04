<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\typeTank;
use Illuminate\Validation\Rule;

class TypeTanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $typeTanks = typeTank::orderBy('id','desc')->get();
       $title = " Typy czołgów";

       return view('admin.TypeTanks.index',compact('typeTanks','title'));
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
        $niceNames = [  //nazwy dla pól formularza
            'name' => 'typ czołgu',
                    ];
        $rules = [  //zasady walidacji
             'name' => 'required|min:3|unique:type_tanks,name',
        ];
        $message =[ //wiadomości wyswietlane
            'required' => 'Pole :attribute jest wymagane.',
            'min' => 'Pole :attribute  musi mieć minimum :min znaków.',
        ];
        $this->validate($request, $rules, $message, $niceNames);
        $typeTank = typeTank::create($request->all());

        return response()->json($typeTank);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeTank = typeTank::find($id);

        return response()->json($typeTank);
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
        $niceNames = [  //nazwy dla pól formularza
            'name' => 'typ czołgu',
        ];
        $rules = [  //zasady walidacji
            'name' => 'required|min:3|unique:type_tanks,name',
        ];
        $message =[ //wiadomości wyswietlane
            'required' => 'Pole :attribute jest wymagane.',
            'min' => 'Pole :attribute  musi mieć minimum :min znaków.',
        ];
        $this->validate($request, $rules, $message, $niceNames);
        $typeTank = typeTank::find($id);
        $typeTank->update($request->all());

        return response()->json($typeTank);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeTank = typeTank::find($id);
        $typeTank->delete();

        return response()->json($typeTank);
    }
}
