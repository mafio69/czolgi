<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    protected $fillable = [
        'user_id', 'typGaleria', 'aliasGaleria', 'nazwaGaleria', 'krajGaleria', 'zdjeciaGaleria', 'opisGaleria', 'krTrescGaleria', 'daneGaleria', 'rokPowstaniaGaleria', 'zatwierdzGaleria', 'dataUtworzeniaGaleria', 'poprawinoGaleria'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function typeTank()
    {
        return $this->belongsTo('App\TypeTank');
    }

}
