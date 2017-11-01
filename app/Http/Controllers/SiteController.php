<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Novelty;
use App\Article;
use App\Gallery;
use File;

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
}
