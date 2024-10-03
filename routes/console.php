<?php

use App\Models\Post;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Schedule::call(function () {
//     Post::chunk(200, function (Collection $posts) {
//         foreach ($posts as $post) {
//             $post->update([
//                 'relevance' => $post->calculatePostRelevance(),
//             ]);
//         }
//     });
// })->everyMinute();
