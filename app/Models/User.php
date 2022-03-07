<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $codeType;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phone',
        'twitter_username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];


    public static function createCode(){
//        return random_int(100000, 999999);
        return 999999;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getUserCode(){
        return $this->hasOne(UserCode::class)->where('type',$this->codeType)->orderBy('id','desc');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getTweets(){
        return $this->hasMany(UserTweet::class)->orderBy('created_at','desc');
    }

}
