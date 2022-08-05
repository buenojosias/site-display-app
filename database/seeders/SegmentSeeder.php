<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Segment;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Segment::create(['segment_category_id' => 1, 'title' => 'Escola particular']);
        Segment::create(['segment_category_id' => 1, 'title' => 'Centro de Educação Infantil']);
        Segment::create(['segment_category_id' => 2, 'title' => 'Supermercados']);
        Segment::create(['segment_category_id' => 2, 'title' => 'Loja de Calçados']);
        Segment::create(['segment_category_id' => 3, 'title' => 'Manutenção de Computador']);
        Segment::create(['segment_category_id' => 3, 'title' => 'Auto Center']);
        Segment::create(['segment_category_id' => 4, 'title' => 'Restaurante']);
        Segment::create(['segment_category_id' => 4, 'title' => 'Panificadora']);
    }
}
