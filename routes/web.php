<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|-----------------------------------s---------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::middleware(['auth'])->group(function () {
    //

    //Admin All Route
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/logout','destroy')->name('admin.logout');
        Route::get('/admin/profile','profile')->name('admin.profile');
        Route::get('/edit/profile','editProfile')->name('edit.profile');
        Route::post('/store/profile','storeProfile')->name('store.profile');
        Route::get('/change/password','changePassword')->name('change.password');
        Route::post('/update/password','updatePassword')->name('update.password');
    });

});

//Home Slide All Route
Route::controller(HomeSliderController::class)->group(function(){

    Route::get('/home/slide','homeSlider')->name('home.slide');
    Route::post('/update/slider','updateSlider')->name('update.slider');

    Route::get('/','HomeMain')->name('home');// Home Route


});
Route::controller(AboutController::class)->group(function(){
    Route::get('/about/page', 'aboutPage')->name('about.page');
    Route::post('/update/about', 'updateAbout')->name('update.about');
    Route::get('/about', 'homeAbout')->name('home.about');
    Route::get('/about/multi/image', 'aboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image', 'storeMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'editMultiImage')->name('edit.multi.image');
    Route::post('/update/multi/image/', 'UpdateMultiImage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');

});
//Portfolio All Route
Route::controller(PortfolioController::class)->group(function(){

    Route::get('/all/portfolio','AllPortfolio')->name('all.protfolio');
    Route::get('/add/portfolio','AddPortfolio')->name('add.protfolio');
    Route::post('/store/portfolio','StorePortfolio')->name('store.portfolio');
    Route::post('/update/portfolio','UpdatePortfolio')->name('update.portfolio');
    Route::get('/edit/portfolio/{id}','EditPortfolio')->name('edit.portfolio');
    Route::get('/delete/portfolio/{id}','DeletePortfolio')->name('delete.portfolio');
    Route::get('/portfolio/details/{id}','PortfolioDetails')->name('portfolio.details');

    Route::get('/portfolio','HomePortfolio')->name('home.portfolio');



});
//Blog Category All Route
Route::controller(BlogCategoryController::class)->group(function(){

    Route::get('/all/blog/category','AllBlogCategory')->name('all.blog.category');
    Route::get('/add/blog/category','AddBlogCategory')->name('add.blog.category');
    Route::post('/store/blog/category','StoreBlogCategory')->name('store.blog.category');
    Route::get('/edit/blog/category/{id}','EditBlogCategory')->name('edit.blog.category');
    Route::post('/update/blog/category/{id}','UpdateBlogCategory')->name('update.blog.category');
    Route::get('/delete/blog/category/{id}','DeleteBlogCategory')->name('delete.blog.category');

});

//Blog Category All Route
Route::controller(BlogController::class)->group(function(){

    Route::get('/all/blog','AllBlog')->name('all.blog');
    Route::get('/add/blog','AddBlog')->name('add.blog');
    Route::post('/store/blog','StoreBlog')->name('store.blog');
    Route::post('/update/blog','UpdateBlog')->name('update.blog');
    Route::get('/edit/blog{id}','EditBlog')->name('edit.blog');
    Route::get('/delete/blog{id}','DeleteBlog')->name('delete.blog');
    Route::get('/blog/details/{id}','BlogDetails')->name('blog.details');
    Route::get('/category/blog/{id}','CategoryBlog')->name('category.blog');
    Route::get('/blog','HomeBlog')->name('home.blog');


});

//Footer All Route
Route::controller(FooterController::class)->group(function(){

    Route::get('/footer/setup','FooterSetup')->name('footer.setup');
    Route::post('/update/footer','UpdateFooter')->name('update.footer');

});
//Contact All Route
Route::controller(ContactController::class)->group(function(){

    Route::get('/contact','contact')->name('contact.me');
    Route::post('/store/message','StoreMessage')->name('store.message');
    Route::get('/contact/message','ContactMessage')->name('contact.message');
    Route::get('/delete/message/{id}','DeleteMessage')->name('delete.message');

});




Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
