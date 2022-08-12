<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertisingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = \App\Models\Company::inRandomOrder()->limit(15)->get();
        foreach($companies as $company) {
            \App\Models\Advertising::factory(rand(1,3))->create(['company_id' => $company->id]);
        }
    }
}
