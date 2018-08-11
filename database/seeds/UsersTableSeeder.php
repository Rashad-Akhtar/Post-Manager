<?php

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
        App\User::create([
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@rash.com',
            'admin' => 1,
            'avatar' => asset('avatars/graduate.png')
        ]);

        App\User::create([
            'name' => 'Rashad',
            'password' => bcrypt('password'),
            'email' => 'rash@gmail.com',
            'avatar' => asset('avatars/graduate.png')
        ]);
    }
}
