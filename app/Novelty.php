<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novelty extends Model
{
    protected $fillable = ['user_id', 'tytulNews', 'podtytulNews', 'tekstNews', 'dataNews', 'aprobataNews'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
