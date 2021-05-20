<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = [
        'city_id',
        'name', 
        'status', 
        'user_create', 
        'user_update'
    ];

    protected static $logName = 'Clients';

    protected static $logAttributes = [
        'city_id',
        'name', 
        'status', 
        'user_create', 
        'user_update'
    ];
}
