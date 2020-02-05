<?php

namespace App\Http\Controllers;

use App\Like;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @group ArticleController
 * 
 * 
 * @author Lucio <lucio@lucio.com>
 * 
 */
class ArticleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search']);
    }
    
    /**
     * @group Ver
     * Mostrar artículos.
     * 
     * Display a listing of the articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('updated_at', 'desc')->simplePaginate(15);

        return view('articles.article', ['articles'=>$articles]);
    }

    /**
     * @group Creación
     * Formulario de creación.
     * 
     * Show the form for creating a new article.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * @group Creación
     * Guardar artículos.
     * 
     * Store a newly created articles in storage.
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
     * @group Ver
     * Mostrar artículo.
     * 
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
     * @group Edición
     * Formulario de edición.
     * 
     * Show the form for editing the specified article.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view("articles.edit", ['article'=>$article]);
    }

    /**
     * @group Edición
     * Actulización de artículo.
     * 
     * Update the specified article in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->authorize("update", $article);
        $article->title = $request->get('title');
        $article->body = $request->get('body');

        
        if($article->isDirty() || $request->images){
            $article->update([
                "title"=>$request->get('title'),
                "body"=>$request->get('body')
            ]);
            app("App\Http\Controllers\ImageController")->update($request, $article);

            return redirect("/articles/{$article->id}");
        }

        return view("articles.edit", ["article"=>$article, "errors"=>true]);

    }

    /**
     * @group Eliminación
     * Eliminación artículo.
     * 
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

    /**
     * @group General
     * Búsqueda.
     * 
     * Filtro de artículos en base a la palabra especifica.
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request){
        $articles = Article::where('title', 'LIKE', "%$request->search%")
                        ->orWhere('body', 'LIKE', "%$request->search%")
                        ->orderBy('updated_at', 'desc')
                        ->simplePaginate(15);

        return view ("articles.article", ["articles"=>$articles]);
    }
    /**
     * @group General
     * Like.
     * 
     * Permite poner "like" al artículo especificado.
     * 
     * @param Article $article
     * @return void
     */
    public function postLike(Article $article){
        
        $like = Like::where([['articles_id',$article->id],['users_id',Auth::user()->id]])->first();

        if(!$like){
            Like::create([
                'articles_id'=>$article->id,
                'users_id'=>Auth::user()->id,
            ]);
        }else{
            $like->delete();
        }
        return redirect("/articles/{$article->id}");
    }
}
