<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $displays = \App\Models\Display::inRandomOrder()->limit(150)->get();
        foreach($displays as $display) {
            \App\Models\LinkAccess::create([
                'display_id' => $display->id
            ]);
        }
    }
}
