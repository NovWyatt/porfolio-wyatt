<?php

use App\Http\Controllers\Admin\AboutMeController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\WorkController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('portfolio');
})->name('portfolio.index');

Auth::routes([
    'register' => false,
    'reset'    => false,
    'verify'   => false,
    'confirm'  => false,
]);

// Admin routes - require authentication
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // About Me
    Route::get('/about-me', [AboutMeController::class, 'index'])->name('about-me.index');
    Route::get('/about-me/edit', [AboutMeController::class, 'edit'])->name('about-me.edit');
    Route::put('/about-me', [AboutMeController::class, 'update'])->name('about-me.update');

    // Works
    Route::resource('works', WorkController::class);

    // Socials
    Route::resource('socials', SocialController::class);

    // Contacts
    Route::resource('contacts', ContactController::class);

    // Footer
    Route::get('/footer', [FooterController::class, 'index'])->name('footer.index');
    Route::get('/footer/edit', [FooterController::class, 'edit'])->name('footer.edit');
    Route::put('/footer', [FooterController::class, 'update'])->name('footer.update');
});
