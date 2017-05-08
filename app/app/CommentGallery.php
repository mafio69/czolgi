<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentGallery extends Model
{
    protected $fillable = ['overriding_id','galleries_id','dataKom','infoKom','tytulKom','tekstKom','autorKom','mailKom','webKom','aprobataKom'];
    public function Gallery()
    {
       return $this->belongsTo('App\Gallery');
    }

    public function commentOverriding()
    {
        return $this->belongsTo('\App\CommentGallery',  'overriding_id');
    }
}
