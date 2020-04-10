<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar()
    {
        return "https://www.gravatar.com/avatar/" . md5($this->email) . "?d=mp";
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'following_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'user_id');
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function hasLiked($tweet)
    {
        return $this->tweets->contains('tweet_id', $tweet->id);
    }

    /**
     *
     */
    public function tweetsFromFollowing()
    {
        /**
         * EXPLANATION:
         * I want to access to the tweets that users I'm following THROUGH Users table
         * 1. Tweet: The model I want to access. Table tweets
         * 2. User: The intermediate model related to Tweets. Table followers, but really is a User
         * 3. user_id: The foreign key that related the Followers table with the Users table. followers.user_id (me)
         * 4. user_id. The foreign key on the final model. tweets.user_id
         * 5. id: The local key of this model. users.id
         * 6. following_id: The local key on the intermediate model. followers.following_id.
         *
         * Why 'following_id' in the sixth argument? Because I want to the tweets of
         * users I'm following, not mine (In this case we don't need hasManyThrough relationship).
         *
         *
         */
        return $this->hasManyThrough(Tweet::class, Follower::class, 'user_id', 'user_id', 'id', 'following_id');
    }
}
