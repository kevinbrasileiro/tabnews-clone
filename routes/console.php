<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Schedule::call(function () {
//     DB::table('post_interactions')->chunk(200, function (Collection $posts) {
//         foreach ($posts as $post) {
//             if ($post->created_at->addDays(7) > Carbon::now()) {
//                 $post->update([
//                     'relevance' => $post->calculatePostRelevance(),
//                 ]);
//             };
//         }
//     });
// })->everyMinute();
