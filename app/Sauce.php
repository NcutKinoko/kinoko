<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sauce extends Model
{
    protected $table='sauce';

    protected $fillable=['id','name','material','img'];
}
