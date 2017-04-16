<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questbook;

class QuestbooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questbooks = Questbook::orderBy('id','desc')->paginate(50);
        $title = "Księga gości";

        return view('admin.Questbooks.index',compact('questbooks','title'));
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
        $comment = Questbook::findOrFail($id);
        $comment->delete();

        return response()->json($comment);

    }

    public function change(Request $request, $id)
    {
        $comment = Questbook::find($id);
        $comment->aprobataKsiega = $request->aprobataKsiega;
        $comment->save();



        return response()->json($comment);

    }
}
