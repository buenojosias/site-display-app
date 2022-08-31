<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Finanças','Futebol','Mundo','Entretenimento'];
        foreach($categories as $category) {
            \App\Models\NewsCategory::create(['title' => $category]);
        }
    }
}
