<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    protected $with = ['images', 'users', 'comments.users'];

    protected $appends  = ['likes_count'];


    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('likeCount', function($builder){
            $builder->withCount('likes');
        });
    } 

    /**
     * Relación con modelo Image
     *
     * @return object
     */    
    public function images(){
        return $this->hasOne("App\Image", "id", "image_id");
    }

    /**
     * Relación con modelo User
     *
     * @return void
     */
    public function users(){
        return $this->hasOne("App\User", "id");
    }

    /**
     * Clave para las rutas
     *
     * @return string
     */
    public function getRouteKey()
    {
        return 'id';    
    }

    /**
     * Relación con la modelo Comment.
     *
     * @return void
     */
    public function comments(){
        return $this->hasMany("App\Comment", 'article_id');
    }


    /**
     * Get all of the likes for the articles.
     */
    public function likes()
    {
        return $this->hasMany('App\Like', 'articles_id');
    }
}
