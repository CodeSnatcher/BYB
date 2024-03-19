<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Home;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\StudentAddress;
use App\Models\StudentEduHistory;
use App\Models\SchoolDetail;
use App\Models\VisaPermit;
use App\Models\StudentEligibilityModel;
use App\Models\CoursesModel;
use App\Models\Course_Type;
use App\Models\Course_Category;
use App\Models\StudentApplication;


use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
  private  $catdata;

  public function __construct()
  {
    $this->StudentEligibilityModel = new StudentEligibilityModel();
    $this->CoursesModel = new CoursesModel();
  }


  public function output($Return = array())
  {
    @header('Cache-Control: no-cache, must-revalidate');
    @header("Content-Type: application/json; charset=UTF-8");
    exit(json_encode($Return));
    die;
  }

  public function program()
  {
    $data = CoursesModel::orderBy('id', 'DESC')->where('del_status', 0)->get();
    return view('program', ['pagedata' => $data]);
  }


  public function cat_add(Request $request)
  {
    $type_id = $request->type_id;

    $res = Course_Category::orderBy('id', 'DESC')->where('course_type', $type_id)->get();
    if ($res) {
      $response['success'] = 1;
      $response['success_msg'] = ' Added successfully.';
      $response['id'] = $type_id;
      $response['data'] = $res;
      $this->output($response);
    } else {
      $response['error'] = 1;
      $response['error_msg'] = 'Somthing went wrong!';
      $this->output($response);
    }
  }
  public function eligibilty(Request $request)
  {

    $type_id = $this->catdata;


    $data['pagedata'] = Course_Type::orderBy('id', 'DESC')->where('del_status', 0)->get();
    $data['categorydata'] = Course_Category::orderBy('id', 'DESC')->where('course_type', $type_id)->get();
    return view('check_eligibilty', $data);
  }



  public function application(Request $request)
  {
   
    $where = array('universities.del_status' => 0, 'universities.status' => 1, 'student_application.del_status' => 0);
    $data = DB::table('student_application')
      ->join('universities', 'universities.id', '=', 'student_application.uni_id')
      ->join('student', 'student.id', '=', 'student_application.stu_id')
      ->join('courses', 'courses.id', '=', 'student_application.course_id')
      ->join("university_courses", function ($join) {
        $join->on("university_courses.course_id", "=", "student_application.course_id")
          ->on("university_courses.uni_id", "=", "student_application.uni_id");
      })
      ->select('universities.uni_name', 'student.name as stu_name', 'courses.course_name', 'university_courses.anul_fee_without_hos as anl_fee', 'university_courses.reg_fees', 'student_application.status as app_status', 'student_application.id as app_id', 'student_application.created_at as app_date')
      ->where($where)
      ->get();


    return view('application', ['pagedata' => $data]);
  }
  public function payment()
  {

    $where = array('universities.del_status' => 0, 'universities.status' => 1, 'student_application.del_status' => 0);
    $data = DB::table('student_application')
      ->join('universities', 'universities.id', '=', 'student_application.uni_id')
      ->join('student', 'student.id', '=', 'student_application.stu_id')
      ->join('courses', 'courses.id', '=', 'student_application.course_id')
      ->join("university_courses", function ($join) {
        $join->on("university_courses.course_id", "=", "student_application.course_id")
          ->on("university_courses.uni_id", "=", "student_application.uni_id");
      })
      ->select('universities.uni_name', 'student.name as stu_name', 'courses.course_name', 'university_courses.anul_fee_without_hos as anl_fee', 'university_courses.reg_fees', 'student_application.status as app_status', 'student_application.id as app_id', 'student_application.created_at as app_date')
      ->where($where)
      ->get();
    return view('payment', ['pagedata' => $data]);
  }
  public function program_detail()
  {

    return view('program_detail');
  }

  // Send Data Card Vise
  public function getCourseDataCardVise(Request $request)
  {
    // return true;

    $data = CoursesModel::where('id', $request->id)->first();
    $this->output($data);
  }





  public function profile_eligibilty_add(Request $request)

  {
    $stuId = session('user_id');

    $data = array(

      "stu_id" => $stuId,


      "study_country" => $request->study_country,

      "high_edu_level" => $request->high_edu_level,

      "study_start_date" => $request->study_start_date,

      "yearly_tuition_budget" => $request->yearly_tuition_budget,

      "apply_education_cat" => $request->apply_education_cat,

      "english_proficiency" => $request->english_proficiency,

      "created_at" =>  date('Y-m-d H:i:s')

    );

    $res = StudentEligibilityModel::create($data);

    if ($res) {

      return redirect()->to('filter_programs/' . $res->id);
    } else {

      return redirect('profile_eligibilty')->withErrors(['' => 'Somthing went wrong!']);
    }
  }



  public function add_application(Request $request)

  {
    $stuId = session('user_id');

    $data = array(

      "stu_id" => $stuId,

      "cat_id" => $request->cat_id,

      "uni_id" => $request->uni_id,

      "course_id" => $request->course_id,

      "created_at" =>  date('Y-m-d H:i:s')

    );

    $res = StudentApplication::create($data);

    if ($res) {

      return redirect()->back()->with('success', 'Submitted successfully.');
    } else {

      return redirect('set_type')->withErrors(['' => 'Somthing went wrong!']);
    }
  }

  public function del_application(Request $request)
  {
    $app_id = $request->app_id;

    $res = StudentApplication::where('id', $app_id)->update(array('del_status' => 1));

    
    if ($res) {
      notify()->success('Application Deleted Successfully');
      return redirect()->back()->with('success', 'Submitted successfully.');
    } else {
      return redirect()->withErrors(['' => 'Somthing went wrong!']);
    }
  }





  // // ADD Function
  // public function add(Request $request)
  // {
  //      if ($request->file('catlogo')!='') {
  //         $image =  time() . '_' . $request->file('catlogo')->getClientOriginalName();
  //         $path = base_path() . '/public/uploads/ctgr_logo/';
  //         $request->file('catlogo')->move($path, $image);
  //      }
  //      else
  //      {
  //          $image="";
  //      }

  //     $data=[
  //         'course_category'=>$request->course_category,
  //         'cate_logo'=>$image,
  //     ];

  //     $res = $this->Course_Category::create($data);

  //     if ($res) {
  //         $response['success'] = 1;
  //         $response['success_msg'] = ' Added successfully.';
  //         $this->output($response);

  //     } else {
  //         $response['error'] = 1;
  //         $response['error_msg'] = 'Somthing went wrong!';
  //         $this->output($response);
  //     }
  // }



  public function profile()
  {
    $data = User::where('id', session('user_id'))->first();
    $data_address = StudentAddress::where('stu_id', session('user_id'))->first();
    $data_eduhis = StudentEduHistory::where('stu_id', session('user_id'))->first();
    $data_sch_detail = SchoolDetail::where('stu_id', session('user_id'))->first();
    $data_visa = VisaPermit::where('stu_id', session('user_id'))->first();


    return view('profilesetting', array('pagedata' => $data, 'pagedata_address' => $data_address, 'pagedata_eduhis' => $data_eduhis, 'pagedata_sch_detail' => $data_sch_detail, 'pagedata_visa' => $data_visa));
  }



  public function updateprofilesetting(Request $request)
  {
    $request->validate([
      'passport_num' => 'required|numeric', // Ensures that 'passport_num' is required and contains only numeric values.
      // Add other validation rules for your other fields here.
    ]);
    $data = User::where('id', session('user_id'));

    if ($request->file('photo') != "") {

      $photo =  time() . '_' . $request->file('photo')->getClientOriginalName();

      $path = base_path() . '/public/uploads/student_photo/';

      $request->file('photo')->move($path, $photo);


      $updData = array(

        'name' => $request->firstname,
        'dob' => $request->dob,
        'father_name' => $request->father_name,
        'mother_name' => $request->mother_name,
        'first_lang' => $request->first_lang,
        'nationality' => $request->nationality,
        'passport_num' => $request->passport_num,
        'passport_exp_date' => $request->passport_exp_date,
        'marital_status' => $request->marital_status,
        'gender' => $request->gender,
        'phone_no' => $request->phone_no,
        'email' => $request->email,
        'qualification' => $request->qualification,
        'photo' => $photo
      );
      $request->session()->put('user_img', $photo);
    } else {

      $updData = array(

        'name' => $request->firstname,
        'dob' => $request->dob,
        'father_name' => $request->father_name,
        'mother_name' => $request->mother_name,
        'first_lang' => $request->first_lang,
        'nationality' => $request->nationality,
        'passport_num' => $request->passport_num,
        'passport_exp_date' => $request->passport_exp_date,
        'marital_status' => $request->marital_status,
        'gender' => $request->gender,
        'phone_no' => $request->phone_no,
        'email' => $request->email,
        'qualification' => $request->qualification,
      );
    }
    $res = $data->update($updData);
    $request->session()->put('user_email', $request->email);
    $request->session()->put('first_name', $request->firstname);

    // Regenerate the session ID for security
    $request->session()->regenerate();


    if ($res) {

      return redirect()->back()->with('success', 'Updated successfully.');
    } else {

      return redirect()->withErrors(['' => 'Somthing went wrong!']);
    }
  }



  public function addressDetails(Request $request)
  {
    $stuId = session('user_id');
    $stuAddress = StudentAddress::where('stu_id', $stuId)->first();

    if ($stuAddress) {
      // Update code
      $data = StudentAddress::where('stu_id', $stuId);
      $updData = array(
        'address' => $request->address,
        'city_town' => $request->city_town,
        'country' => $request->country,
        'province_state' => $request->province_state,
        'postal_code' => $request->postal_code,
      );


      $res = $data->update($updData);

      if ($res) {

        return redirect()->back()->with('success', 'Updated successfully.');
      } else {

        return redirect()->withErrors(['' => 'Somthing went wrong!']);
      }
    } else {
      // Insert code
      $data = array(
        'stu_id' => $stuId,
        'address' => $request->address,
        'city_town' => $request->city_town,
        'country' => $request->country,
        'province_state' => $request->province_state,
        'postal_code' => $request->postal_code,
        'email' => $request->email,
        'phone_num' => $request->phone_num,
      );

      $res = StudentAddress::create($data);


      if ($res) {

        return redirect()->back()->with('success', 'Inserted successfully.');
      } else {

        return redirect()->withErrors(['' => 'Somthing went wrong!']);
      }
    }

    return $res;
  }




  public function eduhistory(Request $request)
  {
    $stuId = session('user_id');
    $eduHistory = StudentEduHistory::where('stu_id', $stuId)->first();

    if ($eduHistory) {
      // Update code
      $data = StudentEduHistory::where('stu_id', $stuId);
      $updData = array(
        'country_of_edu' => $request->country_of_edu,
        'qualification' =>  $request->qualification,
        'grading_scheme' =>  implode(', ', $request->input('grading_scheme')), // Assuming grading_scheme is an array field
        'graduated_from' =>  implode(', ', $request->input('graduated_from')), // Assuming graduated_from is an array field
      );

      $res = $data->update($updData);

      if ($res) {

        return redirect()->back()->with('success', 'Updated successfully.');
      } else {

        return redirect()->withErrors(['' => 'Somthing went wrong!']);
      }
    } else {
      // Insert code
      $data = array(
        'stu_id' => $stuId,
        'country_of_edu' => $request->country_of_edu,
        'highest_level_of_edu' => implode(', ', $request->input('highest_level_of_edu')), // Assuming highest_level_of_edu is an array field
        'grading_scheme' =>  implode(', ', $request->input('grading_scheme')), // Assuming grading_scheme is an array field
        'graduated_from' =>  implode(', ', $request->input('graduated_from')), // Assuming graduated_from is an array field
      );

      $res = StudentEduHistory::create($data);


      if ($res) {

        return redirect()->back()->with('success', 'Inserted successfully.');
      } else {

        return redirect()->withErrors(['' => 'Somthing went wrong!']);
      }
    }

    return $res;
  }






  public function schools(Request $request)
  {
    $stuId = session('user_id');
    $schdetails = SchoolDetail::where('stu_id', $stuId)->first();

    if ($schdetails) {
      // Update code
      $data = SchoolDetail::where('stu_id', $stuId);
      $updData = array(

        'country_of_inst' => $request->country_of_inst,
        'name_of_inst' => $request->name_of_inst,
        'level_of_edu' => $request->level_of_edu,
        'primary_lang_instruct' => $request->primary_lang_instruct,
        'attended_inst_from' => $request->attended_inst_from,
        'attended_inst_to' => $request->attended_inst_to,
        'degree_name' => $request->degree_name,
        'graduate_from_inst' => $request->graduate_from_inst,
        'sch_address' => $request->sch_address,
        'sch_city' => $request->sch_city,
        'sch_state' => $request->sch_state,
        'sch_postal_zip' => $request->sch_postal_zip,


      );

      $res = $data->update($updData);

      if ($res) {

        return redirect()->back()->with('success', 'Updated successfully.');
      } else {

        return redirect()->withErrors(['' => 'Somthing went wrong!']);
      }
    } else {
      // Insert code
      $data = array(
        'stu_id' => $stuId,
        'country_of_inst' => $request->country_of_inst,
        'name_of_inst' => $request->name_of_inst,
        'level_of_edu' => $request->level_of_edu,
        'primary_lang_instruct' => $request->primary_lang_instruct,
        'attended_inst_from' => $request->attended_inst_from,
        'attended_inst_to' => $request->attended_inst_to,
        'degree_name' => $request->degree_name,
        'graduate_from_inst' => $request->graduate_from_inst,
        'sch_address' => $request->sch_address,
        'sch_city' => $request->sch_city,
        'sch_state' => $request->sch_state,
        'sch_postal_zip' => $request->sch_postal_zip,


      );



      $res = SchoolDetail::create($data);

      if ($res) {

        return redirect()->back()->with('success', 'Inserted successfully.');
      } else {

        return redirect()->withErrors(['' => 'Somthing went wrong!']);
      }
    }
  }
















  public function visastudydetails(Request $request)
  {
    $stuId = session('user_id');
    $schdetails = VisaPermit::where('stu_id', $stuId)->first();

    if ($schdetails) {
      // Update code
      $data = VisaPermit::where('stu_id', $stuId);
      $updData = array(
        'refused_visa' => is_array($request->input('refused_visa')) ? implode(', ', $request->input('refused_visa')) : $request->input('refused_visa'),
        'visa_you_have' => is_array($request->input('visa_you_have')) ? implode(', ', $request->input('visa_you_have')) : $request->input('visa_you_have'),
        'more_information' => $request->more_information,
      );

      $res = $data->update($updData);

      if ($res) {
        return redirect()->back()->with('success', 'Updated successfully.');
      } else {
        return redirect()->withErrors(['' => 'Something went wrong!']);
      }
    } else {
      // Insert code
      $data = array(
        'stu_id' => $stuId,  // Make sure to provide the 'stu_id' value
        'refused_visa' => is_array($request->input('refused_visa')) ? implode(', ', $request->input('refused_visa')) : $request->input('refused_visa'),
        'visa_you_have' => is_array($request->input('visa_you_have')) ? implode(', ', $request->input('visa_you_have')) : $request->input('visa_you_have'),
        'more_information' => $request->more_information,
      );

      $res = VisaPermit::create($data);

      if ($res) {
        return redirect()->back()->with('success', 'Inserted successfully.');
      } else {
        return redirect()->withErrors(['' => 'Something went wrong!']);
      }
    }
  }
}
