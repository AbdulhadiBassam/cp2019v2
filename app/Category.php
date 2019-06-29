<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';
    public $primaryKey = 'id';
    public $fillable = ['id', 'name','image', 'lang', 'created_at', 'updated_at'];
    public $dates = ['created_at', 'updated_at'];
}
