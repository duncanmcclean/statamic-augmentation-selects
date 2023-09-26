<?php

use Illuminate\Support\Facades\Route;
use Statamic\Facades\Entry;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);

Route::get('/glasgow-posts', function () {
    dd(
        Entry::query()
            ->where('collection', 'posts')
            ->where('location', '459f2c54-a51e-4d03-8c5a-b27cbb0be954')
            ->get()
            ->map->toAugmentedArray([
                'title',
                'location:title',
            ])
            ->map(fn ($entry) => collect($entry)->map->value()->toArray())
            ->all()
    );
});
