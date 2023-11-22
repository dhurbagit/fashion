<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\Online_formController;
use App\Http\Controllers\Admin\StudentLifeController;
use App\Http\Controllers\Frontend\FrontendController;

// frontend route

Route::get('/', [FrontendController::class, 'index']);
Route::get('content/{title}', [FrontendController::class, 'page'])->name('page');
Route::get('category/{category}', [FrontendController::class, 'category'])->name('category');

Route::get('frontend-album/{id}', [FrontendController::class, 'show_gallery'])->name('frontend.album');

Route::get('frontendEvent/{id}', [FrontendController::class, 'event_detail'])->name('frontendEvent');

Route::resource('onlineForm', Online_formController::class)->names('onlineForm');

Route::resource('advertisement-page', AdvertiseController::class)->names('advertisement.page');

Route::resource('studentLIfeDetail-front', StudentLifeController::class)->names('studentLIfeDetail.front');


