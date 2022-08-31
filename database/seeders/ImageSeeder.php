<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            'https://cdn.pixabay.com/photo/2022/07/04/12/33/stork-7301068_960_720.jpg',
            'https://cdn.pixabay.com/photo/2022/08/24/17/11/windmill-7408365_960_720.jpg',
            'https://cdn.pixabay.com/photo/2015/09/22/01/30/lights-951000_960_720.jpg',
            'https://cdn.pixabay.com/photo/2022/08/28/18/03/dog-7417233_960_720.jpg',
            'https://cdn.pixabay.com/photo/2021/11/04/05/33/dome-6767422_960_720.jpg',
            'https://cdn.pixabay.com/photo/2022/06/29/17/47/coffee-7292250_960_720.jpg',
            'https://cdn.pixabay.com/photo/2022/07/10/01/38/keyboard-7312016_960_720.jpg',
            'https://cdn.pixabay.com/photo/2022/07/06/12/04/candles-7304948_960_720.jpg',
            'https://cdn.pixabay.com/photo/2021/09/06/16/45/nature-6602056_960_720.jpg',
            'https://cdn.pixabay.com/photo/2022/08/21/02/26/road-7400333_960_720.jpg',
            'https://cdn.pixabay.com/photo/2022/08/20/08/41/thunderstorm-7398529_960_720.jpg',
            'https://cdn.pixabay.com/photo/2022/08/07/00/16/dogs-7369533_960_720.jpg',
            'https://cdn.pixabay.com/photo/2022/08/24/07/00/park-7407081_960_720.jpg',
            'https://cdn.pixabay.com/photo/2022/08/01/21/38/boats-7359055_960_720.jpg',
            'https://cdn.pixabay.com/photo/2022/08/28/18/03/dog-7417233_960_720.jpg',
            'https://cdn.pixabay.com/photo/2021/09/30/17/54/port-6670684_960_720.jpg',
            'https://cdn.pixabay.com/photo/2019/08/28/09/04/cat-4436154_960_720.jpg',
            'https://cdn.pixabay.com/photo/2022/08/25/14/09/church-7410428_960_720.jpg',
            'https://cdn.pixabay.com/photo/2022/08/17/02/23/edison-bulb-7391388_960_720.jpg',
        ];
        
        $news = \App\Models\News::get();
        foreach($news as $n) {
            $n->thumbnail()->create([
                'path' => $images[array_rand($images)]
            ]);
        }
    }
}
