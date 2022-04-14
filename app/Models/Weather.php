<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
     public $table = 'weather';

    protected $fillable = [
        'id',
        'city_name',
        'dt_txt',
        'temp',
        'description',
        'speed',
        'humidity',
        'list_pop',
        'weather_icon',
        'created_at'
    ];

    use HasFactory;
}
