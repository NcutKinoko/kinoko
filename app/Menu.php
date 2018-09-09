<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table='menu';

    protected $fillable=['id','product_id','sauce_id','name','seasoning','material','img','remark'];
}
