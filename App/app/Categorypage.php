<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorypage extends Model
{
    protected $fillable = [
        'type_category',
        'language',
        'language_translation',
        'price',
        'complexity',
        'date_start',
        'date_finish',
        'category_pages',
        'ad',
        'img',
        'link'
    ];

    public function category()
    {
        return $this->hasMany(Category::class,  'id', 'category');
    }
    public function language_translation()
    {
        return $this->hasMany(Language::class,  'id', 'language_translation');
    }
    public function language()
    {
        return $this->hasMany(Language::class,  'id', 'language');
    }

    public function user()
    {
        return $this->hasMany(User::class,  'id', 'user');
    }


}
