<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendControllers\HomeController;
use App\Models\Type;


Route::get('/home', function() {
    $types = Type::where('status', 1)->get();
    
    return view('frontend/index', compact('types'));
});

Route::get('/home/get-rooms', [HomeController::class, 'get_rooms'])->name('home.rooms.get');
