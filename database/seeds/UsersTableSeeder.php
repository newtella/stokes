<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        User::create([
            'name' => "Newtella",
            'email' => "newtella@stokes.com",
            //'email_verified_at' => now(),
            'password' => bcrypt('password'), // secret
            //'remember_token' => Str::random(10),
            'dpi' => '1234567890',
            'address' => "",
            'phone' => "",
            'role' => "admin"
        ]);
        factory(User::class, 50)->create();
    }

}
