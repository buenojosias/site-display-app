<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Driver,Company,RegistrationCode};

class RegistrationCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drivers = Driver::inRandomOrder()->where('user_id', null)->limit(3)->get();
        foreach($drivers as $driver) {
            RegistrationCode::factory(1)->create(['type' => 'DRIVER','document' => $driver->cpf]);
        }

        $companies = Company::inRandomOrder()->where('user_id', null)->limit(3)->get();
        foreach($companies as $company) {
            RegistrationCode::factory(1)->create(['type' => 'COMPANY','document' => $company->cnpj]);
        }
    }
}
