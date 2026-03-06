<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InactiveUserLog extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'sent_at',
        'status',
        'message'
    ];
}