<?php

use App\Tweet;
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
        factory(Tweet::class, 3)->create(['user_id' => 1]);
        factory(Tweet::class, 2)->create(['user_id' => 2]);
        factory(Tweet::class)->create(['user_id' => 3]);
    }
}
