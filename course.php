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

    <style>
        .bg-blur {
            background-color: rgba(0, 0, 0, 0.603) !important;
        }
    </style>

</head>



<body>

    <?php

    require_once "phpScript/db_functions.php";

    $db = new DB_Functions();

    $courses_array = $db->get_table_data('course_category');

    // $university_details = $db->get_University_detail($_REQUEST['id']);

    // $university_details['name']

    ?>



    <!-- ***** Header Area Start ***** -->



    <?php include('includes/header.php'); ?>

    <!-- ***** Header Area End ***** -->



    <!-- ***** Main Banner Area Start ***** -->

    <section class="section main-banner" id="top" data-section="section1">

        <img src="./assets/images/course_banner.jpg" alt="" class="img-fluid d-block mx-auto">



        <div class="video-overlay header-text">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="caption">

                            <h6>Programs</h6>



                            <h2>Program Offered By Us</h2>

                            <p>Our ultimate gateway to international education and career opportunities! We offer an extensive array of courses tailored to
                                broaden your horizons and shape your future. Our platform is dedicated to providing students with comprehensive support,
                                including:
                                * Platform to study abroad
                                * Paid internships
                                * Part-time job opportunities while studying
                                * Scholarships ranging from 50% to 100%.





                            </p>

                            <div class="main-button-red">

                                <div class="scroll-to-section"><a href="#courses">View More</a></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ***** Main Banner Area End ***** -->



    <section id="courses" class="my-5 py-5 ">

        <div class="container mx-auto">

            <h1 class="text-center mb-5 fs-2">Our <span class="text-danger">Program</span></h1>

            <div class="row">





                <?php



                for ($i = 0; $i < count($courses_array); $i++) {



                ?>



                    <div class="col-md-3">

                        <a href="course_list.php?id=<?php echo $courses_array[$i]['id'] . "&cat_name=" . urlencode($courses_array[$i]['course_category']); ?>">
                            <div class="relative flex flex-col rounded-xl bg-white border text-gray-700 shadow-md mb-5">
                                <div class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600">
                                    <img src="admin/public/uploads/ctgr_logo/<?php echo $courses_array[$i]['cate_logo']; ?>" height="200" alt="course" class="object-fit-cover position-relative">
                                </div>
                                <div class="p-4">
                                    <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased text-center">
                                        <?php echo $courses_array[$i]['course_category']; ?>
                                    </h5>
                                </div>

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
    <script src="https://cdn.tailwindcss.com"></script>



</body>







</html>