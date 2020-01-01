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
            'name' => 'Dennis Mgbah',
            'email' => 'dennis@mail.me',
            'password' => bcrypt('password')
        ]);
    }
}
