<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitorRegistry extends Model
{
    protected $table = 'visitor_registry';

    protected $fillable = ['clicks'];
    public function articles()
    {
        return $this->belongsTo('App\Article');
    }
}
