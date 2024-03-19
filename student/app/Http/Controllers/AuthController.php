<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{






    public function login()
    {
        return view('auth/login'); // Assuming 'login/action' is the path to your login view
    }





    public function loginAction(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('home')->withErrors($validator)->withInput();
        }

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Authentication successful


            $User = User::where('email', $request->input('email'))->first();

            // Store the user's email in the session
            $request->session()->put('user_email', $User['email']);
            $request->session()->put('first_name', $User['name']);
            $request->session()->put('user_id', $User['id']);
            $request->session()->put('user_img', $User['photo']);

            // Regenerate the session ID for security
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Login successfully.');
        }

        // Authentication failed
        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        $request->session()->regenerateToken();
        return redirect('https://new.bringyourbuddy.in');
    }


    public function index()
    {
        
        $stuId = session('user_id');

        $where = array('universities.del_status' => 0, 'universities.status' => 1, 'student_application.del_status' => 0,'student.id' => $stuId);
        $data['app_data'] = DB::table('student_application')
            ->join('universities', 'universities.id', '=', 'student_application.uni_id')
            ->join('student', 'student.id', '=', 'student_application.stu_id')
            ->join('courses', 'courses.id', '=', 'student_application.course_id')
            ->join("university_courses", function ($join) {
                $join->on("university_courses.course_id", "=", "student_application.course_id")
                    ->on("university_courses.uni_id", "=", "student_application.uni_id");
            })
            ->select('courses.course_name', 'universities.uni_name', 'courses.course_eligibility', 'universities.state', 'universities.city', 'university_courses.anul_fee_without_hos as annual_fee', 'university_courses.reg_fees', 'courses.course_duration_month as month_duration', 'courses.course_duration_sem as sem_duration', 'courses.course_duration_year as year_duration', 'student.name as stu_name', 'student.email as stu_email', 'student.phone_no as stu_phone', 'student_application.status as app_status')
            ->where($where)
            ->get();

        return view('index', $data);
    }
}
