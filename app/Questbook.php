<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questbook extends Model
{
    protected $fillable = ['imieKsiega','dataKsiega','mailKsiega','wwwKsiega','trescKsiega','aprobataKsiega'];
}
