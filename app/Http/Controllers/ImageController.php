<?php

namespace App\Http\Controllers;

use App\Article;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        $image = Image::create([
            "path"=>time().'.'.request()->image->getClientOriginalExtension(),
            "alternative"=>$request->get('title'),
        ]);

        request()->image->move(public_path('images'), $imageName);

        return $image;
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
    public function update(Request $request, Article $article)
    {
        $image = Image::whereId($article->images->id)->first();

        if($image){
            // $image->delete();
            $imageName = time().'.'.request()->image->getClientOriginalExtension();    
            $image = $image->update([
                "path"=>time().'.'.request()->image->getClientOriginalExtension(),
            ]);    
            request()->image->move(public_path('images'), $imageName);
    
        }

        $article->title = $request->get('title');

        if($article->isDirty()){
            $image->update([
                "alternative"=>$request->get('title'),
            ]);
        }

        return $image;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
