<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use LogsActivity;

    protected static $logName = 'User';

    // protected static $logOnlyDirty = true; Solo actualiza los campos que cambiaron

    protected static $logAttributes = [
        'name', 'last', 'email'
    ];

    protected $fillable = [
        'name', 'last', 'email', 'password'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
