<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $guarded=[];

    /**
     * Get all of the articles that are liked.
     */
    public function articles()
    {
        return $this->belongsTo('App\Article', 'id');
    }

    
    /**
     * Get all of the users that liked a article.
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
