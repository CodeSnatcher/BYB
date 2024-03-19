<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Buddy_Program-Courses</title>

    <?php include('includes/header_script.php'); ?>
    <!--





-->
</head>

<body>

    <?php
    require_once "phpScript/db_functions.php";
    $db = new DB_Functions();
    $courses_array = $db->get_course_catwise_data($_REQUEST['id']);
    ?>




    <?php include('includes/header.php'); ?>



    <section class="section main-banner " id="top">
        <img src="./assets/images/engineering_tech.jpg" alt="" class="img-fluid d-block mx-auto">

        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            <h6>Course</h6>

                            <h2><?php $_REQUEST['cname'] ?></h2>
                            <!-- <h2>Engineering And Technology</h2> -->

                            <div class="main-button-red">
                                <div class="scroll-to-section"><a href="#">Apply Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="course" class="my-5">
        <div class="container">
            <h1 class="my-5">Engineering & Technology</h1>
            <div class="row my-3">



                <?php

                for ($i = 0; $i < count($courses_array); $i++) {

                ?>




                    <div class="col-md-3">
                        <a href="course_list.php?<?php echo "cid=" . $_REQUEST['id'] . "&tid=" . $courses_array[$i]['id']; ?>">
                            <div class="card rounded-3 shadow p-3 mb-3">
                                <div class="d-flex gap-3 align-items-center">
                                    <!-- <img src="assets/img/SCC_Logo.png" class="rounded-circle border border-dark" style="width: 60px;" alt="Avatar" /> -->
                                    <div>
                                        <div class="fs-6 text-dark"><?php echo $courses_array[$i]['course_name']; ?></div>
                                        <div class="text-secondary" style="font-size: 12px !important;">Windsor, Ontario, CA</div>
                                    </div>
                                </div>
                                <h4 class="text-dark mt-3 mb-0"><?php echo $courses_array[$i]['course_name']; ?></h4>
                                <div class="fs-6 my-2"><?php echo $courses_array[$i]['course_duration_year']; ?> </div>

                            </div>
                        </a>
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

<!-- <div class="card shadow rounded-3 h-100">
    <div class="row align-items-center">
        <div class="col-6">
            <?php
            if ($courses_array[$i]['ctype_icon'] != NULL) {

            ?>
                <img src="admin/public/uploads/course_type_icon/<?php echo $courses_array[$i]['ctype_icon']; ?>" alt="course" class="mt-2">
            <?php } ?>
        </div>
        <div class="col-6">
            <p><?php echo $courses_array[$i]['course_type']; ?></p>
        </div>
    </div>
</div> -->