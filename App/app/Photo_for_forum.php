<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo_for_forum extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'img'
    ];

    public function forums()
    {
        return $this->belongsTo(forum_message::class);
    }
}
