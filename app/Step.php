<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $table='step';

    protected $fillable=['id','menu_id','step'];
}
