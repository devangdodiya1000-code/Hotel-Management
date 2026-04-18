<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SubtypeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Type
    Route::get('/types', [TypeController::class, 'get'])->name('types.get');
    Route::post('/types/store', [TypeController::class, 'store'])->name('types.store');
    Route::get('/types/edit/{id}', [TypeController::class, 'edit'])->name('types.edit');
    Route::get('/types/delete/{id}', [TypeController::class, 'destroy'])->name('types.delete');
    Route::get('/types/view/{id}', [TypeController::class, 'view'])->name('types.view');

    // Sub types
    Route::get('/sub-types', [SubtypeController::class, 'index'])->name('subtypes.index');
    Route::get('/sub-types/list', [SubtypeController::class, 'get'])->name('subtypes.get');
    Route::get('/sub-types/create', [SubtypeController::class, 'create'])->name('subtypes.create');
    Route::post('/sub-types/store', [SubtypeController::class, 'store'])->name('subtypes.store');
    Route::get('/sub-types/edit/{id}', [SubtypeController::class, 'edit'])->name('subtypes.edit');
    Route::get('/sub-types/delete/{id}', [SubtypeController::class, 'destroy'])->name('subtypes.destroy');
    Route::get('/sub-types/view/{id}', [SubtypeController::class, 'view'])->name('subtypes.view');

    // Rooms
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/list', [RoomController::class, 'get'])->name('rooms.get');
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms/store', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/edit/{id}', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::get('/rooms/delete/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');
    Route::get('/rooms/view/{id}', [RoomController::class, 'view'])->name('rooms.view');

    //Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/get', [NotificationController::class, 'get'])->name('notifications.get');
    Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notifications.create');
    Route::post('/notifications/store', [NotificationController::class, 'store'])->name('notifications.store');
    Route::get('/notifications/edit/{id}', [NotificationController::class, 'edit'])->name('notifications.edit');
    Route::get('/notifications/delete/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    Route::get('/notifications/view/{id}', [NotificationController::class, 'view'])->name('notifications.view');
});

require __DIR__.'/frontend.php';
require __DIR__.'/auth.php';
