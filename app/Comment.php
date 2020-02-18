<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Relacion con modelo de usuarios.
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsTo("App\User", 'id');
    }

    /**
     * Relacion con modelo de articulos.
     *
     * @return void
     */
    public function articles()
    {
        return $this->belongsTo("App\Articles", 'id');
    }
}
