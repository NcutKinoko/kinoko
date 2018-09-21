<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingDescription extends Model
{
    protected $table='ratingdescription';

    protected $fillable=['id','KinokoStandard_id','content'];
}
