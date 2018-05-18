<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    protected $fillable = [
        'subject_name'
    ];
    public function forum()
    {
        return $this->belongsTo(forum ::class);
    }
}
