<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';

    public $incrementing = false;

    protected $fillable = [
        'id', 'nama', 'email',
    ];

    protected $hidden = [
        'password',
    ];
}
