<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tweets\TweetStoreRequest;
use App\Tweets\TweetType;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('store');
    }

    public function store(TweetStoreRequest $request)
    {
        $newTweet = array_merge($request->only('body'), [
            'type' => TweetType::TWEET,
        ]);

        $tweet = $request
            ->user()
            ->tweets()
            ->create($newTweet);

        TweetCreated::broadcast($tweet);
    }
}
