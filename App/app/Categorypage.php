<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  Carbon\Carbon;
class Categorypage extends Model
{

    public $timestamps = true;
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
    public function file()
    {
        return $this->hasMany(File::class,  'id', 'app');
    }

}
