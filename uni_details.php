<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Buddy_Program - Course Finder</title>

    <?php include('includes/header_script.php'); ?>
    <style>
        #course_section {
            height: 600px !important;
            overflow: auto !important;
        }
    </style>


</head>

<body>

    <?php

    require_once "phpScript/db_functions.php";

    $db = new DB_Functions();

    if (isset($_REQUEST['price_range']) != "") {
        $price = $_REQUEST['price_range'];
    } else {
        $price = "";
    }

    if (isset($_REQUEST['duration_year']) != "") {
        $duration = $_REQUEST['duration_year'];
    } else {
        $duration = "";
    }

    if (isset($_REQUEST['search']) != "") {
        $search = $_REQUEST['search'];
    } else {
        $search = "";
    }

    if (isset($_REQUEST['category']) != "") {
        $cat_id = $_REQUEST['category'];
    } else {
        $cat_id = "";
    }

    $uni_id = $_REQUEST['id'];
    $uni_data = $db->get_University_detail($uni_id);
    $university_courses = $db->getallcoursedata($price, $duration, $search, $cat_id);
    $all_courses = $db->get_table_data('course_category');

    // $university_details = $db->get_University_detail($_REQUEST['id']);

    // $university_details['name']

    ?>


    <?php include('includes/header.php'); ?>

    <section id="uni_details" class="my-5 py-3 card w-75 mx-auto rounded-3 border shadow">
        <div class="container">
            <div class="my-5"></div>
            <div class="d-flex gap-3 align-items-center">

                <?php if ($uni_data['uni_logo'] == NULL) {
                    echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/dummy_logo.png" class="rounded-3 mt-3" style="width: 200px;" alt="University-logo" />';
                } else {
                    echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/' . $uni_data['uni_logo'] . '" class="rounded-3 mt-3 " style="width: 200px;" alt="University-logo" />';
                }
                ?>
                <div class="">
                    <h1><?php echo $uni_data['uni_name']  ?></h1>
                    <div class="mt-2"> <?php echo $uni_data['city']  ?>, <?php echo $uni_data['state']  ?></div>
                </div>
                <div class="btn border rounded-3 fs-4 p-3 py-2 text-text shadow">#<?php echo $uni_data['uni_rank']  ?></div>


            </div>
            <div class="d-flex gap-2 my-3">
                <button class="btn btn-primary rounded-3">Apply Now</button>
                <button class="btn btn-dark rounded-3">Download Brochure</button>
            </div>

            <hr>
            <div class="my-3">
                <h2 class="my-3">About <?php echo $uni_data['uni_name']  ?></h2>
                <p class="">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt animi, sunt hic deleniti ea officiis nulla eius cumque voluptas ratione recusandae dolore tempora perferendis beatae debitis perspiciatis doloremque? Aliquam placeat, ipsum esse quisquam quia odio beatae officia, veritatis numquam aut ipsam ad nam ipsa voluptates rem veniam unde tempore iste itaque quas omnis iure animi officiis. Illum eaque obcaecati sunt.
                </p>
            </div>
            <div class="my-3">
                <h2 class="my-3">Courses Offered By US <?php echo $uni_data['uni_name']  ?></h2>
                <div class="my-5">
                    <div class="row justify-content-center">
                        <div id="btn-slider" class="owl-carousel h-100">
                            <?php
                            for ($i = 0; $i < count($all_courses); $i++) {
                            ?>
                                <div class="col-8">
                                    <div class="post-slide">
                                        <div class="card p-3">
                                            <img src="./assets/images/training-course.png" style=" width:80px !important;" class="mx-auto">
                                            <h6 class="text-center mt-3"><?php echo $all_courses[$i]['course_category']; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }

                            ?>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <form method="get" action="course_finder.php">
                                <div class="card border shadow p-3 rounded-3 mb-2">

                                    <?php if (count($university_courses) > 0) : ?>
                                        <h4>Found <span class="text-danger"><?php echo count($university_courses) ?></span> Courses</h4>
                                    <?php else : ?>
                                        <h4>No Courses Founded</h4>
                                    <?php endif; ?>
                                </div>
                                <div class="card mb-3 shadow">
                                    <div class="card-header">
                                        <h4>Category</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="overflow-auto  fix-height" id="country">
                                            <?php
                                            for ($i = 0; $i < count($all_courses); $i++) {
                                            ?>

                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" value="<?php echo $all_courses[$i]['id']; ?>" name="category" id="<?php echo $all_courses[$i]['course_category']; ?>">
                                                    <label class="form-check-label fs-6 text-dark" for="<?php echo $all_courses[$i]['course_category']; ?>">
                                                        <?php echo $all_courses[$i]['course_category']; ?>
                                                    </label>
                                                </div>
                                            <?php
                                            }

                                            ?>

                                        </div>
                                    </div>
                                </div>
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
                        <div class="col-md-9">
                            <form method="get" action="course_finder.php">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class=" mb-3">
                                            <input type="text" name="search" class="form-control py-4 border shadow" placeholder="Search Your Desired Courses...">
                                        </div>
                                    </div>
                                    <div class="col-md-2"><button type="submit" class="btn btn-danger shadow py-4 ">Search</button></div>
                                </div>
                            </form>
                            <div id="course_section">

                                <div class="row g-3">

                                    <?php
                                    if (count($university_courses) > 0) {


                                        for ($i = 0; $i < count($university_courses); $i++) {

                                    ?>
                                            <div class="col-md-6 mb-3">
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
                                                            <a href="https://new.bringyourbuddy.in/student/public/login" class="btn btn-primary">Apply Now <i class="fa-solid fa-pen-to-square ms-1"></i></a>
                                                            <a href="<?php echo 'course_details.php?id=' . $university_courses[$i]['course_id']; ?>" class=" btn btn-danger"> View Course </a>
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
                                        <div class="text-center fs-1 text-dark mt-5">No Courses Availaible At This Moment !!</div>
                                    <?php
                                    }
                                    ?>



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