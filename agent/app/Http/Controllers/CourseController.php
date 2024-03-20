<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Home;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Models\CoursesModel;
use App\Models\StudentEligibilityModel;
use App\Models\Student_document;
use App\Models\StudentApplication;
use App\Models\User;
use App\Mail\e1_app_reg;
use App\Mail\e2_provisional;
use Illuminate\Support\Facades\Log;

use PDF;






class CourseController extends Controller
{


  public function output($Return = array())
  {
    @header('Cache-Control: no-cache, must-revalidate');
    @header("Content-Type: application/json; charset=UTF-8");
    exit(json_encode($Return));
    die;
  }



  public function getPrograms()
  {
    $stuId = session('user_id');
    $stu_data = DB::table('student')->where([ 'agent_id' => session('agent_id'), 'del_status' => 0])->get();
    $stu_doc = Student_document::where('stu_id', $stuId)->first();

    $where = array('universities.del_status' => 0, 'universities.status' => 1, 'university_courses.status' => 1, 'university_courses.del_status' => 0);
    $data = DB::table('university_courses')
      ->join('courses', 'courses.id', '=', 'university_courses.course_id')
      ->join('universities', 'universities.id', '=', 'university_courses.uni_id')
      ->join('course_category', 'course_category.id', '=', 'courses.course_category')
      ->join('course_type', 'course_type.id', '=', 'courses.course_type')
      ->select('universities.uni_logo', 'universities.uni_name', 'universities.id as uni_id', 'universities.uni_location', 'universities.source_country', 'universities.state', 'universities.distt', 'universities.city', 'course_type.course_eligibility', 'courses.id as course_id',  'university_courses.anul_fee_without_hos', 'university_courses.reg_fees', 'courses.course_name', 'courses.course_trade', 'courses.course_eligibility', 'courses.course_duration_year', 'courses.course_duration_sem', 'courses.course_duration_month')
      ->where($where)
      ->get();
    return view('program', ['pagedata' => $data, 'studata' => $stu_data, 'studoc' => $stu_doc]);
  }




  public function filterPrograms(string $id)
  {

    $prodata = StudentEligibilityModel::where('id', $id)->first();
    $where = array('universities.del_status' => 0, 'universities.status' => 1, 'courses.course_category' => $prodata->apply_education_cat, 'courses.course_type' => $prodata->high_edu_level);

    $data = DB::table('university_courses')
      ->join('universities', 'university_courses.uni_id', '=', 'universities.id')
      ->join('courses', 'university_courses.course_id', '=', 'courses.id')
      ->join('course_category', 'courses.course_category', '=', 'course_category.id')
      ->join('course_type', 'course_type.id', '=', 'courses.course_type')
      ->select('universities.uni_logo', 'universities.uni_name', 'universities.uni_location', 'universities.source_country', 'universities.state', 'universities.distt', 'universities.city', 'course_type.course_eligibility', 'courses.id', 'course_type.type', 'course_category.course_category', 'university_courses.anul_fee_without_hos', 'university_courses.reg_fees', 'courses.course_name', 'courses.course_trade', 'courses.course_eligibility', 'courses.course_duration_year', 'courses.course_duration_sem', 'courses.course_duration_month')
      ->where($where)
      ->where('university_courses.anul_fee_without_hos', '<', $prodata->yearly_tuition_budget)
      // ->where('courses.course_eligibility','LIKE','%'.$prodata->high_edu_level.'%')

      ->get();

    return view('filtered_program', ['pagedata' => $data]);
  }



