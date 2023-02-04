<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'web',
        'name',
        'password',
    ];

    protected $casts = [
        'web' => 'boolean',
        'user_id' => 'integer',
    ];
}
