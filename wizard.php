<!DOCTYPE html>
<html lang="en" class="lang=" en"">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bringyourbuddy-wizard</title>
    <?php include('includes/header_script.php'); ?>

    <style>
        #container {
            max-width: 80%;
        }

        .step-container {
            position: relative;
            text-align: center;
            transform: translateY(-43%);
        }



        .step-line {
            position: absolute;
            top: 16px;
            left: 50px;
            width: calc(100% - 100px);
            height: 2px;
            background-color: #D93444;
            z-index: -1;
        }

        #multi-step-form {
            overflow-x: hidden;
        }

        label {
            width: 100%;
        }

        .card-input-element {
            display: none;
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


    <?php

    require_once "phpScript/db_functions.php";

    $db = new DB_Functions();


    $coursescat_array = $db->cat_data(32);
    $courses_array = $db->typewisecourses(32);
    $all_courses = $db->getallcourse();
    $university_array = $db->get_table_data('universities');

    // $university_details = $db->get_University_detail($_REQUEST['id']);

    // $university_details['name']

    ?>
    <!-- partial:index.partial.html -->
    <div id="container" class="container mt-5">
        <div class="progress px-1" style="height: 3px;">
            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="step-container d-flex justify-content-between">
            <div class="step-circle" onclick="displayStep(1)"></div>
            <div class="step-circle" onclick="displayStep(2)"></div>
            <div class="step-circle" onclick="displayStep(3)"></div>
            <div class="step-circle" onclick="displayStep(4)"></div>
            <div class="step-circle" onclick="displayStep(5)"></div>
            <div class="step-circle" onclick="displayStep(6)"></div>
            <div class="step-circle" onclick="displayStep(7)"></div>
            <div class="step-circle" onclick="displayStep(8)"></div>
            <div class="step-circle" onclick="displayStep(9)"></div>
        </div>

        <div id="multi-step-form">
            <div class="step step-1">
                <!-- Step 1 form fields here -->
                <div class="my-5">
                    <h2 class="text-center mt-5">
                        Which Degree Are You Intrested In ?
                    </h2>
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-2">
                            <label>
                                <input type="radio" name="crs_type" value="25" class="card-input-element" />

                                <div class="card p-3 card-input">
                                    <img src="./assets/images/deg.png" style=" width:100px !important;" class="mx-auto">
                                    <h6 class="text-center mt-3 text-decoration-none">Diploma</h6>
                                </div>


                            </label>
                        </div>

                        <div class="col-md-2">
                            <label>
                                <input type="radio" name="crs_type" value="20" class="card-input-element" />


                                <div class="card p-3 card-input">
                                    <img src="./assets/images/deg.png" style=" width:100px !important;" class="mx-auto">
                                    <h6 class="text-center mt-3 text-decoration-none">Bachelor Degree</h6>
                                </div>


                            </label>
                        </div>

                        <div class="col-md-2">
                            <label>
                                <input type="radio" name="crs_type" value="23" class="card-input-element" />

                                <div class="card p-3 card-input">
                                    <img src="./assets/images/deg.png" style=" width:100px !important;" class="mx-auto">
                                    <h6 class="text-center mt-3 text-decoration-none">Master Degree</h6>
                                </div>


                            </label>
                        </div>

                        <div class="col-md-2">
                            <label>
                                <input type="radio" name="crs_type" value="0" class="card-input-element" />

                                <div class="card p-3 card-input">
                                    <img src="./assets/images/deg.png" style=" width:100px !important;" class="mx-auto">
                                    <h6 class="text-center mt-3 text-decoration-none">Doctorate Degree</h6>
                                </div>


                            </label>
                        </div>

                    </div>
                </div>


                <button type="button" class="btn btn-primary next-step">Next</button>

            </div>
            <div class="step step-2">
                <div class="my-5">
                    <h2 class="text-center mt-5">
                        Which course would you like to persue ?
                    </h2>
                    <div style="height: 500px; overflow:auto; " class="row justify-content-center mt-5 g-3">

                        <?php
                        for ($i = 0; $i < count($coursescat_array); $i++) {
                        ?>
                            <div class="col-md-2">
                                <label class="h-100">
                                    <input type="radio" name="crs_type" value="<?php echo $coursescat_array[$i]['id']; ?>" class="card-input-element" />

                                    <div class="card p-3 mb-3 h-100 card-input">
                                        <img src="./assets/images/training-course.png" style=" width:80px !important;" class="mx-auto">
                                        <h6 class="text-center mt-3 text-decoration-none "><?php echo $coursescat_array[$i]['course_category']; ?></h6>
                                    </div>

                                </label>

                            </div>
                        <?php

                        }

                        ?>

                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center">
                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                    <button type="button" class="btn btn-primary next-step">Next</button>
                </div>
            </div>
            <div class="step step-3">
                <div class="my-5">
                    <h2 class="text-center mt-5">
                        Have a particular specialization in mind ?
                    </h2>
                    <div style="height: 500px; overflow:auto; " class="row justify-content-center mt-5 g-3">

                        <?php
                        for ($i = 0; $i < count($courses_array); $i++) {
                        ?>
                            <div class="col-auto">

                                <label class="h-100">
                                    <input type="radio" name="crs_spe" value="<?php echo $courses_array[$i]['id']; ?>" class="card-input-element" />

                                    <div class="shadow border p-2 mb-3 text-dark card-input" style="border-radius: 20px !important;"><?php echo $courses_array[$i]['course_name']; ?> <i class="fa-solid fa-arrow-right ms-2 fs-5 mx-auto p-2 rounded-circle border"></i></div>

                                </label>


                            </div>
                        <?php

                        }

                        ?>


                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center">
                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                    <button type="button" class="btn btn-primary next-step">Next</button>
                </div>
            </div>
            <div class="step step-4">
                <div class="my-5">
                    <h2 class="text-center mt-5">
                        How Many Study Hours You Can Give On The Weekly Basis ?
                    </h2>
                    <div class="row justify-content-center mt-5 g-3">

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="crs_spe" value="2-4" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h5 class="text-center mt-3 text-decoration-none ">2-4 Hours</h5>
                                </div>

                            </label>
                        </div>

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="crs_spe" value="4-8" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h5 class="text-center mt-3 text-decoration-none ">4-8 Hours</h5>
                                </div>

                            </label>
                        </div>

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="crs_spe" value="8-16" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h5 class="text-center mt-3 text-decoration-none ">8-16 Hours</h5>
                                </div>

                            </label>
                        </div>

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="crs_spe" value="16+" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h5 class="text-center mt-3 text-decoration-none ">16+ Hours</h5>
                                </div>

                            </label>
                        </div>


                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center">
                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                    <button type="button" class="btn btn-primary next-step">Next</button>
                </div>
            </div>
            <div class="step step-5">

                <div class="my-5">
                    <h2 class="text-center mt-5">
                        Choose The Total Course Fees You Have In mind ?
                    </h2>
                    <div class="row justify-content-center mt-5 g-3">
                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="crs_budget" value=" less than 1 lac" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">Less Than 1 Lakh</h6>
                                </div>

                            </label>
                        </div>

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="crs_budget" value=" 1 to 2.5 lac" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">1 Lakh to 2.5 Lakh</h6>
                                </div>

                            </label>
                        </div>

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="crs_budget" value=" 2.5 to 4.2 lac" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">2.5 Lakh to 4.2 Lakh</h6>
                                </div>

                            </label>
                        </div>

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="crs_budget" value=" 4.2 to 5 lac" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">4.2 Lakh to 6 Lakh</h6>
                                </div>

                            </label>
                        </div>

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="crs_budget" value="6+" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">6 Lakh +</h6>
                                </div>

                            </label>
                        </div>

                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center">
                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                    <button type="button" class="btn btn-primary next-step">Next</button>
                </div>
            </div>
            <div class="step step-6">
                <!-- Step 2 form fields here -->

                <div class="my-5">
                    <h2 class="text-center mt-5">
                        What Is Your Salary Package (Per Annum) ?
                    </h2>
                    <div class="row justify-content-center mt-5 g-3">

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="salary_pack" value="not working" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">Not Working</h6>
                                </div>

                            </label>
                        </div>
                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="salary_pack" value="Less than 3 lac" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">Less than 3 lac</h6>
                                </div>

                            </label>
                        </div>
                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="salary_pack" value="3 lac to 6 lac" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">3 lac to 6 lac</h6>
                                </div>

                            </label>
                        </div>
                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="salary_pack" value="Above 6 lac" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">Above 6 lac</h6>
                                </div>

                            </label>
                        </div>
                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="salary_pack" value="not disclose" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">Do not want to disclose</h6>
                                </div>

                            </label>
                        </div>

                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center">
                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                    <button type="button" class="btn btn-primary next-step">Next</button>
                </div>
            </div>
            <div class="step step-7">
                <!-- Step 2 form fields here -->

                <div class="my-5">
                    <h2 class="text-center mt-5">
                        Your Highest Qualification ?
                    </h2>
                    <div class="row justify-content-center mt-5 g-3">

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="high_qualification" value="Post Graduate" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">Post Graduate</h6>
                                </div>

                            </label>
                        </div>

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="high_qualification" value="Colege Graduate" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">Colege Graduate</h6>
                                </div>

                            </label>
                        </div>


                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="high_qualification" value="Completed 12th" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">Completed 12th</h6>
                                </div>

                            </label>
                        </div>


                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="high_qualification" value="Completed 10th" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">Completed 10th</h6>
                                </div>

                            </label>
                        </div>


                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="high_qualification" value="Diploma Holder" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">Diploma Holder</h6>
                                </div>

                            </label>
                        </div>

                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center">
                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                    <button type="button" class="btn btn-primary next-step">Next</button>
                </div>
            </div>
            <div class="step step-8">
                <!-- Step 2 form fields here -->

                <div class="my-5">
                    <h2 class="text-center mt-5">
                        Percentage Score In Last Qualification ?
                    </h2>
                    <div class="row justify-content-center mt-5 g-3">

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="percentage_score" value="Below 50%" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">Below 50%</h6>
                                </div>

                            </label>
                        </div>

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="percentage_score" value="50% to 80%" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">50% to 80%</h6>
                                </div>

                            </label>
                        </div>

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="percentage_score" value="Above 80%" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">Above 80%</h6>
                                </div>

                            </label>
                        </div>

                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center">
                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                    <button type="button" class="btn btn-primary next-step">Next</button>
                </div>
            </div>
            <div class="step step-9">
                <!-- Step 2 form fields here -->

                <div class="my-5">
                    <h2 class="text-center mt-5">
                        Looking For University Through Which You Can Get Placement / Salaray Hike / Promotions ?
                    </h2>
                    <div class="row justify-content-center mt-5 g-3">

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="looking_placement" value="1" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">YES</h6>
                                </div>

                            </label>
                        </div>

                        <div class="col-md-2">
                            <label class="h-100">
                                <input type="radio" name="looking_placement" value="0" class="card-input-element" />

                                <div class="d-flex align-items-center justify-content-center card p-3 mb-3 h-100 card-input">
                                    <h6 class="text-center mt-3 text-decoration-none ">No</h6>
                                </div>

                            </label>
                        </div>

                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center">
                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                    <button type="button" class="btn btn-primary next-step">Next</button>
                </div>
            </div>
            <div class="step step-10">
                <div class="my-5">
                    <h2 class="text-center mt-5">
                        Lets Get In Touch ?
                    </h2>
                    <div class="card shadow border p-5 m-5 w-50 mx-auto">

                        <h4 class="text-danger text-center">Register Now With Scholarship</h4>
                        <div class="d-flex gap-2 justify-content-center my-2">
                            <button type="button" class="btn btn-primary prev-step">Previous</button>
                            <a href="student_register.php" class="btn btn-danger">Apply</a>
                        </div>



                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- partial -->
    <?php include('includes/footer_script.php'); ?>
    <script>
        var currentStep = 1;
        var updateProgressBar;

        function displayStep(stepNumber) {
            if (stepNumber >= 1 && stepNumber <= 10) {
                $(".step-" + currentStep).hide();
                $(".step-" + stepNumber).show();
                currentStep = stepNumber;
                updateProgressBar();
            }
        }

        $(document).ready(function() {
            $('#multi-step-form').find('.step').slice(1).hide();

            $(".next-step").click(function() {
                if (currentStep < 10) {
                    $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
                    currentStep++;
                    setTimeout(function() {
                        $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
                        $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
                        updateProgressBar();
                    }, 500);
                }
            });

            $(".prev-step").click(function() {
                if (currentStep > 1) {
                    $(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
                    currentStep--;
                    setTimeout(function() {
                        $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
                        $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
                        updateProgressBar();
                    }, 500);
                }
            });

            updateProgressBar = function() {
                var progressPercentage = ((currentStep - 1) / 9) * 100;
                $(".progress-bar").css("width", progressPercentage + "%");
            }
        });
    </script>

</body>

</html>