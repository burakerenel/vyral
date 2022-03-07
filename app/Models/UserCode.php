<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCode extends Model
{
    use HasFactory;

    const TYPE_MAIL = 'email';
    const TYPE_PHONE = 'phone';

    protected $fillable = [
        'type',
        'user_id',
        'code',
    ];


}
