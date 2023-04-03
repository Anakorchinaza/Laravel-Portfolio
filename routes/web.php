<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\ServiceController;


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

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    // Admin all route
Route::middleware(['auth'])->group(function () {
    
    Route::controller('AdminController')->group(function () {
        Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
        Route::get('/admin/profile', [AdminController::class, 'Profile'])->name('admin.profile');
        Route::get('/edit/profile', [AdminController::class, 'EditProfile'])->name('edit.profile');
        Route::post('/store/profile', [AdminController::class, 'StoreProfile'])->name('store.profile');

        Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');
        Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');
    });
});

// Homeslider all route
Route::controller('HomeSliderController')->group(function () {
    Route::get('/home/slide', [HomeSliderController::class, 'HomeSlider'])->name('home.slide');
    Route::post('/update/slider', [HomeSliderController::class, 'UpdateSlider'])->name('update.slider');
    Route::get('/', [HomeSliderController::class, 'Home'])->name('home');
   
});

//  about page all route
Route::controller('AboutController')->group(function () {
    Route::get('/about/page', [AboutController::class, 'AboutPage'])->name('about.page');
    Route::post('update/about', [AboutController::class, 'UpdateAbout'])->name('update.about');
    Route::get('/about', [AboutController::class, 'HomeAbout'])->name('home.about');
    Route::get('/add/multi/image', [AboutController::class, 'AboutMultiImage'])->name('add.multi.image');
    Route::post('store/multi/image', [AboutController::class, 'StoreMultiImage'])->name('store.multi.image');
    Route::get('/all/multi/image', [AboutController::class, 'AllMultiImage'])->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', [AboutController::class, 'EditMultiImage'])->name('edit.multi.image');
    Route::post('/update/multi/image', [AboutController::class, 'UpdateMultiImage'])->name('update.multi.image');
    Route::get('/delete/multi/image/{id}', [AboutController::class, 'DeleteMultiImage'])->name('delete.multi.image');
  
   
});


// portfolio all route
Route::controller('PortfolioController')->group(function () {
    Route::get('/all/portfolio', [PortfolioController::class, 'AllPorfolio'])->name('all.portfolio');
    Route::get('/add/portfolio', [PortfolioController::class, 'AddPorfolio'])->name('add.portfolio');
    Route::post('/insert/portfolio', [PortfolioController::class, 'InsertPorfolio'])->name('insert.portfolio');  
    Route::get('/edit/portfolio/{id}', [PortfolioController::class, 'EditPorfolio'])->name('edit.portfolio');
    Route::post('/update/portfolio', [PortfolioController::class, 'UpdatePorfolio'])->name('update.portfolio');
    Route::get('/delete/portfolio/{id}', [PortfolioController::class, 'DeletePorfolio'])->name('delete.portfolio');
    Route::get('/portfolio/details/{id}', [PortfolioController::class, 'PorfolioDetails'])->name('porfolio.details');
    Route::get('/portfolio', [PortfolioController::class, 'HomePorfolio'])->name('home.portfolio');
});

// Blog Category all route
Route::controller('BlogCategoryController')->group(function () {
    Route::get('/all/blog/category', [BlogCategoryController::class, 'AllBlogCategory'])->name('all.blog.category');
    Route::get('/add/blog/category', [BlogCategoryController::class, 'AddBlogCategory'])->name('add.blog.category');
    Route::post('/insert/blog/category', [BlogCategoryController::class, 'InsertBlogCategory'])->name('insert.blog.category');
    Route::get('/edit/blog/category/{id}', [BlogCategoryController::class, 'EditBlogCategory'])->name('edit.blog.category');
    Route::post('/update/blog/category/{id}', [BlogCategoryController::class, 'UpdateBlogCategory'])->name('update.blog.category'); 
    Route::get('/delete/blog/category/{id}', [BlogCategoryController::class, 'DeleteBlogCategory'])->name('delete.blog.category'); 
});

// Blog all route
Route::controller('BlogController')->group(function () {
    Route::get('/all/blog', [BlogController::class, 'AllBlog'])->name('all.blog');
    Route::get('/add/blog', [BlogController::class, 'AddBlog'])->name('add.blog');
    Route::post('/insert/blog', [BlogController::class, 'InsertBlog'])->name('insert.blog');
    Route::get('/edit/blog/{id}', [BlogController::class, 'EditBlog'])->name('edit.blog');
    Route::post('/update/blog', [BlogController::class, 'UpdateBlog'])->name('update.blog');
    Route::get('/delete/blog/{id}', [BlogController::class, 'DeleteBlog'])->name('delete.blog');
    Route::get('/blog/details/{id}', [BlogController::class, 'BlogDetails'])->name('blog.details'); 
    Route::get('/category/blog/{id}', [BlogController::class, 'CategoryBlog'])->name('category.blog');
    Route::get('/blog', [BlogController::class, 'HomeBlog'])->name('home.blog'); 
});

// footer all route
Route::controller('FooterController')->group(function () {
    Route::get('/footer', [FooterController::class, 'AllFooter'])->name('all.footer');
    Route::post('/update/footer', [FooterController::class, 'UpdateFooter'])->name('update.footer');
   
});


// contact all route
Route::controller('ContactController')->group(function () {
    Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
    Route::post('/store/contact', [ContactController::class, 'StoreContact'])->name('store.contact');
    Route::get('/all/messages', [ContactController::class, 'ContactMessage'])->name('all.messages');
    Route::get('/delete/messages/{id}', [ContactController::class, 'DeleteMessage'])->name('delete.message');
     
});


// Homeslider all route
Route::controller('ServiceController')->group(function () {
    Route::get('/add/service', [ServiceController::class, 'AddService'])->name('add.service');
    Route::post('/insert/service', [ServiceController::class, 'InsertService'])->name('insert.service');
    Route::get('/all/service', [ServiceController::class, 'AllService'])->name('all.service');
    Route::get('/edit/service/{id}', [ServiceController::class, 'EditService'])->name('edit.service');
    Route::post('/update/service', [ServiceController::class, 'UpdateService'])->name('update.service'); 
    Route::get('/delete/service/{id}', [ServiceController::class, 'DeleteService'])->name('delete.service');  
    Route::get('/service/details/{id}', [ServiceController::class, 'ServiceDetails'])->name('service.details'); 
    Route::get('/service', [ServiceController::class, 'HomeService'])->name('home.service');
});


require __DIR__.'/auth.php';
