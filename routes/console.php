<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Statamic\Facades\Entry;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('fake-posts', function () {
    $fake = \Faker\Factory::create();

    foreach (range(1, 250) as $i) {
        $randomLocation = Entry::whereCollection('locations')->random();

        Entry::make()
            ->collection('posts')
            ->slug($fake->slug)
            ->data([
                'location' => $randomLocation->id(),
                'title' => $fake->sentence,
                'content' => $fake->paragraphs(3, true),
            ])
            ->save();
    }
});
