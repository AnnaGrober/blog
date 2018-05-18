<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isAdmin(){
        return $this->grant==1;
    }
    public function isRedactor(){
        return $this->grant==2;
    }
    public function isBlock(){
        return $this->block;
    }
    public function categorypages()
    {
        return $this->belongsTo(Categorypage::class);
    }
}
