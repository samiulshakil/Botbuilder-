<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ManController;
use App\Http\Controllers\WomenController;
use App\Http\Controllers\ManSubCategoryController;
use App\Http\Controllers\WomenSubCategoryController;
use App\Http\Controllers\BannerKnowSectionController;
use App\Http\Controllers\BotBuilderSectionController;
use App\Http\Controllers\PreOrderSectionController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\QuickLinkController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\NewsSectionController;

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
    return view('welcome');
})->name('welcome');

require __DIR__.'/auth.php';

// frontend -------- 

Route::group(['prefix'=>'frontend'], function(){

    Route::controller(FrontendController::class)->group(function () {

        //index or home ----- 
        Route::get('/home', 'home')->name('home');
        //bot builder ----- 
        Route::get('/botbuilder', 'botBuilder')->name('bot.builder');
        //bot builder favourite for man
        Route::post('/favourite', 'favourite')->name('bot.favourite');
        //bot builder favourite for women
        Route::post('/favourite/women', 'favouriteWomen')->name('bot.favourite.women');
        // bot builder get hidden image
        Route::post('/hidden/image', 'hiddenImage')->name('bot.hidden.image');

    });
    

});   


//Back end ---- ----- 
Route::group(['prefix'=>'admin'],function(){

    //Admin Home or Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // menu
    Route::resource('menu', MenuController::class);

    // banner know section frontend home
    Route::get('/bannerknow/edit', [BannerKnowSectionController::class, 'edit'])->name('bannerknow.edit');
    Route::post('/bannerknow/update/{id}', [BannerKnowSectionController::class, 'update'])->name('bannerknow.update');

    // Pre Order Section frontend home
    Route::get('/preorder/edit', [PreOrderSectionController::class, 'edit'])->name('preorder.edit');
    Route::post('/preorder/update/{id}', [PreOrderSectionController::class, 'update'])->name('preorder.update');
    
    // News Section frontend home
    Route::get('/news/edit', [NewsSectionController::class, 'edit'])->name('news.edit');
    Route::post('/news/update/{id}', [NewsSectionController::class, 'update'])->name('news.update');
    
    // Footer Section
    Route::get('/footer/edit', [FooterController::class, 'edit'])->name('footer.edit');
    Route::post('/footer/update/{id}', [FooterController::class, 'update'])->name('footer.update');

    //social media section crud
    Route::resource('/socialmedia', SocialMediaController::class);

    //Quick Link Crud
    Route::resource('/quicklink', QuickLinkController::class);

    // bot builder section 
    Route::get('/botbuilder/edit', [BotBuilderSectionController::class, 'edit'])->name('botbuilder.edit');
    Route::post('/botbuilder/update/{id}', [BotBuilderSectionController::class, 'update'])->name('botbuilder.update');



    //Back end ---- men Category... ----- 
    Route::get('/create/man/category', [ManController::class, 'create'])->name('man.category.create');
    Route::post('/store/man/category', [ManController::class, 'store'])->name('man.category.store');
    Route::get('/all/man/category', [ManController::class, 'index'])->name('man.category.index');
    Route::get('/edit/man/category/{id}', [ManController::class, 'edit'])->name('man.category.edit');
    Route::post('/update/man/category', [ManController::class, 'update'])->name('man.category.update');
    Route::post('/delete/man/category', [ManController::class, 'delete'])->name('man.category.delete');

    //lady category or women category... ------ 
    Route::resource('womens', WomenController::class);

    //man sub category
    Route::resource('mansubcategories', ManSubCategoryController::class);

    //man sub category
    Route::resource('womensubcategories', WomenSubCategoryController::class);
});









