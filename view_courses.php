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
    <!--





-->
</head>

<body style="background-color: #F7F7F7 !important;">
    <?php

    require_once "phpScript/db_functions.php";

    $db = new DB_Functions();
    $all_courses = $db->getallcourse();
    $university_array = $db->get_table_data('universities');

    // $university_details = $db->get_University_detail($_REQUEST['id']);

    // $university_details['name']

    ?>
    <?php include('includes/header.php'); ?>

    <section id="vcourse" class="my-5">
        <div class="container">
            <div class="my-5">
                <h1 class="mb-5">View Courses</h1>
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
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card border" style="border-radius: 20px !important;">
                                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                        <img src="./assets/images/unides/uni_1.jpg" class="img-fluid" />
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
                            <div class="col-md-4 mb-3">
                                <div class="card border" style="border-radius: 20px !important;">
                                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                        <img src="./assets/images/unides/uni_1.jpg" class="img-fluid" />
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
                            <div class="col-md-4 mb-3">
                                <div class="card border" style="border-radius: 20px !important;">
                                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                        <img src="./assets/images/unides/uni_1.jpg" class="img-fluid" />
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