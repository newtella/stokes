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
            'password' => bcrypt('password'), // secret
            'role' => "admin"
        ]);

        User::create([
            'name' => "Henry Diaz",
            'email' => "hdiaz@stokes.com",
            'password' => bcrypt('password'), // secret
            'role' => "doctor"
        ]);

        User::create([
            'name' => "Dorian Oliveros",
            'email' => "doliveros@stokes.com",
            'password' => bcrypt('password'), // secret
            'role' => "patient"
        ]);

        factory(User::class, 50)->states('patient')->create();
    }

}
