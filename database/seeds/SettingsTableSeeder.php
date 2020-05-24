<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => 'Nova Blog',
            'contact_email' => 'me@mail.com',
            'contact_number' => '0123456789',
            'address' => 'Lagos/ Nigeria'
        ]);
    }
}
