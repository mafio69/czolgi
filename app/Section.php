<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    protected $fillable = ['overriding_id','nazwa','opis'];
    public $timestamps = false;
    public function overriding()
    {
       return  $this->belongsTo('App\section','overriding_id','id');
    }
}
