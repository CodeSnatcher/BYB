<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Buddy_Program-Courses</title>
    <style>
        #course_section {
            height: 600px !important;
            overflow: auto !important;
        }
    </style>

    <?php include('includes/header_script.php'); ?>
    <!--





-->
</head>

<body>
    <?php
    require_once "phpScript/db_functions.php";
    $db = new DB_Functions();

    // $price;
    // $duration;

    if(isset($_REQUEST['price_range'])!= "")
    {
        $price = $_REQUEST['price_range'];
    }
    else{
        $price = "";
    }

    if(isset($_REQUEST['duration_year']) != " ")
    {
        $duration = $_REQUEST['duration_year'];
    }
    else{
        $duration = "";
    }

    $courses_array = $db->get_catwisecourse_data($price,$duration,$_REQUEST['id']);

    ?>

    <!-- ***** Header Area Start ***** -->

    <?php include('includes/header.php'); ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner " id="top">
        <img src="./assets/images/engineering_tech.jpg" alt="" class="img-fluid d-block mx-auto">

        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            <h6>Course</h6>

                            <h2> <?php echo $_REQUEST['cat_name']; ?></h2>

                            <div class="main-button-red">
                                <div class="scroll-to-section"><a href="#">Apply Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->


    <section id="engineering" class="my-5">
        <div class="container">
            <h1 class="text-center mb-5"><?php echo $_REQUEST['cat_name']; ?></h1>
            <div class="row">
                <div class="col-lg-3">
                    <form class="categories" method="get" action="course_list.php">
                       
                        <input type="text" hidden name="id" value="<?php echo $_REQUEST['id']; ?>">

                        <h4>Duration</h4>
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



                        <h4 class="my-2">Price Range</h4>
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
                        <h4 class="my-2">Sort By</h4>
                        <div class="overflow-auto" id="country">

                            <div class="form-check mb-2">
                                <input class="form-check-input" checked type="radio" id="(A-Z)">
                                <label class="form-check-label fs-6 text-dark" for="(A-Z)">
                                    Course Name (A to Z)
                                </label>
                            </div>

                        </div>
                            <input type="text" hidden name="cat_name" value="<?php echo $_REQUEST['cat_name']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm w-100 mt-3">Apply</button>

                    </form>
                </div>
                <div class="col-lg-9">
                    <div>
                        <div class="container py-5">
                            <div class="row gap-3 ms-5 mt-sm-0 mt-3">
                                <div class="col-md-12">
                                    <form action="">
                                        <div class="mb-3 d-flex">
                                            <input type="search" class="form-control border border-danger" id="exampleInputEmail1" placeholder="Search" aria-describedby="emailHelp">
                                            <button type="button" class="btn btn-danger btn-sm ms-2">Search</button>
                                        </div>
                                    </form>
                                </div>
                               
                                
                            </div>

                            <div id="course_section" class="row  g-4 py-2 mt-4">

                                <?php

                                for ($i = 0; $i < count($courses_array); $i++) {

                                ?>

                                    <div class="col-md-6">
                                        <div class="card rounded-3 shadow p-3 mb-3">
                                            <div class="text-center">
                                                <div>
                                                    <div class="fs-4 text-danger text-decoration-underline"><?php echo $courses_array[$i]['course_name']; ?></div>
                                                    <!-- <div class="text-secondary" style="font-size: 12px !important;">Windsor, Ontario, CA</div> -->
                                                </div>
                                            </div>
                                            <hr class="my-2 text-danger">
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="fw-bold">Eligibilty </div>
                                                <div><?php echo $courses_array[$i]['course_eligibility']; ?></div>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="fw-bold">Annual Fee </div>
                                                <div><?php echo $courses_array[$i]['anul_fee_without_hos']; ?></div>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="fw-bold">Application Fee</div>
                                                <div><?php echo $courses_array[$i]['reg_fees']; ?></div>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="fw-bold">Duration</div>
                                                <div> <?php echo $courses_array[$i]['course_duration_month']; ?> months / <?php echo $courses_array[$i]['course_duration_sem']; ?> sem / <?php echo $courses_array[$i]['course_duration_year']; ?> yrs</div>
                                            </div>
                                            <hr class="my-2 text-danger">
                                            <a href="<?php echo 'course_detail.php?id=' . $courses_array[$i]['id']; ?>" class="btn btn-outline-primary w-100"> Details <i class="fa-solid fa-plus ms-2 fs-5"></i></a>
                                            <!-- <button class="btn btn-outline-primary w-100" type="button" onclick='getID({{$coursecategory->id}})'> Create Application <i class="fa-solid fa-plus ms-2 fs-5"></i></button> -->
                                            <!-- <button class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#create_application"> Create Application <i class="fa-solid fa-plus ms-2 fs-5"></i></button> -->
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
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