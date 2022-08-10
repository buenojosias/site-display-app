<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Driver::factory(6)->create();
        $users = User::where('type','DRIVER')->get();
        foreach($users as $user) {
            \App\Models\Driver::factory(1)->create(['user_id' => $user->id, 'name' => $user->name]);
        }
    }
}
