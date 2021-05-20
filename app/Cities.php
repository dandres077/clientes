<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $fillable = [
        'name', 
        'status', 
        'user_create', 
        'user_update'
    ];

    protected static $logName = 'Cities';

    protected static $logAttributes = [
        'name', 
        'status', 
        'user_create', 
        'user_update'
    ];
}
