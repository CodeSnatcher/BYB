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
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">

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

    $courses_array = $db->get_table_data('courses');
    $university_array = $db->get_table_data('universities');

    if (isset($_REQUEST['course_id']) != "") {
        $course_id = $_REQUEST['course_id'];
    } else {
        $course_id = "";
    }

    if (isset($_REQUEST['uni_1']) != "") {
        $uni_1 = $_REQUEST['uni_1'];
    } else {
        $uni_1 = "";
    }

    if (isset($_REQUEST['uni_2']) != "") {
        $uni_2 = $_REQUEST['uni_2'];
    } else {
        $uni_2 = "";
    }

    $compare_result = $db->compare_uni($course_id, $uni_1, $uni_2)

    // $university_details = $db->get_University_detail($_REQUEST['id']);

    // $university_details['name']

    ?>
    <?php include('includes/header.php'); ?>

    <section id="course_details" class="my-5">
        <div class="container">
            <h1 class="text-center my-5">Compare Universities / Colleges</h1>
            <div class="row my-5">
                <div class="col-md-6">
                    <h2 class="fw-bold">
                        Compare University/ College and select as per your need
                    </h2>
                    <p class="my-3
                    ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis provident tempore aspernatur? Enim pariatur quibusdam et tempore commodi nemo reiciendis, quo dolor eligendi repudiandae odit sunt doloribus praesentium temporibus aliquid! comparision on the basis of :</p>
                    <div class="d-flex gap-2 mb-5 align-items-center">
                        <i class="fa-solid fa-check text-success fs-3"></i>
                        <span class="fw-bold fs-4">Application Fee</span>
                    </div>
                    <div class="d-flex gap-2 mb-5 align-items-center">
                        <i class="fa-solid fa-check text-success fs-3"></i>
                        <span class="fw-bold fs-4">Program Fee</span>
                    </div>
                    <div class="d-flex gap-2 mb-5 align-items-center">
                        <i class="fa-solid fa-check text-success fs-3"></i>
                        <span class="fw-bold fs-4">Application Deadline Fee</span>
                    </div>
                    <div class="d-flex gap-2 mb-5 align-items-center">
                        <i class="fa-solid fa-check text-success fs-3"></i>
                        <span class="fw-bold fs-4">Program</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="https://img.freepik.com/free-photo/harvard-university-cambridge-usa_1268-14363.jpg" alt="university" class="img-fluid d-block mx-auto">
                </div>
            </div>

            <div class=" p-2 border border-dark" style="border-radius: 20px !important;">
                <h2 class="text-center ">
                    Select University / Colleges / Program to compare
                </h2>
            </div>
            <form method="get" action="compare_colleges.php" class="w-75 mx-auto my-5">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-3">
                        <select class="form-select h-100 py-3 border border-dark fs-5" name="course_id" aria-label="Default select example">
                            <option selected>Select Program</option>
                            <?php
                            for ($i = 0; $i < count($courses_array); $i++) {
                            ?>
                                <option class="text-dark" class="bg-danger" value="<?php echo $courses_array[$i]['id']; ?>"><?php echo $courses_array[$i]['course_name']; ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select h-100 py-3 border border-dark fs-5" name="uni_1" aria-label="Default select example">
                            <option selected>Select University</option>
                            <?php
                            for ($i = 0; $i < count($university_array); $i++) {
                            ?>
                                <option class="text-dark" value="<?php echo $university_array[$i]['id']; ?>"><?php echo $university_array[$i]['uni_name']; ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select h-100 py-3 border border-dark fs-5" name="uni_2" aria-label="Default select example">
                            <option selected>Select University</option>
                            <?php
                            for ($i = 0; $i < count($university_array); $i++) {
                            ?>
                                <option class="text-dark" value="<?php echo $university_array[$i]['id']; ?>"><?php echo $university_array[$i]['uni_name']; ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-danger py-3">COMPARE</button>
                    </div>
                </div>
            </form>

            <h2 class="text-center my-3 fw-bold">Compared Result</h2>

            <div class="row justify-content-center g-3">
                
                <?php
                for ($i = 0; $i < count($compare_result); $i++) {
                ?>


                    <div class="col-md-3">
                        <div class="card border border-dark h-100">
                            <div class="mx-2 card-body">
                                <div class="d-flex gap-4 align-items-center">
                                    <?php if ($compare_result[$i]['uni_logo'] == NULL) {
                                        //   echo '<img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_array[$i]['uni_logo'] . '" class="rounded-3 mt-3 mx-auto" style="width: 100px;" alt="University-logo" />';
                                        echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/dummy_logo.png" class="" style="width: 50px;" alt="University-logo" />';
                                    } else {
                                        echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/' . $compare_result[$i]['uni_logo'] . '" class="" style="width: 80px;" alt="University-logo" />';
                                    }
                                    ?>
                                    <div>
                                        <h5 class="card-title my-2 "><?php echo $compare_result[$i]['uni_name']; ?></h5>
                                    </div>
                                </div>
                                <p class="text-muted ">
                                    <?php echo $compare_result[$i]['course_name']; ?>
                                </p>
                                <p class="h2 fw-bold text-danger">$<?php echo $compare_result[$i]['anul_fee_without_hos']; ?></p>
                                <a href="#" class="btn btn-dark d-block mb-2 mt-3 text-capitalize">Apply Now</a>
                            </div>
                            <div class="card-footer">
                                <p class="text-uppercase fw-bold" style="font-size: 12px;">What's included</p>
                                <ol class="list-unstyled mb-0 px-4">
                                    <p class="my-3 fw-bold text-muted text-center">
                                    </p>
                                    <li class="mb-3 fs-5">
                                        <i class="fas fa-check text-success me-3"></i><small>Bachelor Of Computer Application (BCA)</small>
                                    </li>
                                    <li class="mb-3 fs-5">
                                        <i class="fas fa-check text-success me-3"></i><small>Application Fee : <b>$<?php echo $compare_result[$i]['reg_fees']; ?></b></small>
                                    </li>
                                    <li class="mb-3 fs-5">
                                        <i class="fas fa-check text-success me-3"></i><small>Application Deadline: <b>March, 2024</b></small>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>



                <?php
                }

                ?>
            </div>







        </div>
    </section>


    <?php include('includes/light_footer.php'); ?>
    <?php include('includes/footer_script.php'); ?>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>

</body>



</html>