<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ManagementBookingController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [LandingPageController::class, 'index'])->name('landing-page.index');
Route::get('/public/destinations', [LandingPageController::class, 'destinations'])->name('landing-page.destinations');
Route::get('/public/destinations/{destination}', [LandingPageController::class, 'showDestination'])->name('landing-page.destinations.show');
Route::get('/about', function () {
    return view('landing-page.about.index');
})->name('about');
Route::get('/contact', function () {
    return view('landing-page.contact.index');
})->name('contact');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'postRegister']);
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // User booking routes
    Route::get('/booking/history', [BookingController::class, 'history'])->name('booking.history');
    Route::get('/bookings/create/{destination}', [BookingController::class, 'create'])->name('bookings.create');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::delete('/booking/{booking}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');

    // Admin routes
    Route::middleware('admin')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        
        // Profile routes
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Location routes
        Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
        Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
        Route::get('/locations/edit/{locationId}', [LocationController::class, 'edit'])->name('locations.edit');
        Route::post('/locations/update/{locationId}', [LocationController::class, 'update'])->name('locations.update');
        Route::post('/locations/delete/{locationId}', [LocationController::class, 'destroy'])->name('locations.destroy');

        // Destination routes
        Route::resource('destinations', DestinationController::class);

        // Visitor routes
        Route::resource('visitor', VisitorController::class);

        // Admin user routes
        Route::get('/user-admin', [UserAdminController::class, 'index'])->name('user-admin.index');
        Route::post('/user-admin', [UserAdminController::class, 'store'])->name('user-admin.store');
        Route::get('/user-admin/edit/{user}', [UserAdminController::class, 'edit'])->name('user-admin.edit');
        Route::post('/user-admin/update/{user}', [UserAdminController::class, 'update'])->name('user-admin.update');
        Route::post('/user-admin/delete/{user}', [UserAdminController::class, 'destroy'])->name('user-admin.delete');

        // Booking management routes
        Route::get('/bookings', [ManagementBookingController::class, 'index'])->name('admin.bookings.index');
        Route::post('/bookings/confirm', [ManagementBookingController::class, 'confirm'])->name('admin.bookings.confirm');
    });

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Message management routes
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages/{message}/mark-as-read', [MessageController::class, 'markAsRead'])->name('messages.markAsRead');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});
