<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // RoleSeeder::class,
            // UserSeeder::class,
            // SegmentCategorySeeder::class,
            // SegmentSeeder::class,
            // DriverSeeder::class,
            // CompanySeeder::class,
            // AdvertisingSeeder::class,
            // DisplaySeeder::class,
            // InformativeSeeder::class,
            // LinkAccessSeeder::class,
            // NewsSeeder::class,
            // QuizSeeder::class,
            RegistrationCodeSeeder::class,
        ]);
    }
}
