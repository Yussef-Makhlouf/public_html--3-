<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BrancheController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OurClientController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecialOfferController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

    

// Route للصور والملفات
Route::get('/storage/{path}', function ($path) {
    $file = storage_path('app/public/' . $path);
    
    if (!file_exists($file)) {
        abort(404);
    }
    
    return response()->file($file);
})->where('path', '.*');

Route::group([
   'prefix' => LaravelLocalization::setLocale(),
   'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
   Route::middleware(['redirect.prefix'])->get('/login', function () {
      return view('auth.login');
   });

   route::get('/', [FrontController::class, 'index'])->name('index');
   route::get('/about_us/{id}', [FrontController::class, 'about_us'])->name('about_us');
   route::get('/blogger', [FrontController::class, 'blogger'])->name('blogger');
   route::get('/blog/{id}', [FrontController::class, 'blog'])->name('blog');
   route::get('/product/{id}', [FrontController::class, 'product'])->name('product');
   route::get('/service/{id}', [FrontController::class, 'service'])->name('service');
   route::get('/contact_us', [FrontController::class, 'contact_us'])->name('contact_us');
   route::get('/clients', [FrontController::class, 'clients'])->name('clients');
   route::get('/projects', [FrontController::class, 'projects'])->name('projects');
   route::get('/booking', [FrontController::class, 'booking'])->name('booking');
   route::get('/policy', [FrontController::class, 'policy'])->name('policy');
   route::get('/terms_and_conditions', [FrontController::class, 'terms_and_conditions'])->name('terms_and_conditions');
   route::get('/project_details/{id}', [FrontController::class, 'project_details'])->name('project_details');
   route::get('/product_details/{id}', [FrontController::class, 'product_details'])->name('product_details');

   Route::prefix('cms/')->middleware('guest:admin')->group(function () {
      route::get('{guard}/login', [UserAuthController::class, 'showLogin'])->name('view.login');
   });
   Route::middleware('auth:admin')->group(function () {
      route::get('home', [HomeController::class, 'index'])->name('home');
      Route::get('/chart-data', [HomeController::class, 'getData']);
   });
   Route::prefix('cms/admin')->middleware(['auth:admin'])->group(function () {

      Route::resource('categories', CategoryController::class);
      Route::resource('products', ProductController::class);
      Route::resource('services', ServiceController::class);
      Route::resource('branches', BrancheController::class);
      Route::resource('blogs', BlogsController::class);
      Route::resource('about_us', AboutUsController::class);
      Route::resource('our-clients', OurClientController::class);
      Route::resource('reviews', ReviewsController::class);
      Route::resource('contacts', ContactController::class);
      Route::resource('reservations', ReservationController::class);
      Route::resource('buys', BuyController::class);
      Route::resource('pdfs', PdfController::class);
      Route::resource('special_offers', SpecialOfferController::class);
      Route::resource('projects', ProjectController::class);


      Route::resource('admins', AdminController::class);
      Route::post('admins_update/{id}', [AdminController::class, 'update'])->name('admins_update');
   });
});
