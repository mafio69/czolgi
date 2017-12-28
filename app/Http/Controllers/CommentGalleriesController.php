<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentGallery;

class CommentGalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = CommentGallery::with('Gallery')->orderBY('dataKom','desc')->paginate(40);
        $title = "Komentarze do encyklopedii";

        return view('admin.CommentGalleries.index', compact('comments', 'title'));
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
            'tytulKom' => 'Tytuł komentarza',
            'autorKom' => 'Podpis ',
            'tekstKom' => 'Tekst komentarza',
        ];
        $rules = [  //zasady walidacji
            'tytulKom' => 'required|string|min:4',
            'autorKom' => 'required|string|min:4',
            'tekstKom' => 'required|string|min:3',
        ];
        $message = [ //wiadomości wyswietlane
            'required' => 'Pole :attribute jest wymagane.',
            'min' => 'Pole :attribute  musi mieć minimum :min znaki.',
        ];
        $this->validate($request, $rules, $message, $niceNames);
        $ip = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $referrer = $_SERVER['HTTP_REFERER'];
        if ($referrer == "") {
            $referrer = "Ta strona była dostępna bezpośrednio";
        }
        $comment = CommentGallery::create($request->all());
        $comment->infoKom = $ip. ' '.$browser. ' '.$referrer;
        //$comment->dataKom = time();
        $comment->save();

        return response()->json($comment);
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
        $comment = CommentGallery::findOrFail($id);
        $comment->delete();

        return response()->json($comment);

    }

    public function change(Request $request, $id)
    {
       $comment = CommentGallery::find($id);
       $comment->aprobataKom = $request->aprobataKom;
       $comment->save();



       return response()->json($comment);

    }
}
