<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table='announcement';

    protected $fillable=['id','announcement_category_id','title','content','img'];
}
