<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisplaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advertisings = \App\Models\Advertising::where('active', true)->get();
        foreach($advertisings as $advertising) {
            \App\Models\Display::factory(rand(50,100))->create([
                'advertising_id' => $advertising->id,
                'cost' => $advertising->cpd,
            ]);
        }
    }
}
