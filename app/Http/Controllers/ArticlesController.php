<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Section;
use App\User;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('user')->with('section')->get();
        $title = "Artykuły";
        $i=1;

        Return view('admin.articles.index',compact('articles','title','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$articles = Article::with('user')->with('section')->get();
        $sections = Section::all();
        $title = "Stwórz artykuł";

        Return view('admin.articles.create',compact('title','sections'));
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
            'tytulArt' => 'tytuł',
            'podtytulArt' => 'pod tytuł',
            'tekstArt'=> 'treść artykułu',
            'dataWydarzeniaArt'=> 'data wydarzenia',
            'section_id' => 'dział'

        ];
        $rules = [  //zasady walidacji
            'tytulArt' =>  'required|max:125|min:3',
            'podtytulArt' => 'required|min:5|max:125',
            'tekstArt'=> 'required|min:5',
            'dataWydarzeniaArt' => 'required|date',
            'section_id' => 'required' ,
        ];
        $message =[ //wiadomości wyswietlane
            'required' => 'Pole :attribute jest wymagane.',
            'min' => 'Pole :attribute  musi mieć minimum :min znaków.',
            'date_format' => 'Pole :attribute musi być poprawną data: RRRR-MM-DD.',
             ];
        $this->validate($request, $rules, $message, $niceNames);
        $article_save=Article::create($request->all());
        $article = Article::with('section')->with('user')->where('id',$article_save->id)->first();

        $title = $article_save->tytul_art;

        return view("admin.articles.show", compact('article','title'));
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
        $article = Article::find($id);
        $sections = Section::all();
        $users = User::all();
        $title =$article->tytulArt;

        return view('admin.articles.edit',compact('article','sections','title','users'));
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
            'tytulArt' => 'tytuł',
            'podtytulArt' => 'pod tytuł',
            'tekstArt'=> 'treść artykułu',
            'dataWydarzeniaArt'=> 'data wydarzenia',
            'user_id' => 'autor',
            'section_id' => 'dział'

        ];
        $rules = [  //zasady walidacji
            'tytulArt' =>  'required|max:125|min:3',
            'podtytulArt' => 'required|min:5|max:125',
            'tekstArt'=> 'required|min:5',
            'user_id' => 'required',
            'dataWydarzeniaArt' => 'required|date',
            'section_id' => 'required' ,
        ];
        $message =[ //wiadomości wyswietlane
            'required' => 'Pole :attribute jest wymagane.',
            'min' => 'Pole :attribute  musi mieć minimum :min znaków.',
            'date_format' => 'Pole :attribute musi być poprawną data: RRRR-MM-DD.',
        ];
        $this->validate($request, $rules, $message, $niceNames);

        $art = Article::find($id);
        $art->update($request->all());
        $article = Article::with('section')->with('user')->where('id',$art->id)->first();
        $title = $request->tytulArt;
        return view('admin.articles.show',compact('article','title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::find($id);
        $art = $article->delete();

        return response()->json($art);
    }

    public function dane($id)
    {
       $article = Article::select('id','tytulArt')->find($id);

        return response()->json($article);
    }
}
