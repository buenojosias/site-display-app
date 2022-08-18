<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = \App\Models\Company::all();
        foreach($companies as $company) {
            $company->balance()->create();
        }

        $driver = \App\Models\Driver::all();
        foreach($driver as $driver) {
            $driver->balance()->create();
        }
    }
}
