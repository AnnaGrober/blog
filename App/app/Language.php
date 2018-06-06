<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'language'
    ];
    public function advents()
    {
        return $this->belongsTo(Advent::class);
    }

}

