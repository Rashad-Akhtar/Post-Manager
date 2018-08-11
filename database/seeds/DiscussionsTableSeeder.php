<?php

use Illuminate\Database\Seeder;

use App\Discussion;
class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Implementing Authentication System in Laravel 5.6';
        $t2 = 'Implementing Authentication System in Wordpress 5.6';
        $t3 = 'Implementing Authentication System in Angular 5.6';
        $t4 = 'Implementing Authentication System in Vue JS 5.6';

        $d1 = [
            'title' => $t1,
            'content' => 'Nulla dapibus in ante non dignissim. Sed nulla turpis, efficitur non sapien id, fringilla auctor libero. Mauris sit amet ipsum ac arcu facilisis commodo non nec enim. Phasellus eget dolor sagittis, volutpat quam eget, porttitor orci. Suspendisse a ipsum rutrum, tincidunt justo eu, feugiat sapien. Aliquam quis luctus sem. Ut facilisis arcu ante, mattis molestie ante consequat sollicitudin. Quisque congue eleifend erat a sagittis. Vivamus bibendum odio eu ligula egestas, a condimentum erat hendrerit. ',
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($t1)
        ];
        $d2 = [
            'title' => $t2,
            'content' => 'Nulla dapibus in ante non dignissim. Sed nulla turpis, efficitur non sapien id, fringilla auctor libero. Mauris sit amet ipsum ac arcu facilisis commodo non nec enim. Phasellus eget dolor sagittis, volutpat quam eget, porttitor orci. Suspendisse a ipsum rutrum, tincidunt justo eu, feugiat sapien. Aliquam quis luctus sem. Ut facilisis arcu ante, mattis molestie ante consequat sollicitudin. Quisque congue eleifend erat a sagittis. Vivamus bibendum odio eu ligula egestas, a condimentum erat hendrerit. ',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t2)
        ];
        $d3 = [
            'title' => $t3,
            'content' => 'Nulla dapibus in ante non dignissim. Sed nulla turpis, efficitur non sapien id, fringilla auctor libero. Mauris sit amet ipsum ac arcu facilisis commodo non nec enim. Phasellus eget dolor sagittis, volutpat quam eget, porttitor orci. Suspendisse a ipsum rutrum, tincidunt justo eu, feugiat sapien. Aliquam quis luctus sem. Ut facilisis arcu ante, mattis molestie ante consequat sollicitudin. Quisque congue eleifend erat a sagittis. Vivamus bibendum odio eu ligula egestas, a condimentum erat hendrerit. ',
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($t3)
        ];
        $d4 = [
            'title' => $t4,
            'content' => 'Nulla dapibus in ante non dignissim. Sed nulla turpis, efficitur non sapien id, fringilla auctor libero. Mauris sit amet ipsum ac arcu facilisis commodo non nec enim. Phasellus eget dolor sagittis, volutpat quam eget, porttitor orci. Suspendisse a ipsum rutrum, tincidunt justo eu, feugiat sapien. Aliquam quis luctus sem. Ut facilisis arcu ante, mattis molestie ante consequat sollicitudin. Quisque congue eleifend erat a sagittis. Vivamus bibendum odio eu ligula egestas, a condimentum erat hendrerit. ',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t4)
        ];

        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);
    }
}
