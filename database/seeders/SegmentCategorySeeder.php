<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SegmentCategory;

class SegmentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SegmentCategory::create(['title' => 'Educação']);
        SegmentCategory::create(['title' => 'Comércio']);
        SegmentCategory::create(['title' => 'Prestação de serviços']);
        SegmentCategory::create(['title' => 'Alimentação']);
    }
}
