<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $table='farmer';

    protected $fillable=['id','name','age','phone','area','class','PlantingArea','PlantingQuantity','PlantingYear','result','img'];
}
