<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Buddy_Program-University</title>

    <?php include('includes/header_script.php'); ?>
    <style>
        #course-section{
            height: 900px !important;
            overflow-y: auto !important;
        }
    </style>
</head>

<body>
    <?php
    require_once "phpScript/db_functions.php";
    $db = new DB_Functions();
    $params_id = $_GET['id'];
    $university_details = $db->get_University_detail($params_id);
    $university_courses = $db->get_universitycourse_data($params_id)

    ?>

    <!-- ***** Header Area Start ***** -->

    <?php include('includes/header.php'); ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner d-sm-block d-none " id="top" data-section="section1">

        <img src="./assets/images/university.jpg" alt="" class="img-fluid d-block mx-auto">


        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            <h6>University </h6>


                            <h2><?php echo $university_details['uni_name']  ?></h2>
                            <p>Unlock your potential with our online study platform. Access a world of knowledge from the comfort of your home, anytime, anywhere. Engage in interactive courses, collaborate with expert instructors, and achieve your academic and career goals. Join us today and embark on your journey to success through online learning. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->

    <section id="universities" class="my-5 py-5 ">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-3">
                    <?php if ($university_details['uni_logo'] == NULL) {
                        echo '<img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/dummy_logo.png" class="rounded-3 mt-3 ms-auto" style="width: 150px;" alt="University-logo" />';
                    } else {
                        echo '<img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_details['uni_logo'] . '" class="rounded-3 mt-3 ms-auto" style="width: 150px;" alt="University-logo" />';
                    }
                    ?>
                </div>
                <div class="col-md-6">
                    <p class="fs-5">University Code : <span class="text-danger fw-bold"><?php echo $university_details['uni_code']  ?></span></p>
                    <p class="fs-5 my-3">University Name : <span class="text-danger fw-bold"><?php echo $university_details['uni_name']  ?></span></p>

                </div>
                <div class="col-md-3">
                    <a href="<?php echo  $university_details['uni_website']  ?>" class="fs-5 text-primary"><i class="fa-solid fa-globe me-2 mt-2"></i><span class="text-danger"><?php echo  $university_details['uni_website']  ?></span></a>

                    <p><span class="fs-5 text-primary"><i class="fa-solid fa-location-dot text-primary me-2"></i><span class="text-danger">
                                <?php echo $university_details['city']  ?>, <?php echo $university_details['state']  ?>
                            </span></span></p>

                </div>
            </div>
            <h1 class="text-center my-5">Universities <span class="text-danger">Detail</span></h1>
            <div class="my-5">
                <div class="row  shadow rounded-5 border border-1 border-warning b p-2">

                    <div class="col-md-6 border-end border-warning border-1">
                        <div class="table-responsive">
                            <table class="table">

                                <tbody>
                                    <tr>
                                        <th scope="row">University Code : </th>
                                        <td><?php echo $university_details['uni_code']  ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">University Name : </th>
                                        <td><?php echo $university_details['uni_name']  ?></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">University Type : </th>
                                        <td><?php echo $university_details['uni_clg_type']  ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">University website : </th>
                                        <td><?php echo $university_details['uni_website']  ?></td>
                                    </tr>


                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table">

                                <tbody>

                                    <tr>
                                        <th scope="row">City : </th>
                                        <td><?php echo $university_details['city']  ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">District : </th>
                                        <td><?php echo $university_details['distt']  ?></td>

                                    </tr>
                                    <tr>
                                        <th scope="row"> State </th>
                                        <td><?php echo $university_details['state']  ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Country : </th>
                                        <td>N/A</td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section id="course" class="my-5">
        <div class="container">
            <h2 class="text-center my-5">University <span class="text-danger">Courses</span></h2>
            <div id="course-section" class="row" >
              

                <?php

                for ($i = 0; $i < count($university_courses); $i++) {

                ?>

                    <div class="col-md-4">
                        <div class="card rounded-3 shadow p-3 mb-3">
                            <div class="d-flex gap-3 align-items-center">
                                <img src="assets/images/book_dummy.png" class="rounded-circle" style="width: 60px;" alt="Avatar" />
                                <div>
                                    <h5 class="text-dark mt-3 mb-0"><?php echo $university_courses[$i]['course_name']; ?></h5>
                                </div>
                            </div>
                            <table class="my-3">
                                <tr>
                                    <th><span><i class="fa-solid fa-clock text-primary me-1"></i> Duration:</span></th>
                                    <td><?php echo $university_courses[$i]['course_duration_month']; ?> months / <?php echo $university_courses[$i]['course_duration_sem']; ?> sem / <?php echo $university_courses[$i]['course_duration_year']; ?> yrs</td>
                                </tr>
                                <tr>
                                    <th><span><i class="fa-solid fa-check text-danger me-1"></i> Eligibilty:</span></th>
                                    <td><?php echo $university_courses[$i]['course_eligibility']; ?></td>
                                </tr>
                                <tr>
                                    <th><span><i class="fa-solid fa-circle-info text-warning me-1"></i></i> Trade:</span></th>
                                    <td><?php echo $university_courses[$i]['course_trade']; ?></td>
                                </tr>
                            </table>

                            <div class="text-dark fw-bold fs-6">$<?php echo $university_courses[$i]['anul_fee_without_hos']; ?> / Year</div>
                            <div class="d-flex gap-3">
                                <button class="btn btn-warning btn-sm">Apply Now</button>
                                <a href="<?php echo 'course_detail.php?id=' . $university_courses[$i]['id']; ?>" class="btn btn-danger">More</a>
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

</body>



</html>