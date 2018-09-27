<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';

    protected $fillable=['id','category_id','name','price','size','img','inventory','introduction'];
}
