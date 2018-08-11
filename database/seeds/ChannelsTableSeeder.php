<?php

use Illuminate\Database\Seeder;
use App\Channel;
class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Laravel' , 'slug' => str_slug('Laravel') ];
        $channel2 = ['title' => 'Wordpress' , 'slug' => str_slug('Wordpress') ];
        $channel3 = ['title' => 'Java' , 'slug' => str_slug('Java') ];
        $channel4 = ['title' => 'Vue JS' , 'slug' => str_slug('Vue JS') ];
        $channel5 = ['title' => 'Angular JS' , 'slug' => str_slug('Angular JS') ];
        $channel6 = ['title' => 'MongoDB' , 'slug' => str_slug('MongoDB') ];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
    }
}
