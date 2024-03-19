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
    <!--





-->
</head>

<body>
    <?php
    require_once "phpScript/db_functions.php";
    $db = new DB_Functions();
    $university_array = $db->get_table_data('universities');
    // $university_details = $db->get_University_detail($_REQUEST['id']);
    // $university_details['name']
    ?>
    <!-- ***** Header Area Start ***** -->

    <?php include('includes/header.php'); ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" id="top" data-section="section1">

        <img src="assets/images/university-1.jpg" alt="" class="img-fluid d-block mx-auto">


        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            <h6>Hello Students</h6>

                            <h2>Welcome to Buddy-Program</h2>
                            <p>Get Started With Buddy-Program:

                                "A dynamic initiative designed to foster connections, support, and camaraderie among our community members. Whether
                                you're a newcomer seeking guidance or a seasoned participant ready to share experiences, our program offers a platform
                                for meaningful interactions and mutual growth.

                                Join us in this collaborative journey where individuals from diverse backgrounds come together to learn, share insights, and
                                build lasting relationships. Our Buddy Program aims to create an inclusive space where support thrives and friendships
                                flourish. Discover the power of partnership and the joy of helping each other succeed.

                                Experience the strength of unity and the warmth of companionship within our vibrant community. Together, let's embark on a
                                journey enriched by shared experiences and supportive connections through our Buddy Program."

                            </p>
                            <div class="main-button-red">
                                <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->

    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-service-item owl-carousel">




                        <?php

                        for ($i = 0; $i < count($university_array); $i++) {

                        ?>

                            <section>
                                <div class=" py-5">
                                    <div class="row justify-content-center">
                                        <div class="">
                                            <div class="card text-black">

                                                <?php if ($university_array[$i]['uni_logo'] == NULL) {
                                                    //   echo '<img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_array[$i]['uni_logo'] . '" class="rounded-3 mt-3 mx-auto" style="width: 100px;" alt="University-logo" />';
                                                    echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/dummy_logo.png" class="rounded-3 mt-3 mx-auto" style="width: 100px;" alt="University-logo" />';
                                                } else {
                                                    echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_array[$i]['uni_logo'] . '" class="rounded-3 mt-3 mx-auto" style="width: 100px;" alt="University-logo" />';
                                                }
                                                ?>

                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <h5 class="card-title"><?php echo $university_array[$i]['uni_name']; ?></h5>
                                                    </div>
                                                    <div>

                                                        <div class="d-flex my-2 justify-content-between">
                                                            <span><i class="fa-solid fa-location-dot me-2 text-danger"></i>Location : </span><span><?php echo $university_array[$i]['city']; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                                <span><i class="fa-solid fa-globe text-primary me-2"></i>website : </span><span><?php echo $university_array[$i]['uni_website']; ?></span>
                                                            </div>
                                                    <div>

                                                        <!-- <div class="d-flex justify-content-between">
                                                            <span><i class="fa-solid fa-phone me-2 text-success"></i>Mobile : </span><span><?php echo $university_array[$i]['uni_phone']; ?></span>
                                                        </div> -->
                                                    </div>
                                                    <div class="text-center">
                                                        <a href="university_detail.php?id=<?php echo $university_array[$i]['id']; ?>" class="btn btn-danger">View details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                        <?php
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our_universities" id="meetings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Top Universities</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories">
                        <h4>Filters</h4>
                        <h4>Country</h4>
                        <div class="overflow-auto  fix-height" id="country">
                            <ul>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Hungary">
                                        <label class="form-check-label" for="Hungary">
                                            Hungary
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="India">
                                        <label class="form-check-label" for="India">
                                            India
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Malaysia">
                                        <label class="form-check-label" for="Malaysia">
                                            Malaysia
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Poland">
                                        <label class="form-check-label" for="Poland">
                                            Poland
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Turkey">
                                        <label class="form-check-label" for="Turkey">
                                            Turkey
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="UAE">
                                        <label class="form-check-label" for="UAE">
                                            UAE
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="UAE">
                                        <label class="form-check-label" for="UAE">
                                            UAE
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="UAE">
                                        <label class="form-check-label" for="UAE">
                                            UAE
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="UAE">
                                        <label class="form-check-label" for="UAE">
                                            UAE
                                        </label>
                                    </div>
                                </li><br>
                            </ul>
                        </div>

                        <h4 class="my-2">Price Range</h4>
                        <div class="overflow-auto  fix-height" id="country">
                            <ul>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Hungary">
                                        <label class="form-check-label" for="Hungary">
                                            1000 - 10000
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="India">
                                        <label class="form-check-label" for="India">
                                            10000 - 20000
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Malaysia">
                                        <label class="form-check-label" for="Malaysia">
                                            20000 - 30000
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Poland">
                                        <label class="form-check-label" for="Poland">
                                            30000 - 40000
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Turkey">
                                        <label class="form-check-label" for="Turkey">
                                            40000 - 50000
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="UAE">
                                        <label class="form-check-label" for="UAE">
                                            500000 - 60000
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="UAE">
                                        <label class="form-check-label" for="UAE">
                                            60000 - 70000
                                        </label>
                                    </div>
                                </li><br>

                            </ul>
                        </div>
                        <h4 class="my-3">Category</h4>
                        <div class="overflow-auto  fix-height" id="country">
                            <ul>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Paramedical_Science">
                                        <label class="form-check-label" for="Hungary">
                                            Paramedical Science
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Engineering and Technology">
                                        <label class="form-check-label" for="India">
                                            Engineering and Technology
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Diploma">
                                        <label class="form-check-label" for="Malaysia">
                                            Diploma
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Bachelor_Courses">
                                        <label class="form-check-label" for="Poland">
                                            Bachelor Courses
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Master Courses">
                                        <label class="form-check-label" for="Turkey">
                                            Master Courses
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Management_commerce">
                                        <label class="form-check-label" for="UAE">
                                            Management and Commerce
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Journalism">
                                        <label class="form-check-label" for="UAE">
                                            Journalism and Mass Communication
                                        </label>
                                    </div>
                                </li><br>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Management">
                                        <label class="form-check-label" for="UAE">
                                            Management
                                        </label>
                                    </div>
                                </li><br>

                            </ul>
                        </div>
                        <div class="main-button-red">
                            <a href="meetings.html">Apply</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div>
                        <div class="container py-5">
                            <div class="row gap-3 ms-5 mt-sm-0 mt-3">
                                <div class="col-md-3">
                                    <form action="">
                                        <div class="mb-3 d-flex">
                                            <input type="search" class="form-control border border-danger" id="exampleInputEmail1" placeholder="Search" aria-describedby="emailHelp">
                                            <button type="button" class="btn btn-danger btn-sm">Search</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select border border-danger" aria-label="Large select example">
                                        <option selected>Sort By</option>
                                        <option value="Vehicle type (A to Z)">Vehicle type (A to Z)</option>
                                        <option value="Vehicle type (Z to A)">Vehicle type (Z to A)</option>

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <nav aria-label="...">
                                        <ul class="pagination pagination-circle text-danger">
                                            <li class="page-item">
                                                <a class="page-link text-danger">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link text-danger" href="#">1</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2 <span class="visually-hidden">(current)</span></a>
                                            </li>
                                            <li class="page-item"><a class="page-link text-danger" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link text-danger" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <div id="university_container" class="my-5">


                                <?php

                                for ($i = 0; $i < count($university_array); $i++) {

                                ?>




                                    <div class="row justify-content-center mb-3">
                                        <div class="col-md-12 col-xl-10">
                                            <div class="card shadow-0 border rounded-3">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                            <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                                                <?php if ($university_array[$i]['uni_logo'] == NULL) {
                                                                    //  echo '<img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_array[$i]['uni_logo'] . '" class="rounded-3 mt-3 mx-auto" style="width: 100px;" alt="University-logo" />';
                                                                    echo '<img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/dummy_logo.png" class="rounded-3 mt-3 mx-auto" style="width: 100px;" alt="University-logo" />';
                                                                } else {
                                                                    echo '<img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_array[$i]['uni_logo'] . '" class="rounded-3 mt-3 mx-auto" style="width: 100px;" alt="University-logo" />';
                                                                }
                                                                ?>
                                                                <a href="#!">
                                                                    <div class="hover-overlay">
                                                                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 col-xl-6">
                                                            <h5><?php echo $university_array[$i]['uni_name']; ?></h5>
                                                            <div class="d-flex flex-row">
                                                                <div class="text-danger mb-1 me-2">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                                <span>310</span>
                                                            </div>


                                                            <div class="d-flex justify-content-between">
                                                                <!-- <span><i class="fa-solid fa-phone me-2 text-success"></i>Mobile : </span><span><?php echo $university_array[$i]['uni_phone']; ?></span> -->
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <span><i class="fa-solid fa-location-dot me-2 text-danger"></i>Location : </span><span><?php echo $university_array[$i]['city']; ?></span>
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <span><i class="fa-solid fa-globe text-primary me-2"></i>website : </span><span><?php echo $university_array[$i]['uni_website']; ?></span>
                                                            </div>
                                                            <div>
                                                                <a href="university_detail.php?id=<?php echo $university_array[$i]['id']; ?>" class="btn btn-danger w-100">View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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