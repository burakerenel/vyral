<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tweet_id',
        'tweet_data',
        'status',
    ];

    protected $hidden = [
        'user_id',
        'updated_at',
    ];
}
