<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Novelty;
use App\Article;
use App\Gallery;
use App\CommentGallery;
use App\Questbook;
use File;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $novelties = Novelty::with('user')->orderBy('id', 'desc')->limit(10)->get();
        $articles = Article::with('user')->inRandomOrder()->limit(5)->get();
        $galleries = Gallery::with('user')->inRandomOrder()->limit(5)->get();
        $title = "Home";

        return view('site.index', compact('novelties', 'title', 'articles', 'galleries'));
    }

    public function wallpers()
    {
        $pliki = File::allFiles(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'wallpers' . DIRECTORY_SEPARATOR . 'male'));
        foreach ($pliki as $plik) {
            $obrazki[] = substr($plik, strrpos($plik, DIRECTORY_SEPARATOR, -1) + 1);
        }
        $articles = Article::with('user')->inRandomOrder()->limit(5)->get();
        $galleries = Gallery::with('user')->inRandomOrder()->limit(5)->get();
        $title = 'Tapety';

        return view('site.wallpers', compact('obrazki', 'title','articles','galleries'));
    }

    public function articles()
    {
        $novelties = Novelty::with('user')->orderBy('id', 'desc')->limit(5)->get();
        $articles = Article::with('user')->orderBy('dataWydarzeniaArt')->get();
        $galleries = Gallery::with('user')->inRandomOrder()->limit(5)->get();
        $title = "Artykuły";

        return view('site.articles', compact('novelties', 'title', 'articles', 'galleries'));
    }

    public function article($id)
    {
        $novelties = Novelty::with('user')->orderBy('id', 'desc')->limit(5)->get();
        $article = Article::findOrFail($id);
        $galleries = Gallery::with('user')->inRandomOrder()->limit(5)->get();
        $title = "Artykuły";

        return view('site.article', compact('novelties', 'title', 'article', 'galleries'));
    }

    public function galleries()
    {
        $novelties = Novelty::with('user')->orderBy('id', 'desc')->limit(5)->get();
        $articles = Article::with('user')->inRandomOrder()->limit(5)->get();
        $galleries = Gallery::with('user')->orderBy('rokPowstaniaGaleria')->paginate(15);
        $title = "Encyklopedia";

        return view('site.galleries', compact('novelties', 'title', 'articles', 'galleries'));
    }

    public function galleriesOne($id)
    {
        $novelties = Novelty::with('user')->orderBy('id', 'desc')->limit(5)->get();
        $articles = Article::with('user')->inRandomOrder()->limit(5)->get();
        $gallery = Gallery::with('user')->findOrFail($id);
        $galleryNext = Gallery::select('id')->orderBy('id')->where('id','>',$id)->first();
        $galleryPrev = Gallery::select('id')->orderBy('id','desc')->where('id','<',$id)->first();
        $comments = CommentGallery::where('galleries_id',$id)->orderBy('dataKom','desc')->get();
        $title = "Encyklopedia - " .$gallery->nazwaGaleria;

        return view('site.gallery', compact
        ('novelties', 'title', 'articles', 'gallery','comments','galleryNext','galleryPrev'));
    }
    public function search(Request $request)
    {
        $query = $request->input('search');


        $novelties = Novelty::with('user')->orderBy('id', 'desc')->limit(5)->get();
        $articles = Article::with('user')->inRandomOrder()->limit(5)->get();
        $galleries = Gallery::with('user')->where('nazwaGaleria', 'LIKE', '%' . $query . '%')->orWhere('aliasGaleria', 'LIKE', '%' . $query . '%')->orderBy('rokPowstaniaGaleria')->paginate(15);
        $articlesS = Article::with('user')->where('tekstArt', 'LIKE', '%' . $query . '%')->get();
        $title = $query;

        return view('site.galleries', compact('novelties', 'title', 'articles', 'galleries','articlesS'));
    }

    public function book()
    {
        $books = Questbook::orderBy('id', 'desc')->paginate(40);
        $articles = Article::with('user')->inRandomOrder()->limit(5)->get();
        $galleries = Gallery::with('user')->inRandomOrder()->limit(5)->get();
        $title = "Księga gości";

        return view('site.book', compact('books', 'title', 'articles', 'galleries'));
    }

    public function bookAdd(Request $req)
    {
        $niceNames = [  //nazwy dla pól formularza
            'mailKsiega' => 'Email',
            'imieKsiega' => 'Imię',
            'dataKsiega' => 'Data',
            'wwwKsiega' => 'Strona web',
            'trescKsiega' => 'Treść wpisu',
        ];
        $rules = [  //zasady walidacji
            'mailKsiega' => 'nullable|email',
            'imieKsiega' => 'required|min:3',
            'wwwKsiega' => 'nullable|url',
            'trescKsiega' => 'required|string|min:3',
        ];
        $message = [ //wiadomości wyswietlane
            'required' => 'Pole :attribute jest wymagane.',
            'min' => 'Pole :attribute  musi mieć minimum :min znaków.',
        ];
        $this->validate($req, $rules, $message, $niceNames);
        $book = Questbook::create($req->all());
        $book->aprobataKsiega = 1;
        $book->save();

        return response()->json($book);
    }
}
