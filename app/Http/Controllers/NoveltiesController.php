<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Novelty;
use App\User;
use Illuminate\Http\Request;

class NoveltiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novelties = Novelty::orderBy('dataNews','desc')->paginate(40);
        $title = "Nowości";
        $i=1;

        return view('admin.novelties.index',compact('novelties','title','i'));
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
            'tytulNews' => 'Tytuł News',
            'podtytulNews' => 'Drugi tytuł',
            'tekstNews' => 'Treść newsa',
        ];
        $rules = [  //zasady walidacji
            'tytulNews' => 'required|unique:novelties,tytulNews|min:4',
            'podtytulNews' => 'min:4',
            'tekstNews' => 'required|min:3',
        ];
        $message =[ //wiadomości wyswietlane
            'required' => 'Pole :attribute jest wymagane.',
            'min' => 'Pole :attribute  musi mieć minimum :min znaków.',
        ];
        $this->validate($request, $rules, $message, $niceNames);

        $novelty=Novelty::create($request->all());

        return  response()->json($novelty);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $novelty= Novelty::find($id);
        $users= User::all();
        $novelty->users = $users;

        return  response()->json($novelty, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
            'tytulNews' => 'Tytuł News',
            'tekstNews' => 'Treść newsa',
        ];
        $rules = [  //zasady walidacji
            'tytulNews' => ['required', 'max:125', Rule::unique('novelties')->ignore($request->idNews)],
            'tekstNews' => 'required|min:3',
        ];
        $message =[ //wiadomości wyswietlane
            'required' => 'Pole :attribute jest wymagane.',
            'min' => 'Pole :attribute  musi mieć minimum :min znaków.',
        ];
        $this->validate($request, $rules, $message, $niceNames);

        $novelty = Novelty::find($id);
        $novelty->update($request->all());

       return response()->json($novelty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $novelty = Novelty::find($id);
        $novelty->delete();

        return response()->json($novelty);
    }
}
