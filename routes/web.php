<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BodController;
use App\Http\Controllers\Admin\WhyController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TopbarController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Frontend\FrontendController;

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

//  Route::get('/', function () {
//      return view('welcome');
//   });
//
Auth::routes();

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/courses', 'create');
    Route::get('courses/{courses}', 'course');
    Route::get('/about', 'abouts');
    Route::get('/bod', 'bods');
    Route::get('/management', 'managements');
    Route::get('/admission', 'admissions');
    Route::get('/notice', 'notice');
    Route::get('/contact', 'contacts');
    Route::post('/contact', 'store_contact');
    Route::get('/gallery', 'gallery');

    // contact
    //Route::controller(ContactController::class)->group(function () {
    //Route::get('contact', 'index');
    // Route::get('/contact/create', 'create');
    //Route::post('contact/create', 'store');
    // Route::get('contact/{contacts}/edit', 'edit');
    // Route::put('contact/{contacts}', 'update');
    // Route::get('contact/{contacts}/delete', 'destroy');
    // });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index']);

        //Top Header
        Route::controller(TopbarController::class)->group(function () {
            Route::get('topbars', 'index');
            Route::get('topbars/create', 'create');
            Route::post('topbars/create', 'store');
            Route::get('topbars/{topbar}/edit', 'edit');
            Route::put('topbars/{topbar}', 'update');
            Route::get('topbars/{topbar}/delete', 'destroy');
        });

        // Header
        Route::controller(HeaderController::class)->group(function () {
            Route::get('headers', 'index');
            Route::get('headers/create', 'create');
            Route::post('headers/create', 'store');
            Route::get('headers/{header}/edit', 'edit');
            Route::put('headers/{header}', 'update');
            Route::get('headers/{header}/delete', 'destroy');
        });

        //Slider Routes
        Route::controller(SliderController::class)->group(function () {
            Route::get('slider', 'index');
            Route::get('slider/create', 'create');
            Route::post('slider/create', 'store');
            Route::get('slider/{slide}/edit', 'edit');
            Route::put('slider/{slide}', 'update');
            Route::get('slider/{slide}/delete', 'destroy');
        });

        // Message
        Route::controller(MessageController::class)->group(function () {
            Route::get('message', 'index');
            Route::get('message/create', 'create');
            Route::post('message/create', 'store');
            Route::get('message/{message}/edit', 'edit');
            Route::put('message/{message}', 'update');
            Route::get('message/{message}/delete', 'destroy');
        });

        // Why MIST
        Route::controller(WhyController::class)->group(function () {
            Route::get('why', 'index');
            Route::get('why/create', 'create');
            Route::post('why/create', 'store');
            Route::get('why/{mist}/edit', 'edit');
            Route::put('why/{mist}', 'update');
            Route::get('why/{mist}/delete', 'destroy');
        });

        // Testimonial
        Route::controller(TestimonialController::class)->group(function () {
            Route::get('testimonials', 'index');
            Route::get('testimonials/create', 'create');
            Route::post('testimonials/create', 'store');
            Route::get('testimonials/{testi}/edit', 'edit');
            Route::put('testimonials/{testi}', 'update');
            Route::get('testimonials/{testi}/delete', 'destroy');
        });

        // Courses
        Route::controller(CoursesController::class)->group(function () {
            Route::get('courses', 'index');
            Route::get('courses/create', 'create');
            Route::post('courses/create', 'store');
            Route::get('courses/{course}/edit', 'edit');
            Route::put('courses/{course}', 'update');
            Route::get('courses/{course}/delete', 'destroy');
        });

        // About
        Route::controller(AboutController::class)->group(function () {
            Route::get('abouts', 'index');
            Route::get('abouts/create', 'create');
            Route::post('abouts/create', 'store');
            Route::get('abouts/{abouts}/edit', 'edit');
            Route::put('abouts/{abouts}', 'update');
            Route::get('abouts/{abouts}/delete', 'destroy');
        });

        // news
        Route::controller(NewsController::class)->group(function () {
            Route::get('news', 'index');
            Route::get('news/create', 'create');
            Route::post('news/create', 'store');
            Route::get('news/{newses}/edit', 'edit');
            Route::put('news/{newses}', 'update');
            Route::get('news/{newses}/delete', 'destroy');
        });

        // bod
        Route::controller(BodController::class)->group(function () {
            Route::get('bod', 'index');
            Route::get('bod/create', 'create');
            Route::post('bod/create', 'store');
            Route::get('bod/{bods}/edit', 'edit');
            Route::put('bod/{bods}', 'update');
            Route::get('bod/{bods}/delete', 'destroy');
        });

        // management
        Route::controller(ManagementController::class)->group(function () {
            Route::get('management', 'index');
            Route::get('management/create', 'create');
            Route::post('management/create', 'store');
            Route::get('management/{managements}/edit', 'edit');
            Route::put('management/{managements}', 'update');
            Route::get('management/{managements}/delete', 'destroy');
        });
        // video
        Route::controller(VideoController::class)->group(function () {
            Route::get('video', 'index');
            Route::get('video/create', 'create');
            Route::post('video/create', 'store');
            Route::get('video/{videos}/edit', 'edit');
            Route::put('video/{videos}', 'update');
            Route::get('video/{videos}/delete', 'destroy');
        });
        // galleris
        Route::controller(GalleryController::class)->group(function () {
            Route::get('gallery', 'index');
            Route::get('gallery/create', 'create');
            Route::post('gallery/create', 'store');
            Route::get('gallery/{galleris}/edit', 'edit');
            Route::put('gallery/{galleris}', 'update');
            Route::get('gallery/{galleris}/delete', 'destroy');
        });
    });
