<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\OurTeamController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AcademicController;
use App\Http\Controllers\Admin\ChooseUsController;
use App\Http\Controllers\Admin\CkeditorController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Online_formController;
use App\Http\Controllers\Admin\StudentLifeController;
use App\Http\Controllers\Admin\MissionVisionController;

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
Route::auth();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('backend.layout.master');
    });
    Route::get('dashboard-page', [DashboardController::class, 'index'])->name('dashboard.page');
    // ck editor
    Route::post('ckditor_image', [CkeditorController::class, 'storeImage'])->name('image.upload');

    //slider
    Route::get('slider-page', [SliderController::class, 'index'])->name('slider.page');
    Route::post('slider-save', [SliderController::class, 'store'])->name('slider.save');
    Route::get('slider-edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('slider-update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('slider-delete/{id}', [SliderController::class, 'destroy'])->name('slider.delete');
    Route::post('slider-status', [SliderController::class, 'status'])->name('slider.status');

    //client
    Route::get('client-page', [ClientController::class, 'index'])->name('client.page');
    Route::post('client-save', [ClientController::class, 'store'])->name('client.save');
    Route::get('client-edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('client-update/{id}', [ClientController::class, 'update'])->name('client.update');
    Route::delete('client-delete/{id}', [ClientController::class, 'destroy'])->name('client.delete');
    Route::post('client-status', [ClientController::class, 'status'])->name('client.status');

    // Advertisement
    Route::get('advertisement-page', [AdvertiseController::class, 'index'])->name('advertisement.page');
    Route::post('advertisementBg-save', [AdvertiseController::class, 'save'])->name('advertisement.bg.save');
    Route::put('advertisementBg-update/{id}', [AdvertiseController::class, 'bg_update'])->name('advertisement.bg.update');
    Route::get('create-ads', [AdvertiseController::class, 'create'])->name('create.ads');
    Route::post('advertisement-save', [AdvertiseController::class, 'store'])->name('advertisement.save');
    Route::get('advertisement-edit/{id}', [AdvertiseController::class, 'edit'])->name('advertisement.edit');
    Route::put('advertisement-update/{id}', [AdvertiseController::class, 'update'])->name('advertisement.update');
    Route::delete('advertisement-delete/{id}', [AdvertiseController::class, 'destroy'])->name('advertisement.delete');
    Route::post('advertisement-status', [AdvertiseController::class, 'status'])->name('advertisement.status');

    //why choose us
    Route::get('chooseUs-page', [ChooseUsController::class, 'index'])->name('chooseUs.page');
    Route::post('chooseUs-save', [ChooseUsController::class, 'store'])->name('chooseUs.save');
    Route::put('chooseUs-update/{id}', [ChooseUsController::class, 'update'])->name('chooseUs.update');

    //student life
    Route::get('studentLife-page', [StudentLifeController::class, 'index'])->name('studentLife.page');
    Route::post('studentLife-sectinDetail', [StudentLifeController::class, 'save'])->name('studentLife.sectinDetail.save');
    Route::put('studentLifeSection-update/{id}', [StudentLifeController::class, 'bg_update'])->name('studentLife.sectinDetail.update');
    Route::get('studentLife-create', [StudentLifeController::class, 'create'])->name('studentLife.create');
    Route::post('studentLife-save', [StudentLifeController::class, 'store'])->name('studentLife.save');
    Route::get('studentLife-edit/{id}', [StudentLifeController::class, 'edit'])->name('studentLife.edit');
    Route::put('studentLife-update/{id}', [StudentLifeController::class, 'update'])->name('studentLife.update');
    Route::delete('studentLife-delete/{id}', [StudentLifeController::class, 'destroy'])->name('studentLife.delete');
    Route::post('studentLife-status', [StudentLifeController::class, 'status'])->name('studentLife.status');

    // youtube video

    Route::get('youtube-page', [VideoController::class, 'index'])->name('youtube.page');
    Route::post('youtube-save', [VideoController::class, 'store'])->name('youtube.save');
    Route::get('youtube-edit/{id}', [VideoController::class, 'edit'])->name('youtube.edit');
    Route::put('youtube-update/{id}', [VideoController::class, 'update'])->name('youtube.update');
    Route::delete('youtube-delete/{id}', [VideoController::class, 'destroy'])->name('youtube.delete');
    Route::post('youtube-status', [VideoController::class, 'status'])->name('youtube.status');

    //Upcomming event
    Route::get('event-page', [EventController::class, 'index'])->name('event.page');
    Route::get('event-create', [EventController::class, 'create'])->name('event.create');
    Route::post('event-save', [EventController::class, 'store'])->name('event.save');
    Route::get('event-edit/{id}', [EventController::class, 'edit'])->name('event.edit');
    Route::put('event-update/{id}', [EventController::class, 'update'])->name('event.update');
    Route::delete('event-delete/{id}', [EventController::class, 'destroy'])->name('event.delete');
    Route::post('event-status', [EventController::class, 'status'])->name('event.status');
    Route::post('eventBg-save', [EventController::class, 'save'])->name('eventBg.save');
    Route::post('eventBg-update/{id}', [EventController::class, 'section_update'])->name('eventBg.update');

    // album
    Route::resource('album-page', AlbumController::class)->names('album.page');
    Route::post('albumCaption-save', [AlbumController::class, 'caption_save'])->name('albumCaption.save');
    Route::post('album-status', [AlbumController::class, 'status'])->name('album.status');
    Route::delete('gallery-delete/{id}', [AlbumController::class, 'gallery_destroy'])->name('gallery.delete');
    Route::put('albumCaption-update/{id}', [AlbumController::class, 'section_update'])->name('albumCaption.update');

    // aboutUs
    Route::resource('aboutUs-page', AboutController::class)->names('aboutUs.page');
    Route::post('aboutUs-status', [AboutController::class, 'status'])->name('aboutUs.status');

    // mission vision
    Route::resource('missionV-page', MissionVisionController::class)->names('missionV.page');
    Route::post('missionV-status', [MissionVisionController::class, 'status'])->name('missionV.status');

    //counter
    Route::resource('counter-page', CounterController::class)->names('counter.page');
    Route::post('counter-status', [CounterController::class, 'status'])->name('counter.status');

    //Our Team
    Route::resource('team-page', OurTeamController::class)->names('team.page');
    Route::post('team-status', [OurTeamController::class, 'status'])->name('team1.status');
    Route::post('team-section-save', [OurTeamController::class, 'section_save'])->name('team.section.save');
    Route::put('team-section-update/{id}', [OurTeamController::class, 'section_update'])->name('team.section.update');

    //Academic
    Route::resource('academic-page', AcademicController::class)->names('academic.page');
    Route::post('academic-section-save', [AcademicController::class, 'section_save'])->name('academic.section.save');
    Route::put('academic-section-update/{id}', [AcademicController::class, 'section_update'])->name('academic.section.update');
    Route::post('academic-status', [AcademicController::class, 'status'])->name('academic.status');

    // Event
    Route::resource('setting-page', SettingController::class)->names('setting.page');

    // Menu
    Route::post('menu-status', [MenuController::class, 'status'])->name('menu.status');
    Route::resource('menu-page', MenuController::class)->names('menu.page');
    Route::post('updateMenu', [MenuController::class, 'updateMenuOrder'])->name('updateMenuOrder');

    // Downloads
    Route::resource('download-page', DownloadController::class)->names('download.page');
    Route::post('download-status', [DownloadController::class, 'status'])->name('download.status');

    //online form

    Route::resource('online_form-page', Online_formController::class)->names('online_form.page');
    Route::get('online_form-list', [Online_formController::class, 'view'])->name('online_form.table.list');
    Route::get('online_viewRecord/{id}' , [Online_formController::class, 'view_data'])->name('online.viewRecord');

    Route::resource('ContactUs-page', ContactUsController::class)->names('ContactUs.page');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
