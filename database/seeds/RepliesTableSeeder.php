<?php

use Illuminate\Database\Seeder;

use App\Reply;
class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
          'user_id' => 1,
          'discussion_id' => 1,
          'content' => 'Nulla dapibus in ante non dignissim. Sed nulla turpis, efficitur non sapien id, fringilla auctor libero.   '
        ];

        $r2 = [
            'user_id' => 1,
            'discussion_id' => 2,
            'content' => 'Nulla dapibus in ante non dignissim. Sed nulla turpis, efficitur non sapien id, fringilla auctor libero.   '
        ];

        $r3 = [
            'user_id' => 2,
            'discussion_id' => 3,
            'content' => 'Nulla dapibus in ante non dignissim. Sed nulla turpis, efficitur non sapien id, fringilla auctor libero.   '
        ];

        $r4 = [
            'user_id' => 2,
            'discussion_id' => 4,
            'content' => 'Nulla dapibus in ante non dignissim. Sed nulla turpis, efficitur non sapien id, fringilla auctor libero.   '
        ];

        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
    }
}
