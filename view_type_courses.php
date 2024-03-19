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
    $uni_id = $_GET['uni_id'];
    $type_id = $_GET['ct'];
    $university_courses = $db->get_type_data($uni_id, $type_id)

    // $university_details = $db->get_University_detail($_REQUEST['id']);

    // $university_details['name']

    ?>
    <?php include('includes/header.php'); ?>

    <section id="vcourse" class="my-5">
        <div class="container">
            <div class="my-5">
                <h1 class="mb-5 text-center">View Courses</h1>
                <div class="row">
                    <div class="col-md-3">
                        <form action="">
                            <div class="card mb-3 shadow">
                                <div class="card-header">
                                    <h4>Duration</h2>
                                </div>
                                <div class="card-body">
                                    <div class="overflow-auto  fix-height" id="country">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" value="1" name="duration_year" id="1_year">
                                            <label class="form-check-label fs-6 text-dark" for="1_year">
                                                1 Year
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" value="2" name="duration_year" id="2_year">
                                            <label class="form-check-label fs-6 text-dark" for="2_year">
                                                2 Year
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" value="3" name="duration_year" id="3_year">
                                            <label class="form-check-label fs-6 text-dark" for="3_year">
                                                3 Year
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" value="4" name="duration_year" id="4_year">
                                            <label class="form-check-label fs-6 text-dark" for="4_year">
                                                4 Year
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" value="5" name="duration_year" id="5_year">
                                            <label class="form-check-label fs-6 text-dark" for="5_year">
                                                5 Year
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" value="6" name="duration_year" id="6_year">
                                            <label class="form-check-label fs-6 text-dark" for="6_year">
                                                6 Year
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 shadow">
                                <div class="card-header">
                                    <h4>Budget</h2>
                                </div>
                                <div class="card-body fs-5">
                                    <div class="overflow-auto  fix-height" id="country">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" value="1000" name="price_range" id="$1,000">
                                            <label class="form-check-label fs-6 text-dark" for="$1,000">
                                                Upto ~$1,000 USD
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" value="2000" name="price_range" id="$2,000">
                                            <label class="form-check-label fs-6 text-dark" for="$2,000">
                                                Upto ~$2,000 USD
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" value="3000" name="price_range" id="$3,000">
                                            <label class="form-check-label fs-6 text-dark" for="$3,000">
                                                Upto ~$3,000 USD
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" value="4000" name="price_range" id="$4,000">
                                            <label class="form-check-label fs-6 text-dark" for="$4,000">
                                                Up to ~$4,000 USD
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" value="5000" name="price_range" id="$5,000">
                                            <label class="form-check-label fs-6 text-dark" for="$5,000">
                                                Up to ~$5,000 USD
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" value="6000" name="price_range" id="$6,000">
                                            <label class="form-check-label fs-6 text-dark" for="$6,000">
                                                Up to ~$6,000 USD
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" value="1000000" name="price_range" id="No Limit">
                                            <label class="form-check-label fs-6 text-dark" for="No Limit">
                                                No Limit
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 shadow">
                                <div class="card-header">
                                    <h4>Sort By</h2>
                                </div>
                                <div class="card-body">

                                    <div class="form-check mb-2">
                                        <input class="form-check-input" checked type="radio" id="(A-Z)">
                                        <label class="form-check-label fs-6 text-dark" for="(A-Z)">
                                            Course Name (A to Z)
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger w-100">Submit</button>
                        </form>
                    </div>
                    <div id="course_section" class="col-md-9">
                        
                        <div class="row">
                            <?php
                            if (count($university_courses) > 0) {


                                for ($i = 0; $i < count($university_courses); $i++) {

                            ?>
                                    <div class="col-md-4 mb-3">
                                        <div class="card border border-dark h-100" style="border-radius: 20px !important;">
                                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                                <img src="./assets/images/unides/uni_1.jpg" style="border-radius: 20px !important;" class="img-fluid" />
                                            </div>
                                            <div class="card-header bg-white">
                                                <div class="d-flex gap-4 align-items-center">
                                                    <?php if ($university_courses[$i]['uni_logo'] == NULL) {
                                                        //   echo '<img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_array[$i]['uni_logo'] . '" class="rounded-3 mt-3 mx-auto" style="width: 100px;" alt="University-logo" />';
                                                        echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/dummy_logo.png" class="" style="width: 50px;" alt="University-logo" />';
                                                    } else {
                                                        echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_courses[$i]['uni_logo'] . '" class="" style="width: 80px;" alt="University-logo" />';
                                                    }
                                                    ?>
                                                    <div>
                                                        <h5 class="mb-1"><?php echo $university_courses[$i]['uni_name']; ?></h5>
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
                                            <div class="card-body">
                                                <h4 class="card-title fw-bold text-danger"><?php echo $university_courses[$i]['course_name']; ?></h4>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="border p-1 text-secondary" style="border-radius: 10px !important;">Eligibility : <?php echo $university_courses[$i]['course_eligibility']; ?></div>
                                                    </div>
                                                    <div class="col-12 my-1">
                                                        <div class="border p-1 text-secondary" style="border-radius: 10px !important;">Application Fee : $<?php echo $university_courses[$i]['reg_fees']; ?></div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="border p-1 text-secondary" style="border-radius: 10px !important;">Duration : <?php echo $university_courses[$i]['course_duration_month']; ?>sem / <?php echo $university_courses[$i]['course_duration_year']; ?>Year</div>
                                                    </div>
                                                </div>

                                                <h5 class="my-3 fw-bold">$<?php echo $university_courses[$i]['anul_fee_without_hos']; ?></h5>
                                                <div class="d-flex gap-2">
                                                    <a href="https://new.bringyourbuddy.in/student/public/login" class="btn btn-primary ">Apply Now <i class="fa-solid fa-pen-to-square ms-1"></i></a>
                                                    <a href="<?php echo 'course_details.php?id=' . $university_courses[$i]['course_id']; ?>" class=" btn btn-danger "> View Course </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                            ?>
                                <div class="text-center fs-1 text-dark">No Courses Availaible At This Moment !!</div>
                            <?php
                            }
                            ?>



                        </div>
                    </div>
                </div>
            </div>
    </section>










    <?php include('includes/light_footer.php'); ?>
    <?php include('includes/footer_script.php'); ?>
    <script>
        $(document).ready(function() {
            $("#btn-slider").owlCarousel({
                items: 6,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                navigation: false,
                navigationText: ["", ""],
                pagination: true,
                autoPlay: true
            });
        });
    </script>
</body>



</html>