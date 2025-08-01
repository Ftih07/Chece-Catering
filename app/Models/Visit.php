<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'url',
        'referrer',
        'path',
    ];
}
