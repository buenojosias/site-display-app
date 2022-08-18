<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Company::factory(8)
        ->hasBalance()
        ->hasAddress()
        ->hasLinks()
        ->create();

        $users = User::where('type','COMPANY')->get();
        foreach($users as $user) {
            \App\Models\Company::factory(rand(1,2))
            ->hasBalance()
            ->hasAddress()
            ->hasLinks()
            ->create(['user_id' => $user->id]);
        }
    }
}
