<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\BannerSliderController;
use App\Http\Controllers\Admin\BlogBoxesController;
use App\Http\Controllers\Admin\ChoseUsController;
use App\Http\Controllers\Admin\EmployersController;
use App\Http\Controllers\Admin\PortfolioBoxesController;
use App\Http\Controllers\Admin\PortfolioCategoriesController;
use App\Http\Controllers\Admin\ServicesBoxesController;
use App\Http\Controllers\Admin\ServicesCategoriesController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\WorkProcessController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CeoController;
use App\Http\Controllers\GoogleAdvertController;
use App\Http\Controllers\OtherServicesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectNameController;
use App\Http\Controllers\SmmController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\FrontServiceController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('front.index');
Route::get('/aboutus', [AboutUsController::class, 'aboutus'])->name('aboutus');
Route::get('/portfolio', [PortfolioController::class, 'portfolio'])->name('portfolio');
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/ceo', [CeoController::class, 'ceo'])->name('ceo');
Route::get('/smm', [SmmController::class, 'smm'])->name('smm');
Route::get('/veb', [WebController::class, 'veb'])->name('veb');
Route::get('/googleadvert', [GoogleAdvertController::class, 'googleadvert'])->name('googleadvert');
Route::get('/otherservices', [OtherServicesController::class, 'otherservices'])->name('otherservices');
Route::get('/blogpost', [BlogPostController::class, 'blogpost'])->name('blogpost');
Route::get('/projectname/{id}', [ProjectNameController::class, 'projectname'])->name('projectname');
Route::get('/service/{id}', [ServiceController::class, 'index'])->name('service');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', fn () => view('admin.index'))->name('admin.index');
    Route::get('/portfoliocategories', [PortfolioCategoriesController::class, 'index'])->name('portfoliocategories.index');
    Route::get('/portfoliocategories/create', [PortfolioCategoriesController::class, 'create'])->name('portfoliocategories.index.create');
    Route::post('/portfoliocategories/store', [PortfolioCategoriesController::class, 'store'])->name('portfoliocategories.index.store');
    Route::get('/portfoliocategories/edit/{id}', [PortfolioCategoriesController::class, 'edit'])->name('portfoliocategories.index.edit');
    Route::post('/portfoliocategories/update/{id}', [PortfolioCategoriesController::class, 'update'])->name('portfoliocategories.index.update');
    Route::delete('/portfoliocategories/delete/{id}', [PortfolioCategoriesController::class, 'destroy'])->name('portfoliocategories.index.destroy');


    Route::get('/bannerslider', [BannerSliderController::class, 'index'])->name('bannerslider.index');
    Route::get('/bannerslider/create', [BannerSliderController::class, 'create'])->name('bannerslider.index.create');
    Route::post('/bannerslider/store', [BannerSliderController::class, 'store'])->name('bannerslider.index.store');
    Route::get('/bannerslider/edit/{id}', [BannerSliderController::class, 'edit'])->name('bannerslider.index.edit');
    Route::post('/bannerslider/update/{id}', [BannerSliderController::class, 'update'])->name('bannerslider.index.update');
    Route::delete('/bannerslider/delete/{id}', [BannerSliderController::class, 'destroy'])->name('bannerslider.index.destroy');


    Route::get('/servicesboxes', [ServicesBoxesController::class, 'index'])->name('servicesboxes.index');
    Route::get('/servicesboxes/create', [ServicesBoxesController::class, 'create'])->name('servicesboxes.index.create');
    Route::post('/servicesboxes/store', [ServicesBoxesController::class, 'store'])->name('servicesboxes.index.store');
    Route::get('/servicesboxes/edit/{id}', [ServicesBoxesController::class, 'edit'])->name('servicesboxes.index.edit');
    Route::post('/servicesboxes/update/{id}', [ServicesBoxesController::class, 'update'])->name('servicesboxes.index.update');
    Route::delete('/servicesboxes/delete/{id}', [ServicesBoxesController::class, 'destroy'])->name('servicesboxes.index.destroy');



    Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServicesController::class, 'create'])->name('services.index.create');
    Route::post('/services/store', [ServicesController::class, 'store'])->name('services.index.store');
    Route::get('/services/edit/{id}', [ServicesController::class, 'edit'])->name('services.index.edit');
    Route::post('/services/update/{id}', [ServicesController::class, 'update'])->name('services.index.update');
    Route::delete('/services/delete/{id}', [ServicesController::class, 'destroy'])->name('services.index.destroy');


    Route::get('/workprocess', [WorkProcessController::class, 'index'])->name('workprocess.index');
    Route::get('/workprocess/create', [WorkProcessController::class, 'create'])->name('workprocess.index.create');
    Route::post('/workprocess/store', [WorkProcessController::class, 'store'])->name('workprocess.index.store');
    Route::get('/workprocess/edit/{id}', [WorkProcessController::class, 'edit'])->name('workprocess.index.edit');
    Route::post('/workprocess/update/{id}', [WorkProcessController::class, 'update'])->name('workprocess.index.update');
    Route::delete('/workprocess/delete/{id}', [WorkProcessController::class, 'destroy'])->name('workprocess.index.destroy');



    Route::get('/blogboxes', [BlogBoxesController::class, 'index'])->name('blogboxes.index');
    Route::get('/blogboxes/create', [BlogBoxesController::class, 'create'])->name('blogboxes.index.create');
    Route::post('/blogboxes/store', [BlogBoxesController::class, 'store'])->name('blogboxes.index.store');
    Route::get('/blogboxes/edit/{id}', [BlogBoxesController::class, 'edit'])->name('blogboxes.index.edit');
    Route::post('/blogboxes/update/{id}', [BlogBoxesController::class, 'update'])->name('blogboxes.index.update');
    Route::delete('/blogboxes/delete/{id}', [BlogBoxesController::class, 'destroy'])->name('blogboxes.index.destroy');


    Route::get('/portfolioboxes', [PortfolioBoxesController::class, 'index'])->name('portfolioboxes.index');
    Route::get('/portfolioboxes/create', [PortfolioBoxesController::class, 'create'])->name('portfolioboxes.index.create');
    Route::post('/portfolioboxes/store', [PortfolioBoxesController::class, 'store'])->name('portfolioboxes.index.store');
    Route::get('/portfolioboxes/edit/{id}', [PortfolioBoxesController::class, 'edit'])->name('portfolioboxes.index.edit');
    Route::post('/portfolioboxes/update/{id}', [PortfolioBoxesController::class, 'update'])->name('portfolioboxes.index.update');
    Route::delete('/portfolioboxes/delete/{id}', [PortfolioBoxesController::class, 'destroy'])->name('portfolioboxes.index.destroy');



    Route::get('/employers', [EmployersController::class, 'index'])->name('employers.index');
    Route::get('/employers/create', [EmployersController::class, 'create'])->name('employers.index.create');
    Route::post('/employers/store', [EmployersController::class, 'store'])->name('employers.index.store');
    Route::get('/employers/edit/{id}', [EmployersController::class, 'edit'])->name('employers.index.edit');
    Route::post('/employers/update/{id}', [EmployersController::class, 'update'])->name('employers.index.update');
    Route::delete('/employers/delete/{id}', [EmployersController::class, 'destroy'])->name('employers.index.destroy');

    Route::get('/choseus', [ChoseUsController::class, 'index'])->name('choseus.index');
    Route::get('/choseus/create', [ChoseUsController::class, 'create'])->name('choseus.index.create');
    Route::post('/choseus/store', [ChoseUsController::class, 'store'])->name('choseus.index.store');
    Route::get('/choseus/edit/{id}', [ChoseUsController::class, 'edit'])->name('choseus.index.edit');
    Route::post('/choseus/update/{id}', [ChoseUsController::class, 'update'])->name('choseus.index.update');
    Route::delete('/choseus/delete/{id}', [ChoseUsController::class, 'destroy'])->name('choseus.index.destroy');



    // Route::get('/', fn () => view('admin.index'))->name('index');
    Route::get('/servicescategories', [ServicesCategoriesController::class, 'index'])->name('servicescategories.index');
    Route::get('/servicescategories/create', [ServicesCategoriesController::class, 'create'])->name('servicescategories.index.create');
    Route::post('/servicescategories/store', [ServicesCategoriesController::class, 'store'])->name('servicescategories.index.store');
    Route::get('/servicescategories/edit/{id}', [ServicesCategoriesController::class, 'edit'])->name('servicescategories.index.edit');
    Route::post('/servicescategories/update/{id}', [ServicesCategoriesController::class, 'update'])->name('servicescategories.index.update');
    Route::delete('/servicescategories/delete/{id}', [ServicesCategoriesController::class, 'destroy'])->name('servicescategories.index.destroy');
});







Route::get('/login', [AdminLoginController::class, 'login'])->name('admin.login');

Route::post('/admin/login-check', [AdminLoginController::class, 'loginCheck'])->name('admin.loginCheck');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');




Route::get('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');






Route::get('/get_portfolio/{id}', [PortfolioController::class, 'get_portfolio'])->name('get_portfolio');
