<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchModel extends Model
{
    public $table = 'search_models';

    protected $fillable = ['id', 'country', 'name', 'lat', 'lng'];

    use HasFactory;
}
