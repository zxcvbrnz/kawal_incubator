<?php

use App\Http\Controllers\captchaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::view('/participants', 'participants')->name('participant');
Route::view('/participants/join-participant', 'participant_form')->name('participant.form');

Route::view('/products', 'products')->name('product');

Route::view('/programs', 'programs')->name('program');

Route::view('/events', 'events')->name('event');
Route::view('/events/journey', 'events')->name('event.journey');
Route::view('/events/journey/{slug}', 'journey_show')->name('event.journey.show');

Route::view('/news', 'news')->name('new');
Route::view('/news/{slug}', 'news_show')->name('new.show');

Route::view('/about', 'about')->name('about');

Route::view('/toko', 'toko')->name('toko');

Route::view('/contact-us', 'contact')->name('contact');

Route::middleware(['auth'])->group(function () {

    // Dashboard (khusus verified)
    Route::view('dashboard', 'dashboard')
        ->middleware(['verified'])
        ->name('dashboard');

    Route::view('/dashboard/participant/{id}', 'admin.participant_detail')->name('admin.participant.detail');
    // Profile
    Route::view('profile', 'profile')->name('profile');
});

require __DIR__ . '/auth.php';