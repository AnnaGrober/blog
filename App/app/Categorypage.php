<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorypage extends Model
{
    public function categories()
    {
        return $this->hasMany(Category::class,  'id', 'category');
    }
}
