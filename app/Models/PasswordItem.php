<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordItem extends Model
{
    protected $fillable = [
        'user_id',
        'account_name',
        'login_id',
        'password',
        'memo',
        'category',
        'login_url',
    ];
}
