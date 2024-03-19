<?php







namespace App\Http\Controllers;







use App\Http\Controllers\Controller;



use Illuminate\Http\Request;



use Illuminate\Support\Facades\Home;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;





use App\Models\managemasterclassModel;



use App\Models\managemastergstModel;



use App\Models\managemasterbrandModel;



use App\Models\StudentModel;
use App\Models\Application_model;
use App\Mail\e2_provisional;



use File;

use PDF;



use Illuminate\Validation\Rule;







class StudentController extends Controller



{


    public function __construct()
    {
        $this->StudentModel = new StudentModel();
    }


    public function output($Return = array())
    {
        @header('Cache-Control: no-cache, must-revalidate');
        @header("Content-Type: application/json; charset=UTF-8");
        exit(json_encode($Return));
        die;
    }







    public function students()



    {



        return view('student_add');
    }



    public function add_student(Request $request)



    {

        // Validate the input data


        $validatedData = $request->validate([



            'email' => 'required|unique:student,email,NULL,id,del_status,0',

            'name' => 'required|max:20|unique:student,name',

            'phone_no' => 'required|min:10|max:14|unique:student,phone_no,NULL,id,del_status,0',



        ]);



        if ($request->file('photo') != '') {



            $image = time() . '_' . $request->file('photo')->getClientOriginalName();



            $path = base_path() . '/public/uploads/student_photo/';



            $request->file('photo')->move($path, $image);
        } else {



            $image = "";
        }







        $data = array(

            "agent_id" => session('agent_id'),

            "name" => $request->name,

            "father_name" => $request->father_name,

            "email" => $request->email,

            "password" => password_hash($request->password, PASSWORD_BCRYPT, [10]),

            "phone_no" => $request->phone_no,

            "mother_name" => $request->mother_name,

            "qualification" => $request->qualification,

            "nationality" => $request->nationality,

            "gender" => $request->gender,

            "address" => $request->address,

            "photo" => $image,

            "status" =>  1,

        );







        $res = StudentModel::insert($data);







        if ($res) {



            return redirect()->back()->with('success', 'Submitted successfully.');
        } else {



            return redirect('student_add')->withErrors(['' => 'Somthing went wrong!']);
        }
    }



    public function view_student()
    {

        $where = array('del_status' => 0, "agent_id" => session('agent_id'));

        $data = StudentModel::orderBy('id', 'DESC')->where($where)->get();



        return view('student_view', ['pagedata' => $data]);
    }



    public function view_detail_student(string $id)



    {



        $data['pagedata'] = StudentModel::where('id', $id)->first();



        return view('student_view_detail', $data);
    }



    // public function updateagentstatus(Request $request)

    // {



    //     $access = AgentModel::where("id", request('id'));



    //         $data = array(

    //             "status" => $request->status,

    //         );





    //     $res = $access->update($data);



    //     if ($res) {



    //         return redirect()->back();

    //     } 

    // }





    public function editstudent(string $id)



    {



        $data['pagedata'] = StudentModel::where('id', $id)->first();



        return view('student_edit', $data);
    }









    public function updatestudent(Request $request)

    {



        $access = StudentModel::where("id", request('id'));





        // Validate the input data

        $validatedData = $request->validate([

            'email' => 'required|unique:student,email,' . $request->id . ',id,del_status,0',

            'phone_no' => 'required|min:10|max:14|unique:student,phone_no,' . $request->id . ',id,del_status,0',



        ]);





        if ($request->file('photo') != "") {



            $image =  time() . '_' . $request->file('photo')->getClientOriginalName();



            $path = base_path() . '/public/uploads/student_photo/';



            $request->file('photo')->move($path, $image);





            $data = array(



                "name" =>  $request->name,

                "father_name" =>  $request->father_name,

                "email" =>  $request->email,

                "phone_no" =>  $request->phone_no,

                "mother_name" =>  $request->mother_name,

                "qualification" =>  $request->qualification,

                "nationality" =>  $request->nationality,

                "gender" =>  $request->gender,

                "address" =>  $request->address,

                "password" => password_hash($request->password, PASSWORD_BCRYPT, [10]),

                "photo" =>  $image,

                "status" => $request->status,



            );
        } else {

            $data = array(



                "name" =>  $request->name,

                "father_name" =>  $request->father_name,

                "email" =>  $request->email,

                "phone_no" =>  $request->phone_no,

                "mother_name" =>  $request->mother_name,

                "qualification" =>  $request->qualification,

                "nationality" =>  $request->nationality,

                "gender" =>  $request->gender,

                "address" =>  $request->address,

                "status" => $request->status,

            );
        }





        // Update the data



        $res = $access->update($data);



        if ($res) {



            return redirect('view_student')->with('success', 'Updated Successfully.');
        } else {



            return redirect()->back()->withErrors(['' => 'Somthing went wrong!']);
        }
    }





    public function deletestudent(Request $request)



