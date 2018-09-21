<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kinoko extends Model
{
    protected $table='kinoko_standard';

    protected $fillable=['id','item','distribution','TestMethod'];
}
