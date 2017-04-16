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

        return view('admin.commentgalleries.index', compact('comments', 'title'));
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
        //
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
