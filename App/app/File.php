<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'file'
    ];
    public function forums()
    {
        return $this->belongsTo(Advent::class);
    }
}
