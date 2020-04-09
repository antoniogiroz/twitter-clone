<?php

use App\Tweet;
use App\Tweets\TweetType;
use Illuminate\Database\Seeder;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $originalTweet = factory(Tweet::class)->create(['user_id' => 1]);

        // User with id 2 retweet a tweet of the user with id 1
        factory(Tweet::class)->create([
            'user_id' => 2,
            'original_tweet_id' => $originalTweet->id,
            'body' => null,
            'type' => TweetType::RETWEET,
        ]);

        // User with id 3 quote a tweet of the user with id 1
        factory(Tweet::class)->create([
            'user_id' => 3,
            'original_tweet_id' => $originalTweet->id,
            'body' => 'This is awesome',
            'type' => TweetType::QUOTE,
        ]);

        factory(Tweet::class, 15)->create(['user_id' => 2]);
        factory(Tweet::class, 5)->create(['user_id' => 3]);
    }
}
