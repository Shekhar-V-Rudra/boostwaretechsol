<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;

// Public Routes
Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/portfolio', \App\Livewire\Portfolio::class)->name('portfolio');
Route::get('/services', \App\Livewire\Services::class)->name('services');
Route::get('/blog', \App\Livewire\Blog::class)->name('blog');
Route::get('/blog/{slug}', \App\Livewire\BlogDetail::class)->name('blog.show');
Route::get('/about', \App\Livewire\About::class)->name('about');
Route::get('/careers', \App\Livewire\Careers::class)->name('careers');
Route::get('/contact', \App\Livewire\Contact::class)->name('contact');
Route::get('/brochure', \App\Livewire\Brochure::class)->name('brochure');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Routes
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Portfolio Routes
        Route::resource('portfolios', PortfolioController::class);
        
        // Blog Routes
        Route::resource('blogs', BlogController::class);
        
        // Contact Routes
        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
        Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
        Route::patch('/contacts/{contact}/read', [ContactController::class, 'markAsRead'])->name('contacts.read');
        Route::patch('/contacts/{contact}/unread', [ContactController::class, 'markAsUnread'])->name('contacts.unread');
    });
});
