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
        .step-container {
            position: relative;
            text-align: center;
            transform: translateY(-43%);
        }

        .step-circle {
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            cursor: pointer;
            color: black !important;
            /* Added cursor pointer */
        }

        .step-line {
            position: absolute;
            top: 16px;
            left: 50px;
            width: calc(100% - 100px);
            height: 2px;
            background-color: #007bff;
            z-index: -1;
        }

        #multi-step-form {
            overflow-x: hidden;
        }
    </style>


</head>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('includes.sidebar')
            <!-- / Menu -->


            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('includes.header')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <h3 class="text-center fs-3">Hey {{session('first_name')}}</h3>


                            @foreach($app_data as $key => $adata)
                            @php
                            $key++;
                            @endphp
                            <div class="card bg-white shadow p-2 ">
                                <input type="text" name="" hidden value="{{$adata->app_status}}" id="check">
                                <div class="card-header">
                                    <div class="progress px-1" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="step-container d-flex justify-content-between">



                                        <div id="step_circle-1" class="step-circle text-white bg-white text-dark border border-primary p-1">Application Verification</div>
                                        <div id="step_circle-2" class="step-circle text-white bg-white text-dark border border-primary p-1">Pay Registartion Fee</div>
                                        <div id="step_circle-3" class="step-circle text-white bg-white text-dark border border-primary p-1">Doc Verification</div>
                                        <div id="step_circle-4" class="step-circle text-white bg-white text-dark border border-primary p-1">Offer Letter</div>
                                        <div id="step_circle-5" class="step-circle text-white bg-white text-dark border border-primary p-1">Pay Program Fee</div>
                                        <div id="step_circle-6" class="step-circle text-white bg-white text-dark border border-primary p-1">Admission cum visa letter</div>

                                    </div>
                                </div>

                                <div class="card-body">
                                    <form id="multi-step-form">



                                        <div class="step step-1">

                                            <h3>Application Verification</h3>
                                            <div class="card mx-auto my-3 w-50 mx-auto border ">
                                                <div class="card-header py-1 bg-warning"></div>
                                                <div class="card-body mt-3 d-flex gap-3 align-items-center">
                                                    <i class="fa-solid fa-bell fs-1 text-warning"></i>
                                                    <p class="text-dark">Your request to create application for <span class="text-decoration-underline">{{$adata->course_name}}</span> at <span class="text-decoration-underline">{{$adata->uni_name}}</span> are initiated and in verification stage. We wil notify you soon when your application are approve !!</p>
                                                </div>
                                                <div class="card-footer p-0 m-0"></div>
                                            </div>
                                            <div class="card rounded-3 shadow p-3 mb-3 w-50 mx-auto">
                                                <div class="d-flex gap-3 align-items-center">
                                                    <img src="assets/img/SCC_Logo.png" class="rounded-circle border border-dark" style="width: 60px;" alt="Avatar" />
                                                    <div>
                                                        <div class="fs-6 text-dark " id="univ_name"> {{$adata->uni_name}}</div>

                                                    </div>
                                                </div>
                                                <div class="fs-6 mt-3">Eligibilty : <span id="elig">{{$adata->course_eligibility}}</span></div>
                                                <div class="text-dark mb-0 fs-5" id="crs_name"></div>
                                                <hr class="my-2">

                                                <div class="d-flex justify-content-between mb-3">
                                                    <div class="fw-bold">Campus City</div>
                                                    <div id="loc">{{$adata->city}}</div>
                                                </div>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div class="fw-bold">Annual Fee </div>
                                                    <div>$<span id="anfee">{{$adata->annual_fee}}</span></div>
                                                </div>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div class="fw-bold">Application Fee</div>
                                                    <div>$<span id="rfee">{{$adata->reg_fees}}</span></div>
                                                </div>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div class="fw-bold">Duration</div>
                                                    <div id="dur">{{$adata->month_duration}} months / {{$adata->sem_duration}} semesters / {{$adata->year_duration}} years</div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="step step-2">

                                            <h3>Pay Registartion Fee</h3>
                                            <div class="card mx-auto my-3 w-50 mx-auto border ">
                                                <div class="card-header py-1 bg-success"></div>
                                                <div class="card-body mt-3 d-flex gap-3 align-items-center">
                                                    <i class="fa-solid fa-check fs-1 text-success"></i>
                                                    <p class="text-dark"> !! Congratulation !! Your application for <span class="text-decoration-underline">{{$adata->course_name}}</span> at <span class="text-decoration-underline">{{$adata->uni_name}}</span> are verified successfully, Now you have to pay your program fee ${{$adata->reg_fees}} </p>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="{{route('stripe.checkout',['price' => $adata->reg_fees, 'product' => $adata->course_name, 'email' => $adata->stu_email])}}" class="btn btn-dark border border-primary mt-1 ">Pay ${{$adata->reg_fees}}</a>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="step step-3">

                                            <h3>Document Verification</h3>
                                            <div class="card mx-auto my-3 w-50 mx-auto border ">
                                                <div class="card-header py-1 bg-success"></div>
                                                <div class="card-body mt-3 d-flex gap-3 align-items-center">
                                                    <img src="assets/img/icons/cele.png" alt="">
                                                    <p class="text-dark"> <span class="text-primary fs-3">Hey Buddy</span> you doing well, As you deposited your registeration fee for <span class="text-decoration-underline">{{$adata->course_name}}</span> at <span class="text-decoration-underline">{{$adata->uni_name}}</span> Now you have provide your documents for verification </p>
                                                </div>
                                                <div class="card-footer">
                                                    <h3 class="text-center my-2">Upload Documents</h3>
                                                    <div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">10th Document</label>
                                                            <input type="file" class="form-control" id="exampleFormControlInput1">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">12th Document</label>
                                                            <input type="file" class="form-control" id="exampleFormControlInput1">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Other Document</label>
                                                            <input type="file" class="form-control" id="exampleFormControlInput1">
                                                        </div>
                                                        <button type="submit" class="btn btn-dark form-control">Submit</button>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="step step-4">

                                            <h3>Get Offer Letter</h3>
                                            <div class="card mx-auto my-3 w-50 mx-auto border ">
                                                <div class="card-header py-1 bg-success"></div>
                                                <div class="card-body mt-3 d-flex gap-3 align-items-center">
                                                    <img src="assets/img/icons/cele.png" alt="">
                                                    <p class="text-dark"> <span class="text-primary fs-3">!! Congratulations !!</span> <br> Your are successfully enrolled in Bachelor Of Computer Application at Sviet Get Your Offer Letter Here, BEST OF LUCK </p>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="text-center">
                                                        <div class="btn btn-dark">Download Offer Letter</div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="step step-5">

                                            <h3>Pay Program Fee</h3>
                                            <div class="card mx-auto my-3 w-50 mx-auto border ">
                                                <div class="card-header py-1 bg-success"></div>
                                                <div class="card-body mt-3 d-flex gap-3 align-items-center">
                                                    <img src="assets/img/icons/cele.png" alt="">
                                                    <p class="text-dark"> <span class="text-primary fs-3">!! Congratulations !!</span> <br> Your Documents are verified successfully, Now to get addmission for the <span class="text-decoration-underline">{{$adata->course_name}}</span> at <span class="text-decoration-underline">{{$adata->uni_name}}</span> you need to pay Program Fee {{$adata->annual_fee}}. Once its done then in 2-3 working Day Your Offer letter will available to you </p>
                                                </div>
                                                <div class="card-footer">
                                                    <h3 class="text-center">Choose Payment Method</h3>
                                                    <div class="text-center">
                                                        <a href="{{route('stripe.checkout',['price' => $adata->annual_fee, 'product' => $adata->course_name, 'email' => $adata->stu_email])}}" class="btn btn-dark border border-primary mt-1 ">Pay ${{$adata->annual_fee}}</a>
                                                    </div>
                                                    <h4 class="text-center my-3">OR</h4>
                                                    <div class="text-center">If you Want to Pay <span class="text-primary">By Cash</span> contact Admininstrator</div>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-dark mt-3"><i class="fa-solid fa-phone text-white me-1"></i>Make Call</button>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="step step-6">

                                            <h3>Admission cum Visa Letter</h3>
                                            <div class="card mx-auto my-3 w-50 mx-auto border ">
                                                <div class="card-header py-1 bg-success"></div>
                                                <div class="card-body mt-3 d-flex gap-3 align-items-center">
                                                    <img src="assets/img/icons/cele.png" alt="">
                                                    <p class="text-dark"> <span class="text-primary fs-3">!! Congratulations !!</span> <br> Your are successfully enrolled in Bachelor Of Computer Application at Sviet Get Your Admission Letter Here, BEST OF LUCK </p>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="text-center">
                                                        <div class="btn btn-dark">Download Admission Letter</div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </form>
                                </div>
                            </div>
                            @endforeach


                            <div id="links-btn" class="col-lg-12 col-md-4 order-1">
                                <div class="row justify-content-center align-items-center mt-5">
                                    <div class="col-lg-3 col-md-12 col-6 mb-4">

                                        <a class="btn-content h-100" href="https://bringyourbuddy.in/student/public/profile_eligibilty">
                                            <div class="card text-center btn " style="background: #d14e50 !important;">
                                                <i class="fa fa-calendar-check-o fs-2 mt-2 text-white"></i>
                                                <h5 class="m-3 text-white">Check <br>Eligibilty</h5>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-outline-primary border-white text-white">Check</button>
                                                </div>
                                            </div>
                                        </a>



                                    </div>
                                    <div class="col-lg-3 col-md-12 col-6 mb-4">




                                        <a class="btn-content h-100" href="{{url('programs')}}">
                                            <div class="card text-center btn " style="background: #4b92f2 !important;">
                                                <i class="fa fa-university text-white fs-2 mt-2" aria-hidden="true"></i>
                                                <h5 class="m-3 text-white">Program and <br> Universities</h5>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-outline-primary border-white text-white">Browse Now</button>
                                                </div>
                                            </div>
                                        </a>



                                    </div>
                                    <div class="col-lg-3 col-md-12 col-6 mb-4">

                                        <a class="btn-content h-100" href="{{url('profile')}}">
                                            <div class="card text-center btn " style="background: #010101ab !important;">
                                                <i class="fa fa-user text-white fs-2 mt-2" aria-hidden="true"></i>

                                                <h5 class="m-3 text-white">Complete <br> Profile</h5>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-outline-primary border-white text-white">Start</button>
                                                </div>
                                            </div>
                                        </a>



                                    </div>
                                </div>
                            </div>


                        </div>




                    </div>

                    <!-- Modal -->


                    <!-- Footer -->
                    <footer class="default-footer">
                        @include('includes.footer')
                    </footer>

                </div>

            </div>


            <div class="layout-overlay layout-menu-toggle"></div>
        </div>




    </div>
    @include('includes.footer_script')
    <!-- <script src='https://code.jquery.com/jquery-3.6.4.slim.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js'></script> -->
    <script>
        var currentStep = $('#check').val();
        // var currentStep = $('#check').val();
        var updateProgressBar;

        if ($('#check').val() == 0) {
            currentStep = 1;
        }



        function displayStep(stepNumber) {
            if (stepNumber >= 1 && stepNumber <= 7) {
                $(".step-" + currentStep).hide();
                $(".step-" + stepNumber).show();
                currentStep = stepNumber;
                updateProgressBar();
            }
        }

        $(document).ready(function() {
            $('#multi-step-form').find('.step').slice(1).hide();

            $(window).on("load", function() {
                if (currentStep < 7) {
                    $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
                    setTimeout(function() {
                        $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
                        $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
                        updateProgressBar();
                    }, 500);
                }
            });
            updateProgressBar = function() {
                var progressPercentage = ((currentStep - 1) / 5) * 100;
                $(".progress-bar").css("width", progressPercentage + "%");
            }
        });
    </script>
    <!-- footerscrit -->
</body>

</html>