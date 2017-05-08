<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\section;


class SectionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sections = section::all();
       $title = "Działy";
       return view('admin.sections.index', compact('sections','title'));
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
            'nazwa' => 'Nazwa działu',
            'opis' => 'Opis działu',
                   ];
        $rules = [  //zasady walidacji
            'nazwa' => 'required|unique:sections,nazwa|min:4',
            'opis'=> 'required|min:3',
            ];
        $message =[ //wiadomości wyswietlane
            'required' => 'Pole :attribute jest wymagane.',
            'min' => 'Pole :attribute  musi mieć minimum :min znaków.',
                  ];
         $this->validate($request, $rules, $message, $niceNames);

        $dzial=section::create($request->all()); // Tu jest pobrany obiekt
        $zmienna = Section::select('nazwa')->where('id',$dzial->overriding_id)->first();// Tu też jest pobrany obiekt
        $dzial->overrding_nazwa = $zmienna->nazwa; // Tu dodaję dynamiczną właściwość i pobieram tylko wartość(nazwa) nie obiekt
        return  response() ->json($dzial);
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
       $section = section::findOrFail($id);
        $sections = section::all();
       $title = "Edytuj - ".$section->nazwa;
       return view('admin.sections.edit',compact('section', 'title','sections'));
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
        $section = section::find($id);

        $section->update($request->all());

        return redirect('/dzialy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dzial= section::find($id);
        $dzial->delete();
        return response()->json($dzial);
    }
}
