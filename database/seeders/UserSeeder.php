<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Josias Bueno',
            'email' => 'josias.jpb@gmail.com',
            'type' => 'ADMIN',
            'password' => bcrypt('JPB@2019'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ])->roles()->attach(1);
        // User::create([
        //     'name' => 'Ivone Neves',
        //     'email' => 'ivone@email.com',
        //     'type' => 'ADMIN',
        //     'password' => bcrypt('123456'),
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10),
        // ])->roles()->attach(2);
        User::create([
            'name' => 'Laércio Santos',
            'email' => 'laercioluiz1208@gmail.com',
            'type' => 'ADMIN',
            'password' => bcrypt('Laercio@123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ])->roles()->attach(2);

        //\App\Models\User::factory(50)->create();
    }
}
