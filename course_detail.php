<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="TemplateMo">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">



    <title>Buddy_Program</title>



    <?php include('includes/header_script.php'); ?>

    <!--











-->

</head>



<body>
    <?php

    require_once "phpScript/db_functions.php";

    $db = new DB_Functions();

    $courses_array = $db->get_course_data($_GET['id']);

    // $university_details = $db->get_University_detail($_REQUEST['id']);

    // $university_details['name']

    ?>



    <!-- ***** Header Area Start ***** -->



    <?php include('includes/light_header.php'); ?>





    <!-- ***** Header Area End ***** -->



    <!-- <section id="login" class="my-5 py-5">

        <div class="container">

            <form id="contact" class="shadow" action="" method="post">

                <div class="row">

                    <div class="col-lg-12">

                        <h2>Let's get in touch</h2>

                    </div>

                    <div class="col-lg-4">

                        <fieldset>

                            <input name="name" type="text" id="name" placeholder="YOURNAME...*" required="">

                        </fieldset>

                    </div>

                    <div class="col-lg-4">

                        <fieldset>

                            <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="YOUR EMAIL..." required="">

                        </fieldset>

                    </div>

                    <div class="col-lg-4">

                        <fieldset>

                            <input name="subject" type="text" id="subject" placeholder="SUBJECT...*" required="">

                        </fieldset>

                    </div>

                    <div class="col-lg-12">

                        <fieldset>

                            <textarea name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..." required=""></textarea>

                        </fieldset>

                    </div>

                    <div class="col-lg-12">

                        <fieldset>

                            <button type="submit" id="form-submit" class="button">SEND MESSAGE NOW</button>

                        </fieldset>

                    </div>

                </div>

            </form>

        </div>

    </section> -->





    <section id="course_detail" class="my-5 py-5">

        <div class="container">

            <div class="w-75 mx-auto">

                <div class="card rounded-3 shadow border  p-5">

                    <div class="d-flex gap-4 mt-3">

                        <img src="https://new.bringyourbuddy.in/admin/public/uploads/course_type_icon/book_dummy.png" class="rounded-circle" style="width: 60px;" alt="logo" />

                        <div>

                            <h3 class="text-danger"><?php echo $courses_array['course_name']  ?></h3>

                            <span class="text-secondary fs-short">

                                <i class="fa-solid fa-location-dot"></i>

                                Chandigarh, India

                            </span>

                        </div>
                        
                    </div>
                    <a href="https://new.bringyourbuddy.in/student/public/login" class="btn btn-primary w-25">Appy Now</a></span>

                    <h3 class="mt-5"><?php echo $courses_array['course_trade']  ?></h3>

                    <!-- <a href="" class="btn bg-warning-shade w-25 my-3 ">Check Eligibilty Now</a> -->
                    
                    <div class="card my-2 rounded-3 p-3 w-75 mx-auto">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 my-3 ">
                                    <i class="fa-regular fa-clock fs-1 text-primary"></i>
                                    <div>
                                        <div class="fs-6 text-dark"> <?php echo $courses_array['course_duration_month']  ?> months / <?php echo $courses_array['course_duration_sem']  ?> Sem / <?php echo $courses_array['course_duration_year']  ?> Yrs</div>
                                        <div class="fs-5 text-muted">Duration</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 my-3 ">
                                    <i class="fa-solid fa-dollar-sign fs-1 text-warning"></i>
                                    <div>
                                        <div id="annual_fee" class="fs-6 text-dark"> $765.00</div>
                                        <div class="fs-5 text-muted">Annual Fees</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 my-3 ">
                                    <i class="fa-solid fa-dollar-sign fs-1 text-warning"></i>
                                    <div>
                                        <div id="app_fee" class="fs-6 text-dark"> $765.00</div>
                                        <div class="fs-5 text-muted">Application Fees</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 my-3 ">
                                    <i class="fa-solid fa-location-dot fs-1 text-danger"></i>
                                    <div>
                                        <div id="location" class="fs-6 text-dark">Chandigarh, India</div>
                                        <div class="fs-5 text-muted">Location</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 my-3 ">
                                    <i class="fa-solid fa-check fs-1 text-success"></i>
                                    <div>
                                        <div id="eligibity" class="fs-6 text-dark"><?php echo $courses_array['course_eligibility']  ?></div>
                                        <div class="fs-5 text-muted">Course Eligibilty</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <h3 class="text-center mt-5">Program Summary</h3>
                    <p class="my-3">
                    <?php echo $courses_array['course_description']  ?>
                    </p>

                </div>

            </div>

        </div>

    </section>





    <?php include('includes/light_footer.php'); ?>



    <!-- Scripts -->

    <?php include('includes/footer_script.php'); ?>









</body>



</html>