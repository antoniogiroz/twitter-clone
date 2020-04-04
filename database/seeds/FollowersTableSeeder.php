<?php

use App\Follower;
use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Follower::truncate();

        $follower = new Follower();
        $follower->user_id = 1;
        $follower->following_id = 2;
        $follower->save();

        $follower = new Follower();
        $follower->user_id = 2;
        $follower->following_id = 2;
        $follower->save();

        $follower = new Follower();
        $follower->user_id = 3;
        $follower->following_id = 1;
        $follower->save();
    }
}
