<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::view('/participants', 'participants')->name('participant');

Route::view('/products', 'products')->name('product');

Route::view('/programs', 'programs')->name('program');

Route::view('/events', 'events')->name('event');
Route::view('/events/journey', 'events')->name('event.journey');

Route::view('/news', 'news')->name('new');
Route::view('/news/{slug}', 'news_show')->name('new.show');

Route::view('/about', 'about')->name('about');

Route::view('/contact-us', 'contact')->name('contact');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
