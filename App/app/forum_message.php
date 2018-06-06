<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum_message extends Model
{  protected $fillable = [

    'subject',
    'message'
];

    public function sublect()
    {
        return $this->hasMany(subject::class,  'id', 'subject');
    }
    public function photo_for_forum()
    {
        return $this->hasMany(Photo_for_forum_message::class,  'id', 'message');
    }

    public function user()
    {
        return $this->hasMany(User::class,  'id', 'user');
    }
}
