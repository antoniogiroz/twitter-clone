<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        factory(User::class)->create([
            'name' => 'Antonio Gil',
            'username' => 'algil',
            'email' => 'antonioluisgil@gmail.com'
        ]);

        factory(User::class)->create([
            'name' => 'Sergio Gober',
            'username' => 'sergio',
            'email' => 'sergio.gonzalez.bernal@gmail.com'
        ]);

        factory(User::class)->create([
            'name' => 'Alicia',
            'username' => 'alicia',
            'email' => 'alicia@gmail.com'
        ]);
    }
}
