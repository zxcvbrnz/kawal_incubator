<?php

use App\Http\Controllers\captchaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::view('/participants', 'participants')->name('participant');
Route::view('/participants/join-participant', 'participant_form')->name('participant.form');

Route::view('/products', 'products')->name('product');

Route::view('/programs', 'programs')->name('program');

Route::view('/events', 'events')->name('event');
Route::view('/events/{slug}', 'journey_show')->name('event.show');
Route::view('/events/journey', 'events')->name('event.journey');
Route::view('/events/journey/{slug}', 'journey_show')->name('event.journey.show');

Route::view('/news', 'news')->name('new');
Route::view('/news/{slug}', 'news_show')->name('new.show');

Route::view('/about', 'about')->name('about');

Route::view('/toko', 'toko')->name('toko');

Route::view('/contact-us', 'contact')->name('contact');

Route::middleware(['auth'])->group(function () {

    // Dashboard (khusus verified)
    Route::view('/admin/participant', 'dashboard')
        ->middleware(['verified'])
        ->name('dashboard');

    Route::view('/admin/participant/{id}', 'admin.participant_detail')->name('admin.participant.detail');

    Route::view('/admin/product', 'admin.product')->name('admin.product');
    Route::view('/admin/product/create', 'admin.product_create')->name('admin.product.create');
    Route::view('/admin/product/{id}/edit', 'admin.product_edit')->name('admin.product.edit');

    Route::view('/admin/event', 'admin.event')->name('admin.event');
    Route::view('/admin/event/create', 'admin.event_create')->name('admin.event.create');
    Route::view('/admin/event/{id}/edit', 'admin.event_edit')->name('admin.event.edit');

    Route::view('/admin/news', 'admin.news')->name('admin.news');
    Route::view('/admin/news/create', 'admin.news_create')->name('admin.news.create');
    Route::view('/admin/news/{id}/edit', 'admin.news_edit')->name('admin.news.edit');

    Route::view('/admin/program', 'admin.program')->name('admin.program');
    Route::view('/admin/program/create', 'admin.program_create')->name('admin.program.create');
    Route::view('/admin/program/{id}/edit', 'admin.program_edit')->name('admin.program.edit');

    // Profile
    Route::view('profile', 'profile')->name('profile');
});

require __DIR__ . '/auth.php';