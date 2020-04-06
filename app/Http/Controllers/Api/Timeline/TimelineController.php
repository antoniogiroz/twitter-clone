<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use App\Http\Resources\TweetResource;

class TimelineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $tweets = request()
            ->user()
            ->tweetsFromFollowing()
            ->latest()
            ->paginate();

        return TweetResource::collection($tweets);
    }
}
