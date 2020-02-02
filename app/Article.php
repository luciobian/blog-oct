<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];


    protected $with = ['images'];

    /**
     * Relación con modelo Image
     *
     * @return object
     */    
    public function images(){
        return $this->hasOne("App\Image", "id");
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
}
