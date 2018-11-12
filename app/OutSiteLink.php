<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutSiteLink extends Model
{
    protected $table='outsitelink';

    protected $fillable=['id','Facebook','Youtube'];
}
