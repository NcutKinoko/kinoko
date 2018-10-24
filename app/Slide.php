<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table='slide';

    protected $fillable=['id','img'];
}
