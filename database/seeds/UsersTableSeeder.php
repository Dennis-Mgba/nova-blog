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
        $user =  App\User::create([
                'name'     => 'Dennis Mgbah',
                'email'    => 'dennis@mail.me',
                'password' => bcrypt('admin'),
                'admin'    => 1,
            ]);

        App\Profile::create([
            'user_id'   => $user->id,
            'avatar'    => 'uploads/avatars/smile.png',
            'about'     => 'A person is a being that has certain capacities or attributes such as reason, morality, consciousness or self-consciousness, and being a part of a culturally established form of social relations such as kinship, ownership of property, or legal responsibility.',
            'github' => 'github.com',
            'twitter'   => 'twitter.com'
        ]);
    }
}
