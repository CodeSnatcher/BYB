<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Buddy_Program-university</title>

    <?php include('includes/header_script.php'); ?>

    <style>
        #course_section {
            height: 600px !important;
            overflow: auto !important;
        }
    </style>
</head>

<body style="background-color: #F7F7F7 !important;">
    <?php

    require_once "phpScript/db_functions.php";

    $db = new DB_Functions();

    $courses_array = $db->get_course_data($_GET['id']);

    // $university_details = $db->get_University_detail($_REQUEST['id']);

    // $university_details['name']

    ?>
    <?php include('includes/header.php'); ?>

    <section id="course_details" class="my-5">
        <div class="container">
            <h1 class="text-center my-5">Course Details</h1>
            <div class="card border border-dark w-75 mx-auto" style="border-radius: 20px !important;">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="./assets/images/unides/uni_1.jpg" style="border-radius: 20px !important; height: 200px !important;" class="object-fit-cover">
                </div>
                <div class="card-header bg-white my-3 border-0 px-5">
                    <div class="d-flex gap-5 align-items-center">
                        <?php if ($courses_array['uni_logo'] == NULL) {
                            //   echo '<img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_array[$i]['uni_logo'] . '" class="rounded-3 mt-3 mx-auto" style="width: 100px;" alt="University-logo" />';
                            echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/dummy_logo.png" class="" style="width: 100px;" alt="University-logo" />';
                        } else {
                            echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/' . $courses_array['uni_logo'] . '" class="" style="width: 100px;" alt="University-logo" />';
                        }
                        ?>
                        <div>
                            <h2 class="mb-1"><?php echo $courses_array['uni_name']; ?></h2>
                            <div class="d-flex gap-1">
                                <i class="fa-solid fa-star text-warning "></i>
                                <i class="fa-solid fa-star text-warning "></i>
                                <i class="fa-solid fa-star text-warning "></i>
                                <i class="fa-solid fa-star text-warning "></i>
                                <i class="fa-solid fa-star text-warning "></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body my-3 px-5">
                    <h4 class="card-title fw-bold text-danger mb-3"><?php echo $courses_array['course_name']; ?></h4>
                    <div class="fs-4 mb-3 fw-bold">$<?php echo $courses_array['anul_fee_without_hos']; ?></div>
                    <a href="https://new.bringyourbuddy.in/student/public/login" class="btn btn-primary btn-lg">Apply Now <i class="fa-solid fa-pen-to-square ms-1"></i></a>
                    <button class=" ms-1 btn btn-dark btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Program Summary
                    </button>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                        <?php echo $courses_array['course_description']  ?>
                        </div>
                    </div>
                    <div class="card my-4 p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 my-3 ">
                                    <i class="fa-regular fa-clock fs-1 text-primary"></i>
                                    <div>
                                        <div class="fs-6 text-dark fw-bold"> <?php echo $courses_array['course_duration_month']  ?> months / <?php echo $courses_array['course_duration_sem']  ?> Sem / <?php echo $courses_array['course_duration_year']  ?> Yrs</div>
                                        <div class="fs-5 text-muted">Duration</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 my-3 ">
                                    <i class="fa-solid fa-dollar-sign fs-1 text-warning"></i>
                                    <div>
                                        <div id="annual_fee" class="fs-6 text-dark fw-bold"> $<?php echo $courses_array['anul_fee_with_hos']  ?></div>
                                        <div class="fs-5 text-muted">Annual Fees With Hostel</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 my-3 ">
                                    <i class="fa-solid fa-dollar-sign fs-1 text-warning"></i>
                                    <div>
                                        <div id="annual_fee" class="fs-6 text-dark fw-bold"> $<?php echo $courses_array['anul_fee_without_hos']  ?></div>
                                        <div class="fs-5 text-muted">Annual Fees Without Hostel</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 my-3 ">
                                    <i class="fa-solid fa-dollar-sign fs-1 text-warning"></i>
                                    <div>
                                        <div id="app_fee" class="fs-6 text-dark fw-bold"> $<?php echo $courses_array['reg_fees']  ?></div>
                                        <div class="fs-5 text-muted">Application Fees</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 my-3 ">
                                    <i class="fa-solid fa-location-dot fs-1 text-danger"></i>
                                    <div>
                                        <div id="location" class="fs-6 text-dark fw-bold"><?php echo $courses_array['city']  ?>, <?php echo $courses_array['state']  ?></div>
                                        <div class="fs-5 text-muted">Location</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 my-3 ">
                                    <i class="fa-solid fa-check fs-1 text-success"></i>
                                    <div>
                                        <div id="eligibity" class="fs-6 text-dark fw-bold"><?php echo $courses_array['course_eligibility']  ?></div>
                                        <div class="fs-5 text-muted">Course Eligibilty</div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include('includes/light_footer.php'); ?>
    <?php include('includes/footer_script.php'); ?>
    
</body>



</html>