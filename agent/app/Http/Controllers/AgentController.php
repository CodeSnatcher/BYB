<?php







namespace App\Http\Controllers;



use Illuminate\Support\Facades\DB;



use App\Http\Controllers\Controller;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;



// use Illuminate\Support\Facades\Home;



// use App\Models\managemasterclassModel;



// use App\Models\managemastergstModel;



// use App\Models\managemasterbrandModel;

use App\Models\AgentModel;
use App\Models\Commission_model;
use File;







class AgentController extends Controller



{







    public function agents()



    {



        return view('agent_add');
    }


    public function output($Return = array())
    {
        @header('Cache-Control: no-cache, must-revalidate');
        @header("Content-Type: application/json; charset=UTF-8");
        exit(json_encode($Return));
        die;
    }



    public function addagent(Request $request)



    {

        // Validate the input data



        $validator = Validator::make($request->all(), [



            'email' => 'required|unique:agents,email,NULL,id,del_status,0',

            'phone_no' => 'required|min:10|max:14|unique:agents,phone_no,NULL,id,del_status,0',

            'password' => 'required',

            'business_certificate.*' => 'required|mines:pdf',



        ]);







        if ($request->file('business_logo') != '') {



            $image = time() . '_' . $request->file('business_logo')->getClientOriginalName();



            $path = base_path() . '/public/uploads/business_logo/';



            $request->file('business_logo')->move($path, $image);
        } else {



            $image = "";
        }



        if ($request->file('business_certificate') != '') {



            $businessimage = time() . '_' . $request->file('business_certificate')->getClientOriginalName();



            $path = base_path() . '/public/uploads/business_certificate/';



            $request->file('business_certificate')->move($path, $businessimage);
        } else {



            $businessimage = "";
        }











        $data = array(


            "agent_id" => session('agent_id'),
            "agent_type" => 2,
            "first_name" => $request->first_name,

            "last_name" => $request->last_name,

            "email" => $request->email,

            "password" => password_hash($request->password, PASSWORD_BCRYPT, [10]),

            "phone_no" => $request->phone_no,

            "contact_method" => $request->contact_method,

            "find_out" => $request->find_out,

            "reference" => $request->reference,

            "recruiting_year" => $request->recruiting_year,

            "source_country" => $request->source_country,

            "services" => $request->services,

            "business_logo" => $image,

            "business_certificate" => $businessimage,

            "status" =>  1,

        );







        $res = AgentModel::insert($data);







        if ($res) {



            return redirect()->back()->with('success', 'Submitted successfully.');
        } else {



            return redirect('agent_add')->withErrors(['' => 'Somthing went wrong!']);
        }
    }



    public function view_agents()



    {


        $where = array('del_status' => 0, "agent_id" => session('agent_id'));


        $data = AgentModel::orderBy('id', 'DESC')->where($where)->get();



        return view('agent_view', ['pagedata' => $data]);
    }



    public function view_detail_agent(string $id)



    {



        $data['pagedata'] = AgentModel::where('id', $id)->first();



        return view('agent_view_detail', $data);
    }



    public function updateagentstatus(Request $request)

    {



        $access = AgentModel::where("email", request('email'));



        $data = array(



            "email" => $request->email,

            "status" => $request->status,

        );





        $res = $access->update($data);



        if ($res) {



            return redirect()->back();
        }
    }





    public function editagent(string $id)



    {



        $data['pagedata'] = AgentModel::where('id', $id)->first();



        return view('agent_edit', $data);
    }









    public function updateagent(Request $request)

