<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    /**
     * Relación con el modelo Article
     *
     * @return object
     */
    public function articles(){
        return $this->belongsTo("App\Article", "image_id");
    }
}
