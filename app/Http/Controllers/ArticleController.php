<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * ArticleController
 * 
 * 
 * @author Lucio <lucio@lucio.com>
 * 
 */
class ArticleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('updated_at', 'desc')->simplePaginate(15);

        return view('articles.article', ['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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

        // Store de a imagen en el controlador ImageController
        $image = app("App\Http\Controllers\ImageController")->store($request);

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
    public function edit(Article $article)
    {
        return view("articles.edit", ['article'=>$article]);
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
        $article->title = $request->get('title');
        $article->body = $request->get('body');

        $this->authorize("update", $article);
        if($article->isDirty() || $article->images){
            $article->update([
                "title"=>$request->get('title'),
                "body"=>$request->get('body')
            ]);
                app("App\Http\Controllers\ImageController")->update($request, $article);
        }else{
            return "no se modifico";
        }

        return redirect("/articles/{$article->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        $this->authorize('delete', $article);
            
        $article->delete();

        return redirect('home');
    }
}
