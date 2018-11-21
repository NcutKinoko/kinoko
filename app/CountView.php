<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountView extends Model
{
    protected $table='countview';

    protected $fillable=['id','count'];
}