    {



        $access = AgentModel::where("id", request('id'));





        // Validate the input data

        $validatedData = $request->validate([

            'email' => 'required|unique:agents,email,' . $request->id . ',id,del_status,0',

            'phone_no' => 'required|unique:agents,phone_no,' . $request->id . ',id,del_status,0',

            'business_certificate.*' => 'required|mines:pdf',



        ]);





        if ($request->file('business_logo') != "") {



            $image =  time() . '_' . $request->file('business_logo')->getClientOriginalName();



            $path = base_path() . '/public/uploads/business_logo/';



            $request->file('business_logo')->move($path, $image);





            $data = array(



                "first_name" =>  $request->first_name,

                "last_name" =>  $request->last_name,

                "email" =>  $request->email,

                "phone_no" =>  $request->phone_no,

                "contact_method" =>  $request->contact_method,

                "find_out" =>  $request->find_out,

                "reference" =>  $request->reference,

                "recruiting_year" =>  $request->recruiting_year,

                "source_country" =>  $request->source_country,

                "services" =>  $request->services,

                "business_logo" =>  $image,

                "status" => $request->status,



            );
        } else {

            $data = array(





                "first_name" =>  $request->first_name,

                "last_name" =>  $request->last_name,

                "email" =>  $request->email,

                "phone_no" =>  $request->phone_no,

                "contact_method" =>  $request->contact_method,

                "find_out" =>  $request->find_out,

                "reference" =>  $request->reference,

                "recruiting_year" =>  $request->recruiting_year,

                "source_country" =>  $request->source_country,

                "services" =>  $request->services,

                "status" => $request->status,



            );
        }



        if ($request->file('business_certificate') != "") {



            $busimage =  time() . '_' . $request->file('business_certificate')->getClientOriginalName();



            $path = base_path() . '/public/uploads/business_certificate/';



            $request->file('business_certificate')->move($path, $busimage);





            $data = array(



                "first_name" =>  $request->first_name,

                "last_name" =>  $request->last_name,

                "email" =>  $request->email,

                "phone_no" =>  $request->phone_no,

                "contact_method" =>  $request->contact_method,

                "find_out" =>  $request->find_out,

                "reference" =>  $request->reference,

                "recruiting_year" =>  $request->recruiting_year,

                "source_country" =>  $request->source_country,

                "services" =>  $request->services,

                "business_certificate" =>  $busimage,

                "business_logo" =>  $image,

                "status" => $request->status,



            );
        } else {

            $data = array(





                "first_name" =>  $request->first_name,

                "last_name" =>  $request->last_name,

                "email" =>  $request->email,

                "phone_no" =>  $request->phone_no,

                "contact_method" =>  $request->contact_method,

                "business_logo" =>  $image,

                "find_out" =>  $request->find_out,

                "reference" =>  $request->reference,

                "recruiting_year" =>  $request->recruiting_year,

                "source_country" =>  $request->source_country,

                "services" =>  $request->services,

                "status" => $request->status,


            );
        }







        // Update the data



        $res = $access->update($data);



        if ($res) {



            return redirect('view_agents')->with('success', 'Updated Successfully.');
        } else {



            return redirect()->back()->withErrors(['' => 'Somthing went wrong!']);
        }
    }





    public function deleteagent(Request $request)



    {



        $data = AgentModel::where('id', Request('id'));



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



    public function test()
    {


        $data = AgentModel::orderBy('id', 'DESC')->where('del_status', 0)->first();

        return view('test', ['pagedata' => $data]);
    }


    public function commision()
    {
        $agent_id = session('agent_id');


        $data = AgentModel::orderBy('id', 'DESC')->where(['del_status' => 0, 'id' => $agent_id])->first();
        $history = Commission_model::orderBy('id', 'DESC')->where(['del_status' => 0, 'agent_id' => $agent_id])->first();

        $where = array('commissions.del_status' => 0, 'commissions.status' => 1, 'courses.status' => 1, 'courses.del_status' => 0, 'agents.id' => $agent_id);
        $commission_history = DB::table('commissions')
            ->join('universities', 'commissions.uni_id', '=', 'universities.id')
            ->join('student', 'commissions.stu_id', '=', 'student.id')
            ->join('courses', 'commissions.course_id', '=', 'courses.id')
            ->join('agents', 'commissions.agent_id', '=', 'agents.id')
            ->select('commissions.id as pay_id','student.name as stu_name','universities.uni_name','courses.course_name', 'commissions.paid_amount', 'commissions.commission', 'commissions.created_at as date')
            ->where($where)
            ->get();

        return view('commision', ['partner_data' => $data, 'history_data' => $commission_history]);
    }

    public function subcommision()
    {
        $agent_id = session('agent_id');


        $data = AgentModel::orderBy('id', 'DESC')->where(['del_status' => 0, 'id' => $agent_id])->first();
        $history = Commission_model::orderBy('id', 'DESC')->where(['del_status' => 0, 'agent_id' => $agent_id])->first();

        $where = array('commissions.del_status' => 0, 'commissions.status' => 1, 'courses.status' => 1, 'courses.del_status' => 0, 'agents.agent_id' => $agent_id );
        $commission_history = DB::table('commissions')
            ->join('universities', 'commissions.uni_id', '=', 'universities.id')
            ->join('student', 'commissions.stu_id', '=', 'student.id')
            ->join('courses', 'commissions.course_id', '=', 'courses.id')
            ->join('agents', 'commissions.agent_id', '=', 'agents.id')
            ->select('agents.first_name','commissions.partner_commission','commissions.id as pay_id','student.name as stu_name','universities.uni_name','courses.course_name', 'commissions.paid_amount', 'commissions.commission', 'commissions.created_at as date')
            ->where($where)
            ->get();
        return view('subcommission', ['partner_data' => $data, 'subhistory_data' => $commission_history]);
    }


    public function update_agent_status(Request $request)
    {
        $agent_id = $request->agent_id;
        $status = $request->status;
        $res = AgentModel::where('id', $agent_id)->update(array('status' => $status));
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
}
