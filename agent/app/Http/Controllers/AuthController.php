<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
            return redirect()->route('/')->withErrors($validator)->withInput();
        }

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Authentication successful


            $User = User::where('email', $request->input('email'))->first();

            // Store the user's email in the session
            $request->session()->put('agent_email', $User['email']);
            $request->session()->put('agent_type', $User['agent_type']);
            $request->session()->put('first_name', $User['first_name']);
            $request->session()->put('agent_id', $User['id']); //now we will use agent id to fetch data
            $request->session()->put('agent_img', $User['photo']);

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
        auth::logout();
        Session::flush();
        Session::save();
        // $request->session()->regenerateToken();
        return redirect('https://new.bringyourbuddy.in');
    }


    public function index()
    {
        $stu = DB::table('student')->where(['agent_id' => session('agent_id'), 'del_status' => 0])->get();
        $agent = DB::table('agents')->get();
        $subagent = DB::table('agents')->where(['agent_type' => 2, 'agent_id' => session('agent_id'), 'del_status' => 0])->get();
        $agent_data = DB::table('agents')->where([ 'id' => session('agent_id'), 'del_status' => 0])->first();


        $where = array('universities.del_status' => 0, 'universities.status' => 1, 'student_application.del_status' => 0, 'agents.id' => session('agent_id'));

        $application = DB::table('student_application')
            ->join('universities', 'universities.id', '=', 'student_application.uni_id')
            ->join('student', 'student.id', '=', 'student_application.stu_id')
            ->join('agents', 'agents.id', '=', 'student.agent_id')
            ->join('courses', 'courses.id', '=', 'student_application.course_id')
            ->join("university_courses", function ($join) {
                $join->on("university_courses.course_id", "=", "student_application.course_id")
                    ->on("university_courses.uni_id", "=", "student_application.uni_id");
            })
            ->select('universities.uni_name', 'student.name as stu_name', 'courses.course_name', 'university_courses.anul_fee_without_hos as anl_fee', 'university_courses.reg_fees', 'student_application.status as app_status', 'student_application.id as app_id', 'universities.uni_logo', 'student_application.created_at as app_date', 'student.id as stu_id', 'courses.id as course_id', 'universities.id as uni_id')
            ->where($where)
            ->get();

        $stucount = count($stu);
        $agentcount = count($agent);
        $appcount = count($application);
        $subcount = count($subagent);
        $balance = $agent_data->balance;
       
        return view('index', compact(['stucount', 'agentcount', 'appcount', 'subcount', 'balance']));
    }
}
