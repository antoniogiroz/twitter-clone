<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Http\Controllers\Controller;
use App\Tweet;

class TweetLikeController extends Controller
{
    public function store(Tweet $tweet)
    {
        if ($tweet->isLiked()) {
            return response(null, 409);
        }

        $tweet->like();
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->unlike();
    }
}
