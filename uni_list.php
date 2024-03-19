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

</head>

<body>
    <?php

    require_once "phpScript/db_functions.php";

    if (isset($_REQUEST['search']) != "") {
        $search = $_REQUEST['search'];
    } else {
        $search = "";
    }

    $db = new DB_Functions();
    $all_courses = $db->getallcourse();
    $university_array = $db->get_uni_data($search);

    // $university_details = $db->get_University_detail($_REQUEST['id']);

    // $university_details['name']

    ?>
    <?php include('includes/header.php'); ?>

    <section id="uni_list" class="my-5">
        <div class="container">
            <h1 class="my-5 text-center">University List</h1>
            <form method="get" action="uni_list.php">
                <div class="row justify-content-center mb-3">
                    <div class="col-md-10">
                        <div class=" mb-3">
                            <input type="text" name="search" class="form-control py-4 border shadow ms-5" placeholder="Search Your Desired Courses...">
                        </div>
                    </div>
                    <div class="col-md-2"><button type="submit" class="btn btn-danger shadow py-4 ">Search</button></div>
                </div>
            </form>
            <div class="table-responsive my-3">
                <table class="table table-striped" style="height: 600px !important; overflow:auto !important;">
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">College</th>
                            <th scope="col">Application Deadline</th>
                            <th scope="col">Application Fee</th>
                            <th scope="col">Apply</th>

                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        if(count($university_array) > 0)
                        {

                        for ($i = 0; $i < count($university_array); $i++) {

                        ?>

                            <tr>
                                <td>
                                    <div class="btn btn-success rounded-5 text-white">
                                        #<?php echo $university_array[$i]['uni_rank']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-3 align-items-center">
                                        <?php if ($university_array[$i]['uni_logo'] == NULL) {
                                            //   echo '<img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_array[$i]['uni_logo'] . '" class="rounded-3 mt-3 mx-auto" style="width: 100px;" alt="University-logo" />';
                                            echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/dummy_logo.png" class="" style="width: 50px;" alt="University-logo" />';
                                        } else {
                                            echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_array[$i]['uni_logo'] . '" class="" style="width: 50px;" alt="University-logo" />';
                                        }
                                        ?>
                                        <div>
                                            <h6><?php echo $university_array[$i]['uni_name']; ?></h6>
                                            <div class="text-muted"><?php echo $university_array[$i]['state']; ?>, <?php echo $university_array[$i]['city']; ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td>19 June - 29 Jul 2024</td>
                                <td>₹209,550</td>
                                <td><a href="uni_details.php?id=<?php echo $university_array[$i]['id']; ?>" class="text-primary mx-auto fw-bold mt-2">Apply Now <i class="fa-solid fa-pen-to-square ms-1"></i></a></td>
                            </tr>

                        <?php
                        }
                        }
                        else{
                        ?>
                        <tr><h2 class="text-center mt-5">No University Availaible</h2></tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section id="top-colleges" class="my-5">
        <div class="container">
            <h2 class="my-5">Top Courses</h2>

            <div class="row">
                <div id="uni-slider" class="owl-carousel d-flex gap-3">
                    <?php
                    for ($i = 0; $i < count($university_array); $i++) {
                    ?>
                        <div class="col-md-11">
                            <div class="post-slide">
                                <div class="card border border-dark h-100" style="border-radius: 20px !important;">
                                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                        <img src="./assets/images/unides/uni_1.jpg" class="img-fluid" style="border-radius: 20px !important;" />
                                    </div>
                                    <div class="card-header bg-white">
                                        <div class="d-flex gap-4 align-items-center">
                                            <?php if ($university_array[$i]['uni_logo'] == NULL) {
                                                //   echo '<img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_array[$i]['uni_logo'] . '" class="rounded-3 mt-3 mx-auto" style="width: 100px;" alt="University-logo" />';
                                                echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/dummy_logo.png" class="" style="width: 50px;" alt="University-logo" />';
                                            } else {
                                                echo '<img src="https://new.bringyourbuddy.in/admin/public/uploads/university_logo/' . $university_array[$i]['uni_logo'] . '" class="" style="width: 80px;" alt="University-logo" />';
                                            }
                                            ?>
                                            <div>
                                                <h5 class="mb-1"><?php echo $university_array[$i]['uni_name']; ?></h5>
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
                                        <!-- <a href="<?php echo $university_array[$i]['uni_website']; ?>" class="my-3 text-primary fs-5 text-decoration-underline"><?php echo $university_array[$i]['uni_website']; ?></a> -->
                                        <div class="d-flex gap-2 mb-2 align-items-center justify-content-center">
                                            <div class="card " style="background-color: #F7F7F7 !important; border-radius: 10px !important">
                                                <span>Master's</span>
                                            </div>
                                            <div class="card" style="background-color: #F7F7F7 !important; border-radius: 10px !important">
                                                <span>Bachelor's</span>
                                            </div>
                                            <div class="card" style="background-color: #F7F7F7 !important; border-radius: 10px !important">
                                                <span>Diploma</span>
                                            </div>
                                        </div>
                                        <a href="view_uni_courses.php?id=<?php echo $university_array[$i]['id']; ?>" class="btn btn-primary ">View Courses <i class="fa-solid fa-pen-to-square ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }

                    ?>



                    <!-- <div class="col-md-11">
            <div class="post-slide">
              <div class="card border border-dark" style="border-radius: 20px !important;">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <img src="./assets/images/unides/uni_1.jpg" class="img-fluid" style="border-radius: 20px !important;" />
                </div>
                <div class="card-header bg-white">
                  <h4 class="mb-1 fw-bold">Manipal University</h4>
                  <div class="d-flex gap-1">
                    <i class="fa-solid fa-star text-warning "></i>
                    <i class="fa-solid fa-star text-warning "></i>
                    <i class="fa-solid fa-star text-warning "></i>
                    <i class="fa-solid fa-star text-warning "></i>
                    <i class="fa-solid fa-star text-warning "></i>
                  </div>
                </div>
                <div class="card-body">
                  <h4 class="card-title fw-bold text-danger">B-Tech</h4>


                  <div class="d-flex gap-2">
                    <div class="card " style="background-color: #F7F7F7 !important; border-radius: 10px !important">
                      <div class="d-flex gap-1 mb-2">
                        <span>Elgibilty</span>
                        <span>O-Level</span>
                      </div>
                    </div>
                    <div class="card" style="background-color: #F7F7F7 !important; border-radius: 10px !important">
                      <div class="d-flex gap-1 mb-2">
                        <span>Application Fee</span>
                        <span>$100</span>
                      </div>
                    </div>
                  </div>

                  <h5 class="my-3 fw-bold">$4500</h5>
                  <a href="#" class="text-primary mx-auto fw-bold mt-2">Apply Now <i class="fa-solid fa-pen-to-square ms-1"></i></a>

                </div>
              </div>
            </div>
          </div> -->

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
        $(document).ready(function() {
            $("#uni-slider").owlCarousel({
                items: 4,
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