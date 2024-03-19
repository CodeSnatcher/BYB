<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SendMailController;

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\StripePaymentController;

//end




Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('home', function () {
        return view('index');
    });
});


Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/', [AuthController::class, 'index']);
});



Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login');
    Route::post('login', 'loginAction');
    Route::post('/logout', 'logout')->name('logout');
});




Route::get('change_pass', [ChangePasswordController::class, 'showChangePasswordForm']);
Route::post('change_pass', [ChangePasswordController::class, 'changePassword']);


Route::get('logout', function (){
   if(session()->has('email'))
{
session()->pull('email', null);
}

return redirect('https://bringyourbuddy.in');

});



//Profile settings
Route::get('profile', [ProfileController::class, 'profile']);
Route::post('profile', [ProfileController::class, 'updateprofilesetting']);
Route::post('profile_address', [ProfileController::class, 'addressdetails']);
Route::post('profile_eduhis', [ProfileController::class, 'eduhistory']);
Route::post('profile_sch', [ProfileController::class, 'schools']);
Route::post('profile_visa', [ProfileController::class, 'visastudydetails']);
Route::get('profile_application', [ProfileController::class, 'application']);
Route::get('profile_payment', [ProfileController::class, 'payment']);
Route::get('profile_program_detail', [ProfileController::class, 'program_detail']);
//end

//eligibilty
Route::get('profile_eligibilty', [ProfileController::class, 'eligibilty']);
Route::post('profile_eligibilty', [ProfileController::class, 'profile_eligibilty_add']);
Route::post('cat_data', [ProfileController::class, 'cat_add']);
//end


//programs
Route::get('programs', [CourseController::class, 'getPrograms']);
Route::get('filter_programs/{id}', [CourseController::class, 'filterPrograms']);
Route::post('getCourseDataCardVise', [CourseController::class, 'getCourseDataCardVise']);

//Programs end


// application

Route::post('create_application', [ProfileController::class, 'add_application']);

Route::post('del_application', [ProfileController::class, 'del_application']);

Route::post('upload_documents', [CourseController::class, 'add_documents']);
// application end

//Pdf

Route::get('gen_pdf', [PDFController::class, 'generatePDF']);

// doc update

// 10th certificate
Route::post('update_10_documents', [CourseController::class, 'update_10_documents']);

// 12th certificate
Route::post('update_12_documents', [CourseController::class, 'update_12_documents']);

// other certificate
Route::post('update_other_documents', [CourseController::class, 'update_other_documents']);

Route::get('/app_reg', [SendMailController::class, 'app_reg']);

// stripe payment

Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe','stripe')->name('stripe.index');
    Route::get('stripe/checkout','stripeCheckout')->name('stripe.checkout');
    Route::get('stripe/checkout/success','stripeCheckoutSuccess')->name('stripe.checkout.success');
});


