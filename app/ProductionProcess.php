<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionProcess extends Model
{
    protected $table='ProductionProcess';

    protected $fillable=['id','img'];
}
