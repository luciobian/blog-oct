<?php

namespace App\Http\Controllers;

use App\Article;
use App\Image;
use Illuminate\Http\Request;
/**
 * @group Imagen
 * 
 * Operaciones con imagenes de los artículos
 */
class ImageController extends Controller
{

    /**
     * @group Creación
     * Guardar imagen.
     *  
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
     * @group Edición
     * 
     * Actulización de imagen.
     * 
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
}
