<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetLikeUpdated;
use App\Http\Controllers\Controller;
use App\Tweet;

class TweetLikeController extends Controller
{
    public function store(Tweet $tweet)
    {
        $tweet->like();

        TweetLikeUpdated::broadcast(request()->user(), $tweet);
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->unlike();

        TweetLikeUpdated::broadcast(request()->user(), $tweet);
    }
}
