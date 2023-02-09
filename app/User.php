<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Outhebox\Pointable\Contracts\Pointable;
use Outhebox\Pointable\Traits\Pointable as PointableTrait;


use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Pointable
{
    use Notifiable;
    use HasRoles;
    use PointableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'roles_name', 'username'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name' => 'array'
    ];


    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
