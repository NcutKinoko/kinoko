<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityRecord extends Model
{
    protected $table='activity_record';

    protected $fillable=['id','subtitle_id','name','img'];
}
