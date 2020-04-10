<?php

namespace App;

use App\Events\Tweets\TweetLikeUpdated;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['body', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function originalTweet()
    {
        return $this->hasOne(Tweet::class, 'id', 'original_tweet_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like()
    {
        $this->likes()->firstOrCreate([
            'user_id' => auth()->id()
        ]);
    }

    public function unlike()
    {
        $this->likes()->where([
            'user_id' => auth()->id()
        ])->delete();
    }

    public function isLiked()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    public function likesCount()
    {
        return $this->likes->count();
    }
}
