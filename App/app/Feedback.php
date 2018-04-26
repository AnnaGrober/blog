<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'application',
        'user'
    ];
    public function category()
    {
        return $this->hasMany(Categorypage::class,  'id', 'application');
    }
    public function language_translation()
    {
        return $this->hasMany(User::class,  'id', 'user');
    }
}
