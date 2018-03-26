<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'id',
        'language'
    ];
    public function categorypages()
    {
        return $this->belongsTo(Categorypage::class);
    }
}