    {



        $data = StudentModel::where('id', Request('id'));



        $updData = array(



            'del_status' => 1



        );



        $res = $data->update($updData);



        if ($res) {



            return redirect()->back()->with('success', 'Deleted successfully.');
        } else {



            return redirect()->withErrors(['' => 'Somthing went wrong!']);
        }
    }



    public function application()
    {
        $agent_id = session('agent_id');

        $where = array('universities.del_status' => 0, 'universities.status' => 1, 'student_application.del_status' => 0, 'agents.id' => $agent_id);
        $data = DB::table('student_application')
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



        return view('application_view', ['pagedata' => $data]);
    }
    // application end


    public function update_application_status(Request $request)
    {
        $status = $request->status;
        $app_id = $request->app_id;

        $res = Application_model::where('id', $app_id)->update(array('status' => $status));

        if ($res) {
            $where = array('universities.del_status' => 0, 'universities.status' => 1, 'student_application.del_status' => 0, 'student_application.id' => $app_id);
            $data = DB::table('student_application')
                ->join('universities', 'universities.id', '=', 'student_application.uni_id')
                ->join('student', 'student.id', '=', 'student_application.stu_id')
                ->join('courses', 'courses.id', '=', 'student_application.course_id')
                ->join("university_courses", function ($join) {
                    $join->on("university_courses.course_id", "=", "student_application.course_id")
                        ->on("university_courses.uni_id", "=", "student_application.uni_id");
                })
                ->select('universities.uni_name', 'student.name as stu_name', 'student.id as stu_id', 'student.email as stu_email', 'university_courses.reg_fees', 'courses.course_name', 'university_courses.anul_fee_without_hos as anl_fee', 'university_courses.reg_fees', 'student_application.status as app_status', 'student_application.id as app_id', 'student_application.created_at as app_date', 'courses.course_duration_year as dur_year', 'courses.course_duration_sem as dur_sem', 'courses.course_duration_month as dur_month')
                ->where($where)
                ->first();

            $response['success'] = 1;
            $response['status'] = $status;
            $response['data'] = $data;
            $this->output($response);
        } else {
            $response['error'] = 1;
            $response['error_msg'] = 'Somthing went wrong!';
            $this->output($response);
        }
    }

    public function offer_letter()
    {
        return view('uploade_ol');
    }


    public function update_student_status(Request $request)
    {
        $student_id = $request->student_id;
        $status = $request->status;
        $res = StudentModel::where('id', $student_id)->update(array('status' => $status));
        if ($res == true) {
            $response['success'] = 1;
            $response['success_msg'] = "Updated Successfully!";
            $response['status'] = $status;
            $this->output($response);
        } else {
            $response['error'] = 1;
            $response['error_msg'] = "Something Went Wrong!";
            $this->output($response);
        }
    }

    public function gen_doc_pdf(Request $request)
    {
        $stu_id = $request->stu_id;
        $course_id = $request->course_id;
        $uni_id = $request->uni_id;

        $form_data = array(
            'stu_id' => $stu_id,
            'course_id' => $course_id,
            'uni_id' => $uni_id,
        );

        $agent_id = session('agent_id');

        $where = array('universities.del_status' => 0, 'universities.status' => 1, 'student_application.del_status' => 0, 'agents.id' => $agent_id, 'student.id' => $stu_id, "courses.id" => $course_id, 'universities.id' => $uni_id);

        $response = DB::table('student_application')
            ->leftJoin('universities', 'universities.id', '=', 'student_application.uni_id')
            ->leftJoin('student', 'student.id', '=', 'student_application.stu_id')
            ->leftJoin('agents', 'agents.id', '=', 'student.agent_id')
            ->leftJoin('student_document', 'student_document.stu_id', '=', 'student_application.stu_id')
            ->leftJoin('courses', 'courses.id', '=', 'student_application.course_id')
            ->leftJoin("university_courses", function ($join) {
                $join->on("university_courses.course_id", "=", "student_application.course_id")
                    ->on("university_courses.uni_id", "=", "student_application.uni_id");
            })
            ->select('universities.uni_name', 'student_document.global_url', 'student_document.certificate_10 as matric', 'student_document.certificate_12 as plustwo', 'student_document.certificate_other as otherdoc', 'student.name as stu_name', 'student.phone_no as stu_phone', 'student.email as stu_email', 'courses.course_name', 'university_courses.anul_fee_without_hos as anl_fee', 'university_courses.reg_fees', 'student_application.status as app_status', 'student_application.id as app_id', 'universities.uni_logo', 'student_application.created_at as app_date', 'student.id as stu_id', 'courses.id as course_id', 'universities.id as uni_id')
            ->where($where)
            ->first();

        $pdf = 'PDF'::loadView('new_pdf', array("object" => $response, "form" => $form_data))->setOptions(['defaultFont' => 'sans-serif']);


        if ($response) {
            return $pdf->stream('StudentDetail.pdf');

            return redirect()->back()->with('success', 'Documents Submitted Successfully');
        } else {

            return redirect('view_application')->withErrors(['' => 'Somthing went wrong!']);
        }
    }
}
