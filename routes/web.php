<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientCommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CompanySettingsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FooterLinkController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GoogleMapController;
use App\Http\Controllers\GreetingController;
use App\Http\Controllers\ITServicesController;
use App\Http\Controllers\MDMessageController;
use App\Http\Controllers\MenuContentController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SliderContentController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\StrengthsController;
use App\Http\Controllers\WebDesignController;
use App\Http\Controllers\WeBestController;
use App\Http\Controllers\OfficeHourController;
use App\Http\Controllers\SubscribeController;

use App\Http\Controllers\MswController;
use App\Http\Controllers\PfController;
use App\Http\Controllers\YoutubevideoController;
use App\Http\Controllers\CatalogController;

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
Route::get('sitemap.xml', [FrontendController::class, 'sitemap']);
Route::get('robots.txt', function () {
    $lines = [
        'User-agent: *',
        'Disallow:'
    ];

    $content = implode(PHP_EOL, $lines);

    return response($content, 200, ['Content-Type' => 'text/plain']);
});
Route::group(['middleware'=>'HtmlMinifier'], function(){
    Route::get('/', [FrontendController::class, 'index']);
    Route::get('/page/{slug}', [FrontendController::class, 'show']);
    Route::get('/page/{category}/{slug}', [FrontendController::class, 'categoryPage']);
    Route::get('/page/{category}/{slug}/{child}', [FrontendController::class, 'childPage']);
    Route::get('/page/{category}/{slug}/{subCategory}/{child}', [FrontendController::class, 'businessPage']);
    Route::get('/gallery-details/{slug}', [FrontendController::class, 'galleryDetails']);
    // Route::get('/business/{slug}', [FrontendController::class, 'show']);
    // Route::get('/services/{slug}', [FrontendController::class, 'show']);
});
Route::get('/sub-category/{id}', [BlogCategoryController::class, 'subCategory']);
Route::get('/sub-category-detail/{id}', [BlogCategoryController::class, 'subCategoryDetail']);
Route::get('/brand/{id}', [BlogCategoryController::class, 'brandList']);
Route::get('/products/{catId}/{brandId}', [BlogCategoryController::class, 'productList']);

Route::get("/products",[FrontendController::class,"productbycat"])->name("pcat");
Route::get("/get-sub",[FrontendController::class,"subCat"])->name("get_sub");

Route::group(['middleware' => ['auth']], function() {
    // Route::get("moving-seftly/{id}",[MswController::class,"edit"])->name("msw-edit");
    // Route::post("moving-seftly/{id}",[MswController::class,"update"])->name("msw-update");

    Route::resource('pf', PfController::class);
    Route::resource('youtube', YoutubevideoController::class);
    Route::resource('catalog', CatalogController::class);
    Route::resource('msw', MswController::class);
});



####################################### Backend Route ################################
Route::get('/login', function () {
    return view('backend.user.login');
})->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('company', CompanySettingsController::class);
    Route::resource('about-us', AboutUsController::class);
    Route::resource('greeting', GreetingController::class);
    Route::resource('google-map', GoogleMapController::class);
    Route::resource('social-link', SocialLinkController::class);
    Route::resource('contact-us', ContactUsController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('menu-content', MenuContentController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('slider-content', SliderContentController::class);

    Route::resource('blog', BlogController::class);

    Route::resource('blog-category', BlogCategoryController::class);
    Route::resource('section', SectionController::class);
    Route::resource('we-best', WeBestController::class);
    Route::resource('md-message', MDMessageController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('it-services', ITServicesController::class);
    Route::resource('projects', ProjectsController::class);
    Route::resource('web-design', WebDesignController::class);
    Route::resource('strengths', StrengthsController::class);
    Route::resource('client-comment', ClientCommentController::class);
    Route::resource('footer-link', FooterLinkController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('seo', SeoController::class);
    Route::resource('message', MessageController::class);
    Route::resource('subscribe', SubscribeController::class);
    Route::resource('experience', ExperienceController::class);
    Route::resource('office-hour', OfficeHourController::class);
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::get('/backend/forgot-password', [UserController::class, 'forgotPassword'])->name('password.request');
Route::post('/backend/forgot-password', [UserController::class, 'emailPassword'])->name('password.email');
Route::get('/reset-password/{token}', [UserController::class, 'getPassword']);
Route::post('/reset-password', [UserController::class, 'updatePassword'])->name('password.reset');

