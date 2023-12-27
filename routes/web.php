<?php

use App\Http\Controllers\BuyerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ServiceCategoryController ;
use App\Http\Controllers\ProductCategoryController ;
use App\Http\Controllers\LogoutController;


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



Route::group(['middleware' => ['guest']], function() { 
   

/* Login */
    Route::get('/', [LoginController::class, 'index'])->name('root'); 
    Route::post('/login', [LoginController::class, 'login'])->name('login');
  /* END */ 

  /* Buyer Register */
    Route::get('/buyer', [BuyerController::class, 'buyer']);
    Route::post('/buyer', [BuyerController::class, 'registerBuyer'])->name('registerBuyer');
    /* END */

/* Service Provider Register */
    Route::get('/serviceProvider', [ServiceProviderController::class, 'serviceProvider']);
    Route::post('/serviceProvider', [ServiceProviderController::class, 'registerServiceProvider'])->name('registerServiceProvider');
    Route::get('/verify-email', [ServiceProviderController::class, 'verify_email'])->name('verifyEmail');
    Route::post('/activate-account', [ServiceProviderController::class, 'activateAccount'])->name('activateAccount');
    Route::post('/verifiedOtp', [ServiceProviderController::class, 'serviceProviderAccountActivation'])->name('verifiedOtp');
    Route::get('/resendOtp', [ServiceProviderController::class, 'resendOtp'])->name('resendOtp');
    Route::post('/verifyNewOtp', [ServiceProviderController::class, 'verifyNewOtp'])->name('verifyNewOtp');
    Route::get('/resendOtpPage', [ServiceProviderController::class, 'resendOtpPage'])->name('resendOtpPage');
/* END */
Route::get('/verify-email', [BuyerController::class, 'verify_email'])->name('verifyEmail');
Route::post('/verifiedOtp', [BuyerController::class, 'buyerAccountActivation'])->name('verifiedOtp');
});


Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::group(['middleware' => ['stepper']], function() {
        Route::get('/companyDetails', [ServiceProviderController::class, 'showCompanyDetails'])->name('companyDetails');
        Route::get('/add-company', [ServiceProviderController::class, 'addCompany'])->name('addCompany');
        Route::post('/companies', [ServiceProviderController::class, 'createCompany'])->name('companies.add');
        Route::get('/addclient-experience', [ServiceProviderController::class, 'addCompanyExperience'])->name('addclient-experience');
        Route::post('/client-experience', [ServiceProviderController::class, 'addExperience'])->name('addclient.post');
        Route::post('/addServices', [ServiceCategoryController ::class, 'addServices'])->name('addServices');
        Route::get('/sevice-categories/{categoryId}', [ServiceCategoryController ::class, 'serviceCategories'])->name('serviceCategories');
        Route::get('/editExp/{exp_id}', [ServiceProviderController::class, 'editExperience'])->name('editExperience');
        Route::post('/update-client-experience/{exp_id}', [ServiceProviderController::class, 'updateExp']);
        Route::delete('/deleteExp/{exp_id}', [ServiceProviderController::class, 'deleteExp']);
        Route::post('/addProducts', [ProductCategoryController ::class, 'addProducts'])->name('addProducts');
        Route::get('/get-subcategories/{categoryId}', [ProductCategoryController ::class, 'getSubcategories'])->name('getSubcategories');
        Route::get('getExp', [ServiceProviderController::class, 'getClientExp'])->name('getExp');
    });
   
    Route::get('/add-survey', [BuyerController::class, 'addSurvey'])->name('addSurvey');
    Route::post('/get-answers', [BuyerController::class, 'getAnswersByTopic'])->name('get-answers');
    Route::get('/add-survey1', [BuyerController::class, 'addSurvey1'])->name('addSurvey1');
    Route::get('/add-survey2', [BuyerController::class, 'addSurvey2'])->name('addSurvey2');
    Route::post('/get-questions', [BuyerController::class, 'getQuestions'])->name('getQuestions');
    Route::post('/submit-answer', [BuyerController::class, 'saveAnswers'])->name('save.answers');
    Route::get('/logout', [LogoutController::class, 'logout']);
 });