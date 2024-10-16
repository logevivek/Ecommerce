<?php

use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\DesableBackBtn;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\User\HomePageController;
use App\Http\Controllers\User\ShopPageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\BlogsController;
use App\Http\Controllers\User\CheckoutCantroller;


    // Route::get('/', function () {
    //     return view('welcome');
    // });

    // Register Route
    Route::get('register',[LoginController::class,'showRegister']);
    Route::post('createregister',[LoginController::class,'createRegister']);
    //Login Route
    Route::get('login', [LoginController::class, 'index']);
    Route::post('createlogin',[LoginController::class,'createLogin']);
    //User logout
    Route::get('logout',[LoginController::class,'LogoutUser']);
    

    // User Middleware
    Route::middleware([ValidUser::class,DesableBackBtn::class])->group(function () {

        Route::get('/', function () {
            return view('backend.login');
        });

        // Category Route
        Route::get('/dashboard', [DashboardController::class, 'Dashboard']);

        Route::get('category', [CategoryController::class, 'ProductCategory']);
        Route::get('addcategory', [CategoryController::class, 'createCategory']);
        Route::post('storecategory', [CategoryController::class, 'storeCategory']);
        Route::get('changeStatus', [CategoryController::class, 'changeStatus']);
        Route::get('editcategory/{id}', [CategoryController::class, 'editCategory']);
        Route::post('updatecategory', [CategoryController::class, 'updateCategory']);
        Route::get('deletecategory', [CategoryController::class, 'deleteCategory']);

        // Product Route
        Route::get('product', [ProductController::class, 'ShowProduct']);
        Route::get('addproduct', [ProductController::class, 'createProduct']);
        Route::post('storeproduct', [ProductController::class, 'storeProduct']);
        Route::get('changeProStatus', [ProductController::class, 'changeProStatus']);
        Route::get('editProduct', [ProductController::class, 'editProduct']);
        Route::post('updateproduct', [ProductController::class, 'updateProduct']);
        Route::get('deleteproduct', [ProductController::class, 'deleteproduct']);

        //Pages Route
        Route::get('page', [PageController::class, 'ShowPage']);
        Route::get('addpage', [PageController::class, 'createPage']);
        Route::post('storepage', [PageController::class, 'storepage']);
        Route::get('changePageStatus', [PageController::class, 'changePageStatus']);
        Route::get('editPage', [PageController::class, 'editPage']);
        Route::post('updatePage', [PageController::class, 'updatePage']);

        //order Route 
        Route::get('order', [OrderController::class, 'ShowOrder']);
        Route::get('Vieworder', [OrderController::class, 'ViewOrder']);
        Route::post('updateOrderStatus', [OrderController::class, 'updateOrderStatus']);


        // Product Review Route
        Route::get('proreview',[ReviewController::class,'ShowProReview']);
        Route::get('changeReviewStatus', [ReviewController::class, 'changeReviewstatus']);

        // Contact Us Route
        Route::get('backendcontact',[ContactController::class,'ShowContactData']);

        // Website Route 
        Route::get('website', [WebsiteController::class, 'ShowWebsiteData']);
        Route::get('addWebsite',[WebsiteController::class, 'createWebsite']);
        Route::post('storewebsite',[WebsiteController::class,'storeWebsite']);
        Route::get('editwebsite', [WebsiteController::class, 'editWebsite']);
        Route:: post('updatewebsite',[WebsiteController::class,'updateWebsite']);

        // Banner Route
        Route::get('banner',[BannerController:: class, 'ShowBanner']);
        Route::get('addbanner',[BannerController::class, 'createBanner']);
        Route::post('storebanner',[BannerController::class,'storeBanner']);
        Route::get('editbanner', [BannerController::class, 'editBanner']);
        Route::post('updatbanner',[BannerController::class,'updateBanner']);
        
        //User Route
        Route::get('user',[UserController::class,'ShowUsers']);


        // Blog Route
        Route::get('blogs',[BlogController::class,'ShowBlogs']);
        Route::get('addblogs',[BlogController::class,'createBanner']);
        Route::post('storeblogs',[BlogController::class,'storeBlogs']);
        Route::get('editbolgs',[BlogController::class,'editBlogs']);
        Route::post('updateblogs',[BlogController::class,'updateBlogs']);
        Route::get('deleteblogs', [BlogController::class, 'deleteBlogs']);
    
 });


    /////////////////////////////////////////////////////////// Frontend Route For page///////////////////////////////////////////////////////////////

    Route::get('index',[HomePageController::class,'ShowHomePage']);
    Route::get('shop',[ShopPageController:: class,'ShowShopPage']);
    
    // Pages Route
    Route::get('contact',[HomePageController::class,'ContactPage']);
    Route::post('contact',[HomePageController::class,'store'])->name('contact.us.store');
    Route::get('about',[HomePageController::class,'AboutPage']);
    Route::get('privacy',[HomePageController::class,'PrivacyPage']);
    Route::get('term',[HomePageController::class,'TermPage']);
    Route::get('prodetailspage/{id}',[HomePageController::class,'ProductDetailsPage']);

    //Store Product Reviews
    Route::post('prodetailspage/storereview',[HomePageController::class,'StoreProReview']);
    Route::get('productcategory/{id}',[HomePageController::class,'ShowCategoryPage']);

    // Cart Route
    Route::get('cart', [HomePageController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [HomePageController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [HomePageController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [HomePageController::class, 'remove'])->name('remove.from.cart');


    // Search Route
    Route::get('productList',[HomePageController::class,'ProductListAjax']);
    Route::post('searchProduct',[HomePageController::class,'SearchProducts']);

    // Checkout Route
    Route::get('checkout',[HomePageController::class,'ShowCheckoutPage']);
    Route::post('storecheckout',[CheckoutCantroller::class,'StoreCheckoutData']);

    // Blogs Route
    Route::get('blog',[BlogsController::class,'BlogsPage']);
    Route::get('blogdetailspage/{id}',[BlogsController::class,'BlogDetailsPage']);







 






   