  // Send Data Card Vise
  public function getCourseDataCardVise(Request $request)
  {
    $where = array('courses.id' => $request->course_id, 'universities.id' => $request->uni_id);
    $data = DB::table('university_courses')
      ->join('universities', 'university_courses.uni_id', '=', 'universities.id')
      ->join('courses', 'university_courses.course_id', '=', 'courses.id')
      ->join('course_category', 'courses.course_category', '=', 'course_category.id')
      ->join('course_type', 'course_type.id', '=', 'courses.course_type')
      ->select('universities.id as uid', 'universities.uni_logo', 'universities.uni_name', 'universities.uni_location', 'universities.source_country', 'universities.state', 'universities.distt', 'universities.city', 'course_type.course_eligibility', 'courses.id as cid', 'course_type.type', 'course_category.course_category', 'university_courses.anul_fee_without_hos', 'university_courses.reg_fees', 'courses.course_name', 'courses.course_description', 'courses.course_trade', 'courses.course_eligibility', 'courses.course_duration_year', 'courses.course_duration_sem', 'courses.course_duration_month')
      ->where($where)
      ->first();

    $this->output($data);
  }





  public function add_documents(Request $request)
  {



    if ($request->file('certificate_10') != '') {

      $certificate_10 = date('YmdHis') . time() . rand() . '.' . $request->file('certificate_10')->getClientOriginalExtension();

      $path = base_path() . '/public/uploads/student_document/certificate_10';

      $request->file('certificate_10')->move($path, $certificate_10);
    } else {

      $certificate_10 = "";
    }



    if ($request->file('certificate_12') != '') {

      $certificate_12 = date('YmdHis') . time() . rand() . '.' . $request->file('certificate_12')->getClientOriginalExtension();

      $path = base_path() . '/public/uploads/student_document/certificate_12';

      $request->file('certificate_12')->move($path, $certificate_12);
    } else {

      $certificate_12 = "";
    }


    if ($request->file('certificate_other') != '') {

      $certificate_other = date('YmdHis') . time() . rand() . '.' . $request->file('certificate_other')->getClientOriginalExtension();

      $path = base_path() . '/public/uploads/student_document/certificate_other';

      $request->file('certificate_other')->move($path, $certificate_other);
    } else {

      $certificate_other = "";
    }


    $doument_data = array(

      "global_url" => "https://new.bringyourbuddy.in/student/public",

      "stu_id" => $request->stu_id,

      "course_id" => $request->course_id,

      "uni_id" => $request->uni_id,

      "certificate_10" => $certificate_10,

      "certificate_12" => $certificate_12,

      "certificate_other" => $certificate_other,

      "created_at" =>  date('Y-m-d H:i:s'),
    );

    $application_data = array(
      "stu_id" => $request->stu_id,

      "course_id" => $request->course_id,

      "uni_id" => $request->uni_id,

      "created_at" =>  date('Y-m-d H:i:s'),
    );
    if ($certificate_10 != "" || $certificate_12 != "" || $certificate_other != "") {
      Student_document::create($doument_data);
    }

    $stuId = $request->stu_id;
    $courseId = $request->course_id;
    $stuId = $request->stu_id;
    $doc_data = Student_document::where('stu_id', $stuId)->first();

    $appres = StudentApplication::create($application_data);




    $where = array('universities.del_status' => 0, 'universities.status' => 1, 'student_application.del_status' => 0, 'student.id' => $stuId, 'courses.id' => $courseId);
    $pdf_data = DB::table('student_application')
      ->join('universities', 'universities.id', '=', 'student_application.uni_id')
      ->join('student', 'student.id', '=', 'student_application.stu_id')
      ->join('courses', 'courses.id', '=', 'student_application.course_id')
      ->join("university_courses", function ($join) {
        $join->on("university_courses.course_id", "=", "student_application.course_id")
          ->on("university_courses.uni_id", "=", "student_application.uni_id");
      })
      ->select('universities.uni_name', 'student.name as stu_name', 'student.phone_no as stu_phone', 'student.email as stu_email', 'courses.course_duration_year', 'courses.course_name', 'university_courses.anul_fee_without_hos as anl_fee', 'university_courses.reg_fees', 'student_application.status as app_status', 'student_application.id as app_id', 'student_application.created_at as app_date')
      ->where($where)
      ->first();

    $e1_app_data = [
      'stu_name' =>  $pdf_data->stu_name,
      'uni_name' => $pdf_data->uni_name,
      'crs_name' => $pdf_data->course_name,
      'phone' => 891050913
    ];

    $e2_pro_data = [
      'stu_name' =>  $pdf_data->stu_name,
      'uni_name' => $pdf_data->uni_name,
      'crs_name' => $pdf_data->course_name,
      'dur_year' => $pdf_data->course_duration_year,
      'phone' => 891050913
    ];

    Mail::to($pdf_data->stu_email)->send(new e1_app_reg($e1_app_data));
    Mail::to($pdf_data->stu_email)->send(new e2_provisional($e2_pro_data));



    $pdf = 'PDF'::loadView('stu_doc_pdf', array('object' => $pdf_data, "document" => $doc_data))->setOptions(['defaultFont' => 'sans-serif']);
    if ($appres) {
      return $pdf->stream('StudentDetail.pdf');

      return redirect()->back()->with('success', 'Documents Submitted Successfully');
    } else {

      return redirect('agent_add')->withErrors(['' => 'Somthing went wrong!']);
    }
  }

