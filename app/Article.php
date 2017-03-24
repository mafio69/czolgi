<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id', 'section_id', 'tytulArt', 'podTytulArt','tekstArt','dataArt', 'dataWydarzeniaArt','aprobataArt'
    ];

    public function user()
    {
       return $this->belongsTo('App\User');
    }
    public function section()
    {
       return $this->belongsTo('App\Section');
    }
}
