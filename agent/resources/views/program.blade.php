<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no minimum-scale=1.0, maximum-scale=1.0" />
    <title>Dashboard</title>
    <meta name="description" content="" />
    <!-- headerscript -->
    @include('includes.header_script')
    <style>
        .bg-warning-light {
            background-color: #FEEDC8 !important;
        }

        #course_section {
            height: 700px !important;
            overflow: auto !important;
        }

        .formbold-main-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            /* padding: 48px; */
        }

        .formbold-form-wrapper {
            margin: 0 auto;
            max-width: 550px;
            width: 100%;
            background: white;
        }

        .formbold-steps {
            padding-bottom: 18px;
            margin-bottom: 35px;
            border-bottom: 1px solid #DDE3EC;
        }

        .formbold-steps ul {
            padding: 0;
            margin: 0;
            list-style: none;
            display: flex;
            gap: 40px;
        }

        .formbold-steps li {
            display: flex;
            align-items: center;
            gap: 14px;
            font-weight: 500;
            font-size: 16px;
            line-height: 24px;
            color: #536387;
        }

        .formbold-steps li span {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #DDE3EC;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            font-weight: 500;
            font-size: 16px;
            line-height: 24px;
            color: #536387;
        }

        .formbold-steps li.active {
            color: #07074D;
            ;
        }

        .formbold-steps li.active span {
            background: #6A64F1;
            color: #FFFFFF;
        }

        .formbold-input-flex {
            display: flex;
            gap: 20px;
            margin-bottom: 22px;
        }

        .formbold-input-flex>div {
            width: 50%;
        }

        .formbold-form-input {
            width: 100%;
            /* padding: 13px 22px; */
            border-radius: 5px;
            border: 1px solid #DDE3EC;
            background: #FFFFFF;
            font-weight: 500;
            font-size: 16px;
            color: #536387;
            outline: none;
            resize: none;
        }

        .formbold-form-input:focus {
            border-color: #6a64f1;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold-form-label {
            color: #07074D;
            font-weight: 500;
            font-size: 14px;
            line-height: 24px;
            display: block;
            margin-bottom: 10px;
        }

        .formbold-form-confirm {
            border-bottom: 1px solid #DDE3EC;
            padding-bottom: 35px;
        }

        .formbold-form-confirm p {
            font-size: 16px;
            line-height: 24px;
            color: #536387;
            margin-bottom: 22px;
            width: 75%;
        }

        .formbold-form-confirm>div {
            display: flex;
            gap: 15px;
        }

        .formbold-confirm-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #FFFFFF;
            border: 0.5px solid #DDE3EC;
            border-radius: 5px;
            font-size: 16px;
            line-height: 24px;
            color: #536387;
            cursor: pointer;
            padding: 10px 20px;
            transition: all .3s ease-in-out;
        }

        .formbold-confirm-btn {
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.12);
        }

        .formbold-confirm-btn.active {
            background: #6A64F1;
            color: #FFFFFF;
        }

        .formbold-form-step-1,
        .formbold-form-step-2,
        .formbold-form-step-3 {
            display: none;
        }

        .formbold-form-step-1.active,
        .formbold-form-step-2.active,
        .formbold-form-step-3.active {
            display: block;
        }

        .formbold-form-btn-wrapper {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 25px;
            margin-top: 25px;
        }

        .formbold-back-btn {
            cursor: pointer;
            background: #FFFFFF;
            border: none;
            color: #07074D;
            font-weight: 500;
            font-size: 16px;
            line-height: 24px;
            display: none;
        }

        .formbold-back-btn.active {
            display: block;
        }

        .formbold-btn {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 16px;
            border-radius: 5px;
            padding: 10px 25px;
            border: none;
            font-weight: 500;
            background-color: #6A64F1;
            color: white;
            cursor: pointer;
        }

        .formbold-btn:hover {
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        label {
            width: 100%;
        }



        .card-input:hover {
            cursor: pointer !important;
        }

        .card-input-element:checked+.card-input {
            box-shadow: 0 0 1px 1px #D93444 !important;
        }
    </style>




</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('includes.sidebar')

            <div class="layout-page">
                <!-- Navbar -->
                @include('includes.header')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <!--Cards-->
                            <div class="col-md-4" id="course_section">
                                @foreach($pagedata as $key => $coursecategory)
                                @php
                                $key++;
                                @endphp
                                <div class="card rounded-3 shadow p-3 mb-3">
                                    <div class="d-flex gap-3 align-items-center">
                                        <?php if ($coursecategory->uni_name == NULL) {
                                            //   echo '<img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_array[$i]['uni_logo'] . '" class="rounded-3 mt-3 mx-auto" style="width: 100px;" alt="University-logo" />';
                                            echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/dummy_logo.png" class="" style="width: 50px;" alt="University-logo" />';
                                        } else {
                                            echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/' . $coursecategory->uni_logo . '" class="" style="width: 80px;" alt="University-logo" />';
                                        }
                                        ?>
                                        <div>
                                            <div class="fs-6 text-dark text-decoration-underline">{{$coursecategory -> uni_name}}</div>
                                            <!-- <div class="text-secondary" style="font-size: 12px !important;">Windsor, Ontario, CA</div> -->
                                        </div>
                                    </div>
                                    <div class="fs-6 mt-3">Eligibilty : {{$coursecategory -> course_eligibility}}</div>
                                    <div class="text-dark  mb-0 fs-5  ">{{$coursecategory->course_name}}</div>
                                    <hr class="my-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="fw-bold">Location</div>
                                        <div>{{$coursecategory -> city}}, {{$coursecategory -> state}}</div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="fw-bold">Campus City</div>
                                        <div>{{$coursecategory -> city}}</div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="fw-bold">Annual Fee </div>
                                        <div>{{$coursecategory -> anul_fee_without_hos}}</div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="fw-bold">Application Fee</div>
                                        <div>{{$coursecategory -> reg_fees}}</div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="fw-bold">Duration</div>
                                        <div> {{$coursecategory -> course_duration_month}} months / {{$coursecategory -> course_duration_sem}} sem / {{$coursecategory -> course_duration_year}} yrs</div>
                                    </div>



                                    <button class="btn btn-primary w-100" type="button" onclick='getData({{$coursecategory->course_id}},{{$coursecategory->uni_id}})'>Details</button>

                                    </button>
                                    <hr class="my-2 ">
                                    <button class="btn btn-outline-primary w-100" onclick='course({{$coursecategory->course_id}},{{$coursecategory->uni_id}})' type="button"> Create Application <i class="fa-solid fa-plus ms-2 fs-5"></i></button>

                                </div>

                                @endforeach
                            </div>
                            <!--details-->
                            <div class="col-md-8">
                                <div class="card rounded-3 shadow border p-5">
                                    <div class="d-flex gap-4 mt-3">
                                        <img id="uni_logo" src="assets/img/SCC_Logo.png" class="rounded-circle border border-dark" style="width: 60px;" alt="Avatar" />
                                        <div>
                                            <h5 id="universityName" class="text-dark  mb-2"></h5>
                                            <span class="text-secondary fs-short">
                                                <i class="fa-solid fa-location-dot text-danger"></i>
                                                <span id="uni_loc"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mt-3 fs-4  text-dark " id="mainheading"></div>
                                    <!-- <a href="" class="btn btn-outline-danger w-25 my-3 ">Check Eligibilty</a> -->
                                    <!-- <button class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#create_application"> Create Application</button> -->
                                    <!-- <button class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#create_application"> Create Application <i class="fa-solid fa-plus ms-2 fs-5"></i></button> -->
                                    <div class="row mt-2 ">
                                        <div class="col-md-4">
                                            <button class="btn w-100 text-white " type="button" style="background: #f30603a6 !important;" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                Program Summary
                                            </button>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <button type="button" class=" btn text-white  w-100" style="background: #076ef9bf !important;">Apply Now</button>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class=" btn text-white  w-100" style="background: #000000b8 !important;">Guidlines</button>
                                        </div> -->
                                    </div>
                                    </p>
                                    <div class="collapse" id="collapseExample">
                                        <div id="summary" class="card card-body">
                                            Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                                        </div>
                                    </div>

                                    <div class="card my-2 border   rounded-3 pb-3">
                                        <div class="card-header bg-primary p-3">
                                            <div class="text-center fw-bold fs-4 text-white m-0">COURSE SPECIFICATIONS</div>
                                        </div>
                                        <div class="row m-3 ">
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center gap-2 mb-3 ">
                                                    <i class="fa-regular fa-clock fs-3 text-primary"></i>
                                                    <div>
                                                        <div class="fs-6 text-dark"> <span id="dur_month"></span> months / <span id="dur_sem"></span> Sem / <span id="dur_year"></span> Yrs</div>
                                                        <div class=" fs-6 text-muted">DURATION</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center gap-2 mb-3 ">
                                                    <i class="fa-solid fa-dollar-sign fs-3 text-warning"></i>
                                                    <div>
                                                        <div id="annual_fee" class="fs-6 text-dark"> </div>
                                                        <div class=" fs-6 text-muted">ANNUAL FEE</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center gap-2 mb-3 ">
                                                    <i class="fa-solid fa-dollar-sign fs-2 text-warning"></i>
                                                    <div>
                                                        <div id="app_fee" class="fs-6 text-dark"> </div>
                                                        <div class=" fs-6 text-muted">APPLICATION FEE</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center gap-2 mb-3 ">
                                                    <i class="fa-solid fa-location-dot fs-3 text-danger"></i>
                                                    <div>
                                                        <div id="location" class="fs-6 text-dark"></div>
                                                        <div class=" fs-6 text-muted">LOCATION</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center gap-2 mb-3 ">
                                                    <i class="fa-solid fa-check fs-3 text-success"></i>
                                                    <div>
                                                        <div id="eligibity" class="fs-6 text-dark"></div>
                                                        <div class=" fs-6 text-muted">COURSE ELIGIBILTY</div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="gen_app" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-3" id="exampleModalLabel">Create Application</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="formbold-main-wrapper">

                                    <div class="formbold-form-wrapper">
                                        <form action="{{ url('/') }}/create_application" method="post" enctype="multipart/form-data">
                                            <div class="formbold-steps ">
                                                <ul>
                                                    <li class="formbold-step-menu1 active">
                                                        <span>1</span>
                                                        Select Student
                                                    </li>
                                                    <li class="formbold-step-menu2">
                                                        <span>2</span>
                                                        Student
                                                    </li>
                                                    <li class="formbold-step-menu3">
                                                        <span>3</span>
                                                        Documents
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="formbold-form-step-1 active">

                                                @csrf

                                                @if ($errors->any())

                                                <div class="alert alert-danger">

                                                    <ul>

                                                        @foreach ($errors->all() as $error)

                                                        <li>{{ $error }}</li>

                                                        @endforeach

                                                    </ul>

                                                </div>

                                                @endif

                                                @if(session('success'))

                                                <div class="alert alert-primary">

                                                    {{ session('success') }}

                                                </div>

                                                @endif


                                                <div class="row justify-content-center">
                                                    <div class="col-md-12">
                                                        @foreach($studata as $key => $studata)
                                                        @php
                                                        $key++;
                                                        @endphp
                                                        <label>

                                                            <div class="card p-2 rounded-3 mb-3 border">
                                                                <div class="d-flex gap-3  ">
                                                                    <input type="radio" name="stu_id" onchange="student({{$studata->id}})" id="stu{{$studata->id}}" value="{{$studata->id}}" class="form-check-input
                                                                    
                                                                    " />
                                                                    <div class="text-dark fs-5 text-primary fw-bold">#{{$studata->id}}</div>
                                                                    <div class="text-dark fs-5">{{$studata->name}}</div>
                                                                </div>
                                                            </div>

                                                        </label>

                                                        @endforeach


                                                    </div>
                                                </div>



                                            </div>

                                            <div class="formbold-form-step-2">

                                                <div class="row justify-content-center">
                                                    <div class="col-md-10">
                                                        <div class="over" style="overflow: auto; height: 500!important">
                                                            <div class="card rounded-3 shadow border border-dark p-3 mb-3">
                                                                <div class="d-flex gap-3 align-items-center">
                                                                    <img id="uni_logox" src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/dummy_logo.png" class="rounded-circle border border-dark" style="width: 60px;" alt="Avatar" />
                                                                    <div>
                                                                        <div class="fs-6 text-dark " id="uni_namex"></div>
                                                                        <!-- <div class="text-secondary" style="font-size: 12px !important;">Windsor, Ontario, CA</div> -->
                                                                    </div>
                                                                </div>
                                                                <div class="fs-6 mt-3">Eligibilty : <span id="eligx"></span></div>
                                                                <div class="text-dark mb-0 fs-5" id="crs_namex"></div>
                                                                <hr class="my-2">

                                                                <div class="d-flex justify-content-between mb-3">
                                                                    <div class="fw-bold">Campus City</div>
                                                                    <div id="locx"></div>
                                                                </div>
                                                                <div class="d-flex justify-content-between mb-3">
                                                                    <div class="fw-bold">Annual Fee </div>
                                                                    <div>$<span id="anfeex"></span></div>
                                                                </div>
                                                                <div class="d-flex justify-content-between mb-3">
                                                                    <div class="fw-bold">Application Fee</div>
                                                                    <div>$<span id="rfeex"></span></div>
                                                                </div>
                                                                <div class="d-flex justify-content-between mb-3">
                                                                    <div class="fw-bold">Duration</div>
                                                                    <div id="durx"> </div>
                                                                </div>
                                                                <input type="text" hidden id="frm_course_id" name="course_id" placeholder="course id">
                                                                <input type="text" hidden id="frm_uni_id" name="uni_id" placeholder="university id">

                                                            </div>
                                                            <div class="card mb-4 border border-dark">
                                                                <div class="card-body text-center">
                                                                    <img src="data:image/png;base64,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" alt="avatar" class="rounded-circle img-fluid border" style="width: 100px;">
                                                                    <h5 id="studentxname" class="my-3">xxxxxx</h5>
                                                                    <hr>
                                                                    <div class="d-flex justify-content-between mb-3">
                                                                        <div class="text-dark">Gender</div>
                                                                        <div id="studentxgender"></div>
                                                                    </div>
                                                                    <hr>

                                                                    <div class="d-flex justify-content-between mb-3">
                                                                        <div class="text-dark">Email</div>
                                                                        <div id="studentxemail"></div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="d-flex justify-content-between mb-3">
                                                                        <div class="text-dark">Phone</div>
                                                                        <div id="studentxphone"></div>
                                                                    </div>
                                                                    <hr>
                                                                    <input type="text" hidden name="stu_id" id="frm_stu_id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>

                                                </div>




                                            </div>

                                            <div class="formbold-form-step-3">



                                                <div class="card p-3 rounded-3 border border-primary">


                                                    <div>
                                                        <span class="text-dark">10th Certificate</span>
                                                        <button class="btn btn-dark btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#certificate_10" aria-expanded="false" aria-controls="collapseExample">
                                                            Doc
                                                        </button>
                                                        <div class="collapse" id="certificate_10">
                                                            <div class="card card-body">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#" target="_blank" class="text-dark"> View Doc </a>
                                                                    </li>
                                                                    <li>
                                                                        <button class="btn btn-dark btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#update_certificate_10" aria-expanded="false" aria-controls="collapseExample">
                                                                            Update Document
                                                                        </button>
                                                                        <div class="collapse" id="update_certificate_10">
                                                                            <div class="card card-body">


                                                                                <div class="mb-3">
                                                                                    <label for="exampleFormControlInput1" class="form-label">10th Certificate</label>
                                                                                    <input type="file" class="form-control" id="new10doc" name="10_certificate" id="exampleFormControlInput1" placeholder="name@example.com">
                                                                                </div>
                                                                                <button type="button" onclick='update_10_doc()' class="btn btn-primary form-control">Update</button>

                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="my-3">
                                                        <span class="text-dark">12th Certificate</span>
                                                        <button class="btn btn-dark btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#certificate_12" aria-expanded="false" aria-controls="collapseExample">
                                                            Doc
                                                        </button>
                                                        <div class="collapse" id="certificate_12">
                                                            <div class="card card-body">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#" target="_blank" class="btn btn-dark me-2 btn-sm"> View Doc </a>
                                                                    </li>
                                                                    <li>
                                                                        <button class="btn btn-dark btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#update_certificate_12" aria-expanded="false" aria-controls="collapseExample">
                                                                            Update Document
                                                                        </button>
                                                                        <div class="collapse" id="update_certificate_12">
                                                                            <div class="card card-body">
                                                                                <input type="text" readonly>
                                                                                <form action="">
                                                                                    @csrf
                                                                                    <input type="text" name="stu_id" hidden id="">
                                                                                    <div class="mb-3">
                                                                                        <label for="exampleFormControlInput1" class="form-label">12th Certificate</label>
                                                                                        <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                                                                    </div>
                                                                                    <button type="submit" class="btn btn-primary form-control">Update</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <span class="text-dark">Other Certificate</span>
                                                        <button class="btn btn-dark btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#certificate_other" aria-expanded="false" aria-controls="collapseExample">
                                                            Doc
                                                        </button>
                                                        <div class="collapse" id="certificate_other">
                                                            <div class="card card-body">
                                                                <ul>
                                                                    <li>
                                                                        <a href="{{ asset('uploads/student_document/certificate_other/'.optional($studoc)->certificate_other)}}" target="_blank" class="btn btn-dark me-2 btn-sm"> View Doc </a>
                                                                    </li>
                                                                    <li>
                                                                        <button class="btn btn-dark btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#update_certificate_other" aria-expanded="false" aria-controls="collapseExample">
                                                                            Update Document
                                                                        </button>
                                                                        <div class="collapse" id="update_certificate_other">
                                                                            <div class="card card-body">
                                                                                <input type="text" readonly>
                                                                                <form action="">
                                                                                    @csrf
                                                                                    <input type="text" name="stu_id" hidden id="">
                                                                                    <div class="mb-3">
                                                                                        <label for="exampleFormControlInput1" class="form-label">Other Certificate</label>
                                                                                        <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                                                                    </div>
                                                                                    <button type="submit" class="btn btn-primary form-control">Update</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                            </div>


                                            <div class="formbold-form-btn-wrapper">
                                                <button class="formbold-back-btn">
                                                    Back
                                                </button>

                                                <button class="formbold-btn">
                                                    Next Step
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_1675_1807)">
                                                            <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_1675_1807">
                                                                <rect width="16" height="16" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>


                <!-- Footer -->
                <footer class="default-footer">
                    @include('includes.footer')
                </footer>

                <div class="content-backdrop fade"></div>
            </div>
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <!-- / Layout wrapper -->
    </div>

    @include('includes.footer_script')

    <script>
        function student(stu_id) {


            $.ajax({
                type: "POST",
                url: '{{url("/")}}/getstudentdata',
                data: {
                    'stu_id': $(`#stu${stu_id}`).val(),
                    '_token': '{{csrf_token()}}'
                },
                success: function(response) {

                    $("#studentxname").text(response.data.name);
                    $("#studentxgender").text(response.data.gender);
                    $("#studentxphone").text(response.data.phone_no);
                    $("#studentxemail").text(response.data.email);
                    $("frm_stu_id").val(response.data.id);
                }
            });

        }

        function course(course_id, uni_id) {


            $.ajax({
                type: "POST",
                url: '{{url("/")}}/getcoursedata',
                data: {
                    'course_id': course_id,
                    'uni_id': uni_id,
                    '_token': '{{csrf_token()}}'
                },
                success: function(response) {

                    $("#uni_namex").text(response.data.uni_name);
                    $("#uni_logox").text(response.data.uni_logo);
                    $("#crs_namex").text(response.data.course_name);
                    $("#locx").text(`${response.data.state} ${response.data.city}`);
                    $("#anfeex").text(response.data.anul_fee_without_hos);
                    $("#rfeex").text(response.data.reg_fees);
                    $("#durx").text(`${response.data.dur_month} months/ ${response.data.dur_sem} sem/ ${response.data.dur_year} years`);
                    $("#eligx").text(response.data.course_eligibility);
                    $("#frm_uni_id").val(response.data.uni_id)
                    $("#frm_course_id").val(response.data.course_id)
                    $("#eligx").text(response.data.course_eligibility);
                    $("#uni_logo").attr("src", `https://new.bringyourbuddy.in/admin/public/uploads/university_logo/${response.uni_logo}`);

                    $('#gen_app').modal('show');
                }
            });

        }



        function getData(course_id, uni_id) {

            $.ajax({
                type: "POST",
                url: '{{url("/")}}/getCourseDataCardVise',
                data: {
                    'course_id': course_id,
                    'uni_id': uni_id,
                    '_token': '{{csrf_token()}}'
                },
                success: function(response) {

                    $("#mainheading").text(response.course_name);
                    $("#program_summary").text(response.course_description);
                    $("#dur_month").text(response.course_duration_month);
                    $("#dur_sem").text(response.course_duration_sem);
                    $("#dur_year").text(response.course_duration_year);
                    $("#eligibity").text(response.course_eligibility);
                    $("#summary").text(response.course_description);
                    $("#annual_fee").text(response.anul_fee_without_hos);
                    $("#app_fee").text(response.reg_fees);
                    $("#location").text((response.city) + " " + (response.state));
                    $("#uni_loc").text((response.city) + " " + (response.state));
                    $("#universityName").text(response.uni_name);
                    $("#uni_logo").attr("src", "https://new.bringyourbuddy.in/admin/public/uploads/university_logo/".response.uni_logo);
                }
            });

        }


        function update_10_doc(stu_id) {
            alert($('#new10doc').val())
            $.ajax({
                type: "POST",
                url: '{{url("/")}}/update_10_documents',
                data: {
                    'stu_id': stu_id,
                    'file': $('#new10doc').val(),
                    '_token': '{{csrf_token()}}'
                },
                success: function(response) {

                    Swal.fire({
                        title: "Good job!",
                        text: "Document Updated Succesfully",
                        icon: "success"
                    });

                }
            });
        }

        function getID(course_id, uni_id) {
            // alert(id);

            $.ajax({
                type: "POST",
                url: '{{url("/")}}/getCourseDataCardVise',
                data: {
                    "course_id": course_id,
                    "uni_id": uni_id,
                    "_token": '{{csrf_token()}}'
                },
                success: function(response) {

                    // alert(JSON.stringify(response));

                    document.getElementById("frm_course_id").value = response.cid;
                    document.getElementById("frm_uni_id").value = response.uid;

                    $("#crs_name").text(response.course_name)
                    $("#program_summary").text(response.course_description)
                    $("#dur").text(response.course_duration_month + ' month / ' + response.course_duration_sem + ' sem / ' + response.course_duration_year + ' yrs')
                    $("#elig").text(response.course_eligibility)

                    $("#anfee").text(response.anul_fee_without_hos);
                    $("#rfee").text(response.reg_fees);
                    $("#loc").text((response.city) + " " + (response.state));
                    $("#cloc").text(response.city);
                    $("#univ_name").text(response.uni_name);

                    $('#create_application').modal('show');

                },

            });

        }



        const stepMenuOne = document.querySelector('.formbold-step-menu1')
        const stepMenuTwo = document.querySelector('.formbold-step-menu2')
        const stepMenuThree = document.querySelector('.formbold-step-menu3')

        const stepOne = document.querySelector('.formbold-form-step-1')
        const stepTwo = document.querySelector('.formbold-form-step-2')
        const stepThree = document.querySelector('.formbold-form-step-3')

        const formSubmitBtn = document.querySelector('.formbold-btn')
        const formBackBtn = document.querySelector('.formbold-back-btn')

        formSubmitBtn.addEventListener("click", function(event) {
            event.preventDefault()
            if (stepMenuOne.className == 'formbold-step-menu1 active') {
                event.preventDefault()

                stepMenuOne.classList.remove('active')
                stepMenuTwo.classList.add('active')

                stepOne.classList.remove('active')
                stepTwo.classList.add('active')

                formBackBtn.classList.add('active')
                formBackBtn.addEventListener("click", function(event) {
                    event.preventDefault()

                    stepMenuOne.classList.add('active')
                    stepMenuTwo.classList.remove('active')

                    stepOne.classList.add('active')
                    stepTwo.classList.remove('active')

                    formBackBtn.classList.remove('active')

                })

            } else if (stepMenuTwo.className == 'formbold-step-menu2 active') {
                event.preventDefault()

                stepMenuTwo.classList.remove('active')
                stepMenuThree.classList.add('active')

                stepTwo.classList.remove('active')
                stepThree.classList.add('active')

                formBackBtn.classList.remove('active')
                formSubmitBtn.textContent = 'Submit'
            } else if (stepMenuThree.className == 'formbold-step-menu3 active') {
                document.querySelector('form').submit()
            }
        })
    </script>

</body>

</html>