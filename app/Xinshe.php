<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xinshe extends Model
{
    protected $table='xinshe';

    protected $fillable=['id','title','AboutXinshe','img'];
}
