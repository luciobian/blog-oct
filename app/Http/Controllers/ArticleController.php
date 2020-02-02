<?php

namespace App\Http\Controllers;

use App\Image;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
/**
 * ArticleController
 * 
 * 
 * @author Lucio <lucio@lucio.com>
 * 
 */
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('updated_at')->simplePaginate(15);;

        return view('articles.article', ['articles'=>$articles]);
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
        $request->validate([
            'title' => 'required|unique:articles|max:255',
            'image' => 'required',
            'body' => 'required',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        $image  = Image::create([
            "path"=>time().'.'.request()->image->getClientOriginalExtension(),
            "alternative"=>$request->get('title'),
        ]);

        request()->image->move(public_path('images'), $imageName);

        $article = Article::create([
            "title" => $request->get('title'),
            "body" => $request->get('body'),
            "image_id" => $image->id,
            "user_id"=> Auth::user()->id,
        ]);


        return redirect("/articles/{$article->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article'=>$article]);
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
        //
    }
}
