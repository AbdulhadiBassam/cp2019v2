<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    public $table = 'categories';
    public $primaryKey = 'id';
    public $fillable = ['id', 'name','image', 'lang', 'created_at', 'updated_at','deleted_at'];
    public $dates = ['created_at', 'updated_at','deleted_at'];
}
