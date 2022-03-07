<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TwitterController extends Controller
{
    public function getMockTweets(){
        return json_decode(Http::get('https://6223d1cf3af069a0f9aa4ad8.mockapi.io/api/twitter/user'));
    }
}
