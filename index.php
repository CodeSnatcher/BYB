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



</head>

<body>
  <?php

  require_once "phpScript/db_functions.php";

  $db = new DB_Functions();

  $courses_array = $db->get_table_data('course_category');
  $uni_array = $db->get_table_data('universities');
  $all_courses = $db->getallcourse();
  $university_array = $db->top_uni('universities');

  // $university_details = $db->get_University_detail($_REQUEST['id']);

  // $university_details['name']

  ?>

  <!-- ***** Header Area start ***** -->

  <?php include('includes/header.php'); ?>

  <!-- ***** Main Banner Area End ***** -->
  <section>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

      <div class="carousel-inner ">
        <div class="carousel-item active">
          <div style="height: 85vh; background-image: url(https://upload.wikimedia.org/wikipedia/commons/c/cd/University-of-Alabama-EngineeringResearchCenter-01.jpg); background-size: cover; background-position: center;">
          </div>
        </div>
        <div class="carousel-item ">
          <div style="height: 85vh; background-image: url(https://doonuniversity.ac.in/admin/assets/uploads/slider/slide3.jpg); background-size: cover; background-position: center;">
          </div>
        </div>
        <div class="carousel-item ">
          <div style="height: 85vh; background-image: url(https://assets.architecturaldigest.in/photos/62de71b36b9540618ef0a42b/4:3/w_1440,h_1080,c_limit/13%20stunning%20university%20libraries%20around%20the%20world.jpg); background-size: cover; background-position: center;">
          </div>
        </div>
        <div class="position-absolute text-white d-flex flex-column align-items-center justify-content-center" style="top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(0,0,0,.6);">
          <h1 class="mb-4 mt-2 font-weight-bold text-center fs-1">Find <span class="auto-type text-danger"></span> in India</h1>
        </div>

      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>











    <!-- <div style="height: 80vh; background-image: url(https://upload.wikimedia.org/wikipedia/commons/c/cd/University-of-Alabama-EngineeringResearchCenter-01.jpg); background-size: cover; background-position: center;" class="position-relative w-100">
      <div class="position-absolute text-white d-flex flex-column align-items-center justify-content-center" style="top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(0,0,0,.6);">
        <h1 class="mb-4 mt-2 font-weight-bold text-center">We Are Ready To Educate World</h1>

        <form action="">
          <div class="d-flex">
            <input type="text" class="form-control py-3" style="width: 900px !important;" id="exampleFormControlInput1" placeholder="name@example.com">
            <button type="submit" class="btn btn-danger">Search</button>
          </div>
        </form>
      </div>
    </div> -->
  </section>

  <section id="search" class="my-5">
    <div class="container">
      <h2 class="my-5 fw-bold">Find As Per Your Need</h2>
      <div class="px-3">
        <form action="">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-3">
              <select class="form-select py-3 fs-5 shadow border border-dark" name="university" aria-label="Default select example">
                <option selected>Select Uiversity</option>
                <?php
                for ($i = 0; $i < count($uni_array); $i++) {
                ?>
                  <option value="<?php echo $uni_array[$i]['id']; ?>"><?php echo $uni_array[$i]['uni_name']; ?></option>
                <?php

                }

                ?>
              </select>
            </div>
            <div class="col-md-3">
              <select class="form-select py-3 fs-5 shadow border border-dark" name="category" aria-label="Default select example">
                <option selected>Select Program</option>
                <?php
                for ($i = 0; $i < count($courses_array); $i++) {
                ?>
                  <option value="<?php echo $courses_array[$i]['id']; ?>"><?php echo $courses_array[$i]['course_category']; ?></option>
                <?php

                }

                ?>
              </select>
            </div>
            <div class="col-md-3">
              <select class="form-select py-3 fs-5 shadow border border-dark" aria-label="Default select example">
                <option selected>Select budget</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">three</option>
              </select>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-danger form-control py-3 shadow">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>


  <section id="set_goals" class="my-5">
    <div class="container">
      <h2 class="my-5 mb-3 fw-bold">Select Your Study Goals</h2>


      <div class="row justify-content-center">


        <?php
        for ($i = 0; $i < count($courses_array); $i++) {
        ?>
          <div class="col-auto">
            <a href="view_cat_courses.php?cat_id=<?php echo $courses_array[$i]['id']; ?>">
              <div class="shadow border p-2 mb-3 text-dark" style="border-radius: 20px !important;"><?php echo $courses_array[$i]['course_category']; ?> <i class="fa-solid fa-arrow-right ms-2 fs-5 mx-auto p-2 rounded-circle border"></i></div>
            </a>
          </div>
        <?php

        }

        ?>



      </div>

    </div>
  </section>


  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
  </button> -->

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog bg-white">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Enquiry form</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="phpScript/controllers.php" id="enquiry" method="post">
            <div class="row">
              <input type="" class="d-none" name="tag" value="enquiry" required>
              <div class="col-md-6">
                <div class="form-outline mb-3">
                  <label class="form-label" for="form3Example1m">Full Name</label>
                  <input type="text" id="form3Example1m" name="full_name" class="form-control form-control-lg" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-outline mb-3">
                  <label class="form-label" for="form3Example1n">Email</label>
                  <input type="email" id="form3Example1n" name="email" class="form-control form-control-lg" />
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label" for="form3Example1n">Gender :</label>
                <div class="d-flex gap-5 my-2">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Male" id="Male">
                    <label class="form-check-label" for="Male">
                      Male
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Female" id="Female">
                    <label class="form-check-label" for="Female">
                      Female
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Others" id="Others">
                    <label class="form-check-label" for="Others">
                      Others
                    </label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-outline mb-4">
                  
                  <label class="form-label" for="form3Example1n">Whatsapp</label>
                  <input type="tel" id="form3Example1n" name="whtp_number" class="form-control form-control-lg" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-floating mb-4 mt-4">
                  <select id="country" name="country" class="form-control"></select>
                  <label for="floatingSelect">Country</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-4 mt-4">
                  <select name="state" id="state" class="form-control"></select>
                  <label for="floatingSelect">State</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1n">City</label>
                  <input type="text" id="form3Example1n" name="city" class="form-control form-control-lg" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-4">
                  <select class="form-select" id="floatingSelect" name="courses" aria-label="Floating label select example">
                    <option value="">Select Course</option>
                    <option value="Basic Science">Basic Science</option>
                    <option value="Computer Application">Computer Application</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Education">Education</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Hotel Management">Hotel Management</option>
                    <option value="Law">Law</option>
                    <option value="Management and Commerce">Management and Commerce</option>
                    <option value="Paramedical">Paramedical</option>
                    <option value="Pharmacy">Pharmacy</option>

                  </select>
                  <label for="floatingSelect">Courses</label>
                </div>

              </div>
            </div>
            <button type="submit">Submit</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  </div>






  <section id="top-collection" class="my-5">
    <div class="container">
      <h2 class="my-5 fw-bold">Top Collections</h2>
      <div class="row g-3">

        <?php
        for ($i = 0; $i < count($courses_array); $i++) {
        ?>
         
            <div class="col-md-3">
              <a href="uni_list.php" class="h-100">
                <div class="mb-3 rounded-5">
                  <div class="bg-image" style="max-width: 262px !important; position:relative; margin: 0px auto; border-radius: 10px !important">
                    <img src="./assets/images/unides/uni_5.jpg" class="img-fluid d-block mx-auto" />
                    <div class="position-absolute bottom-0  w-100" style="background-color: rgb(12 12 12 / 77%);">
                      <p class="p-2 m-0 text-white" style="font-size: 10px;">Best <?php echo $courses_array[$i]['course_category']; ?> Colleges in India</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
         




          <!-- <a href="view_cat_courses.php?cat_id=<?php echo $courses_array[$i]['id']; ?>">
            <div class="col-md-3">
              <a href="uni_list.php" class="h-100">
                <div class="mb-3">
                  <div class="bg-image" style="max-width: 262px !important; position:relative; margin: 0px auto; border-radius: 10px !important">
                    <img src="./assets/images/unides/uni_5.jpg" class="img-fluid d-block mx-auto" />
                    <div class="position-absolute bottom-0  w-100" style="background-color: rgb(12 12 12 / 77%);">
                      <p class="p-2 m-0 text-white">Best <?php echo $courses_array[$i]['course_category']; ?> Colleges in India</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </a> -->


        <?php

        }

        ?>

        <div class="col-md-3">
          <a href="uni_list.php" class="h-100">
            <div class="mb-3">
              <div class="bg-image" style="max-width: 262px !important; position:relative; margin: 0px auto; border-radius: 10px !important">
                <img src="./assets/images/unides/uni_5.jpg" class="img-fluid d-block mx-auto" />
                <div class="position-absolute bottom-0  w-100" style="background-color: rgb(12 12 12 / 77%);">
                  <p class="p-2 m-0 text-white">Best MBA Colleges in India</p>
                </div>
              </div>
            </div>
          </a>
        </div>


      </div>

      <div class="text-center my-3">
        <button type="button" class="button-box">More</button>
      </div>
    </div>
  </section>


  <section id="explore-programs" class="my-5">
    <div class="container">
      <h2 class="fw-bold my-5">Explore Program</h2>
      <div class="row justify-content-center align-iitems-center gy-3">
        <div class="col-md-4">
          <div class="card shadow mb-5 h-100 " style="border-radius: 20px !important;">
            <div class="card-header px-3 py-2 border-0" style="background-color: #F3F8FF !important; border-radius: 20px !important;">
              <div class="d-flex align-items-center justfy-content-between">
                <div>
                  <h4>Ranking</h4>
                  <div class="mt-1 ">College ranked on the base of real data</div>
                </div>
                <img src="./assets/images/ranking.png" style="width: 150px !important;" alt="vector">
              </div>
            </div>
            <div class="card-body px-3 pt-3">
              <div class="d-flex gap-3">
                <div class="border p-1 text-secondary" style="border-radius: 10px !important;">NIRF-459</div>
                <div class="border p-1 text-secondary" style="border-radius: 10px !important;">bringyourbuddy</div>
                <div class="border p-1 text-secondary" style="border-radius: 10px !important;">TOI-412</div>
              </div>
            </div>
            <div class="card-footer px-3 border-0" style="background-color: #F3F8FF !important; border-radius: 20px !important;">
              <a href="uni_list.php" class="fs-6 text-dark">Top Ranked Colleges In India <i class="fa-solid fa-square-up-right ms-2 "></i></a>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-4">
          <div class="card shadow mb-5 h-100" style="border-radius: 20px !important;">
            <div class="card-header px-3 py-2 border-0" style="background-color: #F3F8FF !important; border-radius: 20px !important;">
              <div class="d-flex align-items-center justfy-content-between">
                <div>
                  <h4>Find Colleges</h4>
                  <div class="mt-1 ">Discover 19000+ colleges via preferences</div>
                </div>
                <img src="./assets/images/find_uni.png" style="width: 150px !important;" alt="vector">
              </div>
            </div>
            <div class="card-body px-3 pt-3">
              <div class="d-flex gap-3">
                <div class="border p-1 text-secondary" style="border-radius: 10px !important;">B-tech Colleges in india</div>
                <div class="border p-1 text-secondary" style="border-radius: 10px !important;">B-tech Colleges in Delhi</div>
              </div>
            </div>
            <div class="card-footer px-3 border-0" style="background-color: #F3F8FF !important; border-radius: 20px !important;">
              <a href="#" class="fs-6 text-dark"> Discover Top Colleges In India <i class="fa-solid fa-square-up-right ms-2 "></i></a>
            </div>
          </div>
        </div> -->
        <div class="col-md-4">
          <div class="card shadow mb-5 h-100" style="border-radius: 20px !important;">
            <div class="card-header px-3 py-2 border-0" style="background-color: #F3F8FF !important; border-radius: 20px !important;">
              <div class="d-flex align-items-center justfy-content-between">
                <div>
                  <h4>Compare Colleges</h4>
                  <div class="mt-1 ">Compare on the basis of rank, fees. etc</div>
                </div>
                <img src="./assets/images/ranking.png" style="width: 150px !important;" alt="vector">
              </div>
            </div>
            <div class="card-body px-3 pt-3">
              <div class="d-flex gap-3">
                <div class="border p-1 text-secondary" style="border-radius: 10px !important;">IIT-Madras</div>
                <div class="border p-1 text-secondary" style="border-radius: 10px !important;">IIT-Delhi</div>
              </div>
            </div>
            <div class="card-footer px-3 border-0" style="background-color: #F3F8FF !important; border-radius: 20px !important;">
              <a href="compare_colleges.php" class="fs-6 text-dark">Compare Colleges <i class="fa-solid fa-square-up-right ms-2 "></i></a>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-4">
          <div class="card shadow mb-5 h-100" style="border-radius: 20px !important;">
            <div class="card-header px-3 py-2 border-0" style="background-color: #F3F8FF !important; border-radius: 20px !important;">
              <div class="d-flex align-items-center justfy-content-between">
                <div>
                  <h4>Exams</h4>
                  <div class="mt-1 ">Know more about your exam</div>
                </div>
                <img src="./assets/images/ranking.png" style="width: 150px !important;" alt="vector">
              </div>
            </div>
            <div class="card-body px-3 pt-3">
              <div class="d-flex gap-3">
                <div class="border p-1 text-secondary" style="border-radius: 10px !important;">JEE-Advanced</div>
                <div class="border p-1 text-secondary" style="border-radius: 10px !important;">JEE-Mains</div>
              </div>
            </div>
            <div class="card-footer px-3 border-0" style="background-color: #F3F8FF !important; border-radius: 20px !important;">
              <a href="#" class="fs-6 text-dark">Check all entrance exams in india <i class="fa-solid fa-square-up-right ms-2 "></i></a>
            </div>
          </div>
        </div> -->
        <!-- <div class="col-md-4">
          <div class="card shadow mb-5 h-100" style="border-radius: 20px !important;">
            <div class="card-header px-3 py-2 border-0" style="background-color: #F3F8FF !important; border-radius: 20px !important;">
              <div class="d-flex align-items-center justfy-content-between">
                <div>
                  <h4>College Predictor</h4>
                  <div class="mt-1 ">Know your college admission chances</div>
                </div>
                <img src="./assets/images/ranking.png" style="width: 150px !important;" alt="vector">
              </div>
            </div>
            <div class="card-body px-3 pt-3">
              <div class="d-flex gap-3">
                <div class="border p-1 text-secondary" style="border-radius: 10px !important;">JEE-Advanced</div>
                <div class="border p-1 text-secondary" style="border-radius: 10px !important;">JEE-Mains</div>
              </div>
            </div>
            <div class="card-footer px-3 border-0" style="background-color: #F3F8FF !important; border-radius: 20px !important;">
              <a href="#" class="fs-6 text-dark">Find where you get admission <i class="fa-solid fa-square-up-right ms-2 "></i></a>
            </div>
          </div>
        </div> -->
        <div class="col-md-4">
          <div class="card shadow mb-5 h-100" style="border-radius: 20px !important;">
            <div class="card-header px-3 py-2 border-0" style="background-color: #F3F8FF !important; border-radius: 20px !important;">
              <div class="d-flex align-items-center justfy-content-between">
                <div>
                  <h4>Course Finder</h4>
                  <div class="mt-1 ">Find top courses in indian colleges</div>
                </div>
                <img src="./assets/images/find_colleges.png" style="width: 150px !important;" alt="vector">
              </div>
            </div>
            <div class="card-body px-3 pt-3">
              <div class="d-flex gap-3">
                <div class="border p-1 text-secondary" style="border-radius: 10px !important;">Engineering</div>
                <div class="border p-1 text-secondary" style="border-radius: 10px !important;">Computer science</div>
              </div>
            </div>
            <div class="card-footer px-3 border-0" style="background-color: #F3F8FF !important; border-radius: 20px !important;">
              <a href="course_finder.php" class="fs-6 text-dark">Top Ranked Colleges In India <i class="fa-solid fa-square-up-right ms-2 "></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




  <section id="top-colleges" class="my-5">
    <div class="container">
      <h2 class="my-5 fw-bold">Top 10 Colleges</h2>
      <!-- <div class="row justify-content-center">
        <div id="btn-slider" class="owl-carousel h-100">
          <?php
          for ($i = 0; $i < count($all_courses); $i++) {
          ?>
            <div class="col-8">
              <div class="post-slide">
                <div class="card p-3">
                  <img src="./assets/images/training-course.png" style=" width:80px !important;" class="mx-auto">
                  <h6 class="text-center mt-3"><?php echo $all_courses[$i]['course_name']; ?></h6>
                </div>
              </div>
            </div>
          <?php
          }

          ?>

        </div>
      </div> -->

      <div class="row g-3">

        <?php
        for ($i = 0; $i < count($university_array); $i++) {
        ?>
          <div class="col-md-3">
            <div class="card border border-dark rounded-4 h-100 ">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="./assets/images/unides/uni_1.jpg" class="img-fluid rounded-4" />
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
                  <div class="btn btn-success rounded-5 text-white">
                    #<?php echo $university_array[$i]['uni_rank']; ?>
                  </div>
                </div>

              </div>
              <div class="card-body">
                <!-- <a href="<?php echo $university_array[$i]['uni_website']; ?>" class="my-3 text-primary fs-5 text-decoration-underline"><?php echo $university_array[$i]['uni_website']; ?></a> -->
                <div class="d-flex gap-2 mb-2 align-items-center">
                  <a href="view_type_courses.php?uni_id=<?php echo $university_array[$i]['id']; ?>&ct=23" class="border p-1 text-secondary" style="border-radius: 10px !important;">Master</a>
                  <a href="view_type_courses.php?uni_id=<?php echo $university_array[$i]['id']; ?>&ct=20" class="border p-1 text-secondary" style="border-radius: 10px !important;">Bachelor</a>
                  <a href="view_type_courses.php?uni_id=<?php echo $university_array[$i]['id']; ?>&ct=25" class="border p-1 text-secondary" style="border-radius: 10px !important;">Diploma</a>

                </div>
                <a href="uni_details.php?id=<?php echo $university_array[$i]['id']; ?>" class="text-primary mx-auto fw-bold mt-2">Apply Now <i class="fa-solid fa-pen-to-square ms-1"></i></a>
              </div>
            </div>

          </div>
        <?php
        }

        ?>


      </div>
      <div class="text-center my-5">
        <a href="uni_list.php" class="button-box">More</a>
      </div>
    </div>
  </section>



  <section class="contact-us" id="contact" class="my-5">
    <div class="container">
      <h2 class="my-3 text-center fw-bold">Lets Get In Touch</h2>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card shadow border p-sm-5 p-2 mb-5">
            <form id="contactform" action="phpScript/controllers.php" method="post">
              <input type="" class="d-none" name="tag" value="contact" required>
              <div class="row justify-content-center">
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name">
                    <label for="floatingInput">Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email">
                    <label for="floatingInput">Email</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="Subject">
                    <label for="floatingInput">Subject</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating mb-3">
                    <textarea class="form-control" name="message" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Message</label>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-danger w-100">Send</button>
                </div>
              </div>
              <!-- <div class="row">
            <div class="col-lg-12">
              <h2 class="fw-bold">Let's get in touch</h2>
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
          </div> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include('includes/light_footer.php'); ?>

  <!-- Scripts -->
  <?php include('includes/footer_script.php'); ?>
  <script>
    //Submit login_form
    $("#contactform").on("submit", function(e) {
      e.preventDefault();
      $(".loader").css("display", "block");
      var obj = $(this);
      var form = $(this)[0];
      var data = new FormData(form);

      $.ajax({
        type: "POST",
        url: e.target.action,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: "json",

        success: function(response) {

          if (response.success == "1") {
            $(".loader").css("display", "none");
            $.toast({
              heading: response.message,
              position: 'bottom-right',
              stack: false,
              icon: 'success'
            })
            window.location = "https://new.bringyourbuddy.in"
          } else {
            $(".loader").css("display", "none");
            $.toast({
              heading: response.message,
              position: 'bottom-right',
              stack: false,
              icon: 'error'
            })
          }
        }
      });

    });
  </script>


  <script>
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
  <script>
    var typed = new Typed('.auto-type', {
      strings: ['1500+ Universities', '2000+ Courses'],
      typeSpeed: 300,
      loop: true,
      smartBackspace: true,
    });
  </script>

</body>



</html>