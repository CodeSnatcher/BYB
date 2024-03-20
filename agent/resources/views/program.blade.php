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
                                    <button class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"> Create Application <i class="fa-solid fa-plus ms-2 fs-5"></i></button>

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

                    $("#anfee").text(response.anul_fee_without_hos)
                    $("#rfee").text(response.reg_fees)
                    $("#loc").text((response.city) + " " + (response.state))
                    $("#cloc").text(response.city)
                    $("#univ_name").text(response.uni_name)

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