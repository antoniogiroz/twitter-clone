<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use App\Http\Resources\TweetResource;

class TimelineController extends Controller
{
    public function index()
    {
        $tweets = request()
            ->user()
            ->tweetsFromFollowing()
            ->paginate();

        return TweetResource::collection($tweets);
    }
}
