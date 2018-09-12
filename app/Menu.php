<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table='menu';

    protected $fillable=['id','product_id','sauce','name','seasoning','material','img','remark'];
}
