<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Session;

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


Route::get('logout', function () {
    if (session()->has('email')) {
        session()->pull('email', null);
    }
    return redirect('https://new.bringyourbuddy.in');
});


Route::get('get_session', function () {
    dd(session()->all());
});

Route::get('rem_session', function () {
    Session::flush();
    Session::save();
    return redirect('https://new.bringyourbuddy.in');
});



//Profile settings
Route::get('profile', [ProfileController::class, 'profile']);
Route::post('profile', [ProfileController::class, 'updatesetting']);
//end



//agents
Route::get('add_agents', [AgentController::class, 'agents']);
Route::post('add_agents', [AgentController::class, 'addagent']);
Route::get('view_agents', [AgentController::class, 'view_agents']);
Route::get('viewdetail_agents/{id}', [AgentController::class, 'view_detail_agent']);
Route::get('editagent/{id}', [AgentController::class, 'editagent']);
Route::post('editagent', [AgentController::class, 'updateagent']);
Route::post('view_agents', [AgentController::class, 'updateagentstatus']);
Route::post('deleteagent', [AgentController::class, 'deleteagent']);



//student
Route::get('add_student', [StudentController::class, 'students']);
Route::post('add_student', [StudentController::class, 'add_student']);
Route::get('view_student', [StudentController::class, 'view_student']);
Route::get('view_detail_student/{id}', [StudentController::class, 'view_detail_student']);
Route::get('editstudent/{id}', [StudentController::class, 'editstudent']);
Route::post('editstudent', [StudentController::class, 'updatestudent']);
Route::post('deletestudent', [StudentController::class, 'deletestudent']);


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



Route::post('/ol_gen_mail', [SendMailController::class, 'index']);
Route::post('/stu_con_mail', [SendMailController::class, 'stu_confirm']);
Route::post('/doc_verify', [SendMailController::class, 'doc_check']);

// offer letter upload

Route::get('/offerLetter_upload', [StudentController::class, 'offer_letter']);

// update agent status

Route::post('/update_agent_status', [AgentController::class, 'update_agent_status']);
Route::post('/update_student_status', [StudentController::class, 'update_student_status']);
Route::post('/doc_pdf', [StudentController::class, 'gen_doc_pdf']);


Route::get('gen_pdf', [PDFController::class, 'generatePDF']);
Route::get('commision', [AgentController::class, 'commision']);
Route::get('subcommision', [AgentController::class, 'subcommision']);