  public function update_10_documents(Request $request)
  {

    $stu_id = $request->stu_id;

    $file = $request->file;

    if ($file != '') {

      $certificate_10 = date('YmdHis') . time() . rand() . '.' . $file->getClientOriginalExtension();

      $path = base_path() . '/public/uploads/student_document/certificate_10';

      $request->$file->move($path, $certificate_10);
    } else {

      $certificate_10 = "";
    }


    $res = Student_document::where('stu_id', $stu_id)->update(array('certifiacte_10' => $certificate_10));

    if ($res) {
      $response['success'] = 1;
      $response['success_msg'] = ' Added successfully.';
      $this->output($response);
    } else {
      $response['error'] = 1;
      $response['error_msg'] = 'Somthing went wrong!';
      $this->output($response);
    }
  }

  public function get_student_data(Request $request){
    $stu_id = $request->stu_id;
    $res = DB::table('student')->where([ 'id' => $stu_id, 'del_status' => 0])->first();
    if ($res) {
      $response['success'] = 1;
      $response['success_msg'] = ' Added successfully.';
      $response['data'] = $res;
      $this->output($response);
    } else {
      $response['error'] = 1;
      $response['error_msg'] = 'Somthing went wrong!';
      $this->output($response);
    }
  }

  public function getcoursedata(Request $request){
    $where = array('courses.id' => $request->course_id, 'universities.id' => $request->uni_id);
    $data = DB::table('university_courses')
      ->join('universities', 'university_courses.uni_id', '=', 'universities.id')
      ->join('courses', 'university_courses.course_id', '=', 'courses.id')
      ->join('course_category', 'courses.course_category', '=', 'course_category.id')
      ->join('course_type', 'course_type.id', '=', 'courses.course_type')
      ->select('universities.id as uid', 'universities.uni_logo', 'universities.uni_name', 'universities.source_country', 'universities.state', 'universities.city', 'course_type.course_eligibility', 'courses.id as cid', 'course_type.type', 'course_category.course_category', 'university_courses.anul_fee_without_hos', 'university_courses.reg_fees', 'courses.course_name', 'courses.course_description', 'courses.course_trade', 'courses.course_eligibility', 'courses.course_duration_year as dur_year', 'courses.course_duration_sem as dur_sem', 'courses.course_duration_month as dur_month')
      ->where($where)
      ->first();

      if ($data) {
        $response['success'] = 1;
        $response['success_msg'] = ' Added successfully.';
        $response['data'] = $data;
        $this->output($response);
      } else {
        $response['error'] = 1;
        $response['error_msg'] = 'Somthing went wrong!';
        $this->output($response);
      }
  }

  
}
