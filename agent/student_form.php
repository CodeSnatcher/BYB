<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Buddy_Program</title>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}" />
 

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
</head>

<body>

    <!-- Sub Header -->
    <?php include "include/header.php"  ?>
    <section class="section main-banner" id="top" data-section="section1">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/course-video.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            <h6>Hello Students</h6>
                            <h2>Welcome to Buddy-Program</h2>
                            <p>Unlock your potential with our online study platform. Access a world of knowledge from the comfort of your home, anytime, anywhere. Engage in interactive courses, collaborate with expert instructors, and achieve your academic and career goals. Join us today and embark on your journey to success through online learning. </p>
                            <div class="main-button-red">
                                <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="contact-us" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 justify-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="contact" action="" method="post">
                                <h2>Student Information</h2>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="study-permit-visa">Do you have a valid Study Permit / Visa?</label>

                                        <select class="form-select" name="study_permit_visa">
                                            <option value="I dont have this">I dont have this</option>
                                            <option value="USA F1 VISA">USA F1 VISA</option>
                                            <option value="Canadian Study Permit or Visitor Visa">Canadian Study Permit or Visitor Visa</option>
                                            <option value="Australian Student Visa">Australian Student Visa</option>
                                            <option value="Irish Stamp 2">Irish Stamp 2</option>
                                            <option value="Canadian Study Permit or Visitor Visa">Canadian Study Permit or Visitor Visa</option>
                                            <option value="UK Student Visa (Tier 4) or Short Term Study Visa">UK Student Visa (Tier 4) or Short Term Study Visa</option>
                                            <option value="Australian Student Visa">Australian Student Visa</option>


                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="nationality">Nationality</label>
                                        <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Your Nationality" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="education-country">Education Country</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="education-country" name="education_country" class="form-control" placeholder="Country Name" aria-label="Country Name" aria-describedby="education-country2" />
                                        </div>
                                    </div>
                                </div>





                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="education-level">Education Level</label>
                                        <input type="text" class="form-control" name="education_level" id="education-level" placeholder="e.g., Bachelor's" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="grading-scheme">Grading Scheme</label>

                                        <select class="form-select" name="grading_scheme">
                                            <option value="Grade 1">Grade 1</option>
                                            <option value="Grade 2">Grade 2</option>
                                            <option value="Grade 3">Grade 3</option>
                                            <option value="Grade 4">Grade 4</option>
                                            <option value="Grade 5">Grade 5</option>
                                            <option value="Grade 6">Grade 6</option>
                                            <option value="Grade 7">Grade 7</option>
                                            <option value="Grade 8">Grade 8</option>
                                            <option value="Grade 9">Grade 9</option>
                                            <option value="Grade 10">Grade 10</option>
                                            <option value="Grade 11">Grade 11</option>
                                            <option value="Grade 12">Grade 12</option>


                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="grading-average">Grading Average</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="grading-average" name="grading_average" class="form-control" placeholder="Your Grading Average" aria-label="Your Grading Average" aria-describedby="grading-average2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="english-exam-type">English Exam Type</label>
                                        <input type="text" class="form-control" id="english-exam-type" name="english_exam_type" placeholder="e.g., IELTS" />
                                    </div>
                                </div>
                                <hr>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="countries">Countries</label>
                                        <input type="text" class="form-control" id="countries" name="countries" placeholder="Country Names" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="provinces-states">Provinces / States</label>
                                        <input type="text" class="form-control" id="provinces-states" name="provinces_states" placeholder="Province/State Names" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="campus-city">Campus City</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="campus-city" name="campus_city" class="form-control" placeholder="City Name" aria-label="City Name" aria-describedby="campus-city2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="school-types">School Types</label>
                                        <input type="text" class="form-control" id="school-types" name="school_types" placeholder="e.g., Public/Private" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="schools">Schools</label>
                                        <input type="text" class="form-control" id="schools" name="schools" placeholder="School Names" />
                                    </div>
                                </div>
                                <hr>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="program-levels">Program Levels</label>

                                        <select class="form-select" name="program_levels">
                                            <option value="English as Second Language (ESL)">English as Second Language (ESL)</option>
                                            <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                            <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                            <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                            <option value="3-Year Bachelor's Degree">3-Year Bachelor's Degree</option>
                                            <option value="Top-up Degree">Top-up Degree</option>
                                            <option value="4-Year Bachelor's Degree">4-Year Bachelor's Degree</option>
                                            <option value="Integrated Masters">Integrated Masters</option>
                                            <option value="Postgraduate Certificate">Postgraduate Certificate</option>
                                            <option value="Postgraduate Diploma">Postgraduate Diploma</option>
                                            <option value="Master's Degree">Master's Degree</option>
                                            <option value="Doctoral / PhD">Doctoral / PhD</option>
                                            <option value="Non-Credential">Non-Credential</option>



                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="intakes">Intakes</label>
                                        <input type="text" class="form-control" id="intakes" name="intakes" placeholder="Intake Information" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="intakes-status">Intakes Status</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="intakes-status" name="intakes_status" class="form-control" placeholder="Status" aria-label="Status" aria-describedby="intakes-status2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="post-secondary-discipline">Post-Secondary Discipline</label>

                                        <select class="form-select" name="post_secondary_discipline">
                                            <option value="Engineering and Technology">Engineering and Technology</option>
                                            <option value="Sciences">Sciences</option>
                                            <option value="Arts">Arts</option>
                                            <option value="Business, Management and Economics">Business, Management and Economics</option>
                                            <option value="Law, Politics, Social, Community Service and Teaching">Law, Politics, Social, Community Service and Teaching</option>
                                            <option value="English for Academic Studies">English for Academic Studies</option>
                                            <option value="Health Sciences, Medicine, Nursing, Paramedic and Kinesiology">Health Sciences, Medicine, Nursing, Paramedic and Kinesiology</option>


                                        </select>


                                        <div class="col-md-4">
                                            <label class="form-label" for="post-secondary-sub-categories">Post-Secondary Sub-Categories</label>

                                            <select class="form-select" name="post_secondary_sub_categories">
                                                <option value="Accounting">Accounting</option>
                                                <option value="Entrepreneurship">Entrepreneurship</option>
                                                <option value="Finance, Economics">Finance, Economics</option>
                                                <option value="Hospitality and Tourism, Recreation">Hospitality and Tourism, Recreation</option>
                                                <option value="Human Resources">Human Resources</option>
                                                <option value="International Business">International Business</option>
                                                <option value="Management, Administration, General">Management, Administration, General</option>
                                                <option value="Marketing, Analyst, Advertising">Marketing, Analyst, Advertising</option>
                                                <option value="Public Relation">Public Relation</option>
                                                <option value="Supply Chain">Supply Chain</option>


                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Send</button>
                            </form>


                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php include "./include/footer.php" ?>
    </section>

    <!-- / Content -->
    </section>



    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <?php include "include/footer_srcipts.php"  ?>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    
    <script src="{{ asset('assets/vendor/js/jquery-3.3.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>