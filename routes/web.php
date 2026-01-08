<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/portfolio', \App\Livewire\Portfolio::class)->name('portfolio');
Route::get('/services', \App\Livewire\Services::class)->name('services');
Route::get('/about', \App\Livewire\About::class)->name('about');
Route::get('/careers', \App\Livewire\Careers::class)->name('careers');
Route::get('/contact', \App\Livewire\Contact::class)->name('contact');
Route::get('/brochure', \App\Livewire\Brochure::class)->name('brochure');
