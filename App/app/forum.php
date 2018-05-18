<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum extends Model
{  protected $fillable = [

    'subject',
    'message'
];

    public function sublect()
    {
        return $this->hasMany(subject::class,  'id', 'subject');
    }

    public function user()
    {
        return $this->hasMany(User::class,  'id', 'user');
    }
}
