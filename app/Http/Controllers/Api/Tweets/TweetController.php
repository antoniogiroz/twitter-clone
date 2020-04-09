<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tweets\TweetStoreRequest;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('store');
    }

    public function store(TweetStoreRequest $request)
    {
        $tweet = auth()->user()->tweets()->create($request->all());

        TweetCreated::broadcast($tweet);
    }
}
