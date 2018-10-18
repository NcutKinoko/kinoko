<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnouncementCategory extends Model
{
    protected $table='announcementcategory';

    protected $fillable=['id','name'];
}
