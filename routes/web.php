<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Member\BlogController;

// Static Pages Routes
Route::get('/', function () {
    return view('components.front.home-page');
})->name('home');

Route::get('/about', function () {
    return view('components.front.about-page');
})->name('about');

Route::get('/post', function () {
    return view('components.front.post-page');
})->name('post');

Route::get('/contact', function () {
    return view('components.front.contact-page');
})->name('contact');

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Blog Routes
    Route::get('/member/blogs', [BlogController::class, 'index']);
    Route::get('/member/blogs/{post}/edit', [BlogController::class, 'edit']);
    Route::resource('members/blogs', BlogController::class)->names([
        'index' => 'member.blogs.index',
        'edit' => 'member.blogs.edit',
    ]);
});

require __DIR__.'/auth.php';
