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

    <style>
        /* Style the form */
        #regForm {
            background-color: #ffffff;
            margin: 100px auto;
            padding: 40px;
            width: 100%;
            min-width: 300px;
        }

        /* Style the input fields */

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #DC3545;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        /* Mark the active step: */
        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #DC3545;
        }
    </style>

</head>

<body>
    <?php

    require_once "phpScript/db_functions.php";

    $db = new DB_Functions();
    $type_id = $_GET['id'];
    $cat_array = $db->cat_data($type_id);
    $ct_array = $db->get_table_data('course_type');
    ?>


    <section id="step_select" class="d-flex justify-content-center my-5">
        <div class="card w-75">
            <form id="regForm" action="phpScript/controllers.php" method="post">
            <input type="" class="d-none" name="tag" value="step_enquiry" required>

                <!-- step-1 -->
                <div class="tab">
                    <p>
                    <h2 class="text-center fs-1 my-5">Which would you like to pursue ?</h2>
                    <div class="row">
                        <?php
                        for ($i = 0; $i < count($cat_array); $i++) {
                        ?>
                            <div class="col-auto">
                                <div class=" d-flex gap-2 align-items-center shadow border p-2 mb-3" style="border-radius: 20px !important;">
                                    <span><?php echo $cat_array[$i]['course_category']; ?></span>
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" name="course_cat" value="<?php echo $cat_array[$i]['id']; ?>" type="radio" oninput="this.className = ''" name="flexRadioDefault" id="flexRadioDefault1">
                                    </div>
                                </div>

                            </div>
                        <?php

                        }

                        ?>

                    </div>
                    </p>
                </div>


                <!-- step-2 -->
                <div class="tab">
                    <p>
                    <h2 class="text-center fs-1 my-5">Select Your Recent Qualification</h2>
                    <div class="form-floating mb-3 w-50 mx-auto">
                        <select class="form-select" id="floatingSelect" name="qualification" aria-label="Floating label select example">
                            <option selected>Select</option>
                            <option value="O-Level">O-Level</option>
                            <option value="A-Level">A-Level</option>
                            <option value="Diploma_Level">Diploma Level</option>
                            <option value="Bachelor_Level">Bachelor Level</option>
                            <option value="Master_Level">Master Level</option>

                        </select>
                        <label for="">Select Qualification</label>

                    </div>
                    </p>
                </div>

                <!-- step-3 -->
                <div class="tab">
                    <p>
                    <h2 class="text-center fs-1 my-5">Grade / Percentage Scored In Last Qualification</h2>
                    <div class="form-floating mb-3 w-50 mx-auto">
                        <select class="form-select" name="gp_score" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Select</option>
                            <option value="option-1">option-1</option>
                            <option value="option-2">option-2</option>
                        </select>
                        <label for="">Select Grade / Percentage</label>

                    </div>
                    </p>
                </div>

                <div class="tab">
                    <p>
                    <h2 class="text-center fs-1 my-5">Looking for the university with ranking in india / provide paid internship</h2>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="form-check me-3">
                            <input class="form-check-input" value="1" type="radio" name="paid_intern" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="0" type="radio" name="paid_internship" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                No
                            </label>
                        </div>
                    </div>
                    </p>
                </div>

                <div class="tab">
                    <p>
                    <h2 class="text-center fs-1 my-5">Choose your budget for your study india program</h2>
                    <div class="form-floating mb-3 w-50 mx-auto">
                        <select class="form-select" id="floatingSelect" name="budget" aria-label="Floating label select example">
                            <option selected>Select</option>
                            <option value="1000">upto $1000</option>
                            <option value="2000">upto $2000</option>
                            <option value="3000">upto $3000</option>
                            <option value="4000">upto $4000</option>
                            <option value="5000">upto $5000</option>
                            <option value="6000">upto $6000</option>
                            <option value="1000000">No Limit</option>

                        </select>
                        <label for="">Select Budget</label>

                    </div>
                    </p>

                </div>

                <div class="tab">
                    <p>
                    <h2 class="text-center fs-1 my-5">Lets Know Each Other Better</h2>
                    <div class="row align-items-center">
                        <div class="card p-2 shadow">
                            <div class="col-md-8">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="full_name" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Whatsapp No.</label>
                                        <input type="tel" name="whatsapp" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="d-flex gap-5 my-2">
                                            <label class="form-label" for="form3Example1n">Gender :</label>
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
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-4 mt-4">
                                        <select id="country" name="country" class="form-control"></select>
                                        <label for="floatingSelect">Country</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-4 mt-4">
                                        <select name="state" id="state" class="form-control"></select>
                                        <label for="floatingSelect">State</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </p>
                </div>

                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" class="btn btn-danger" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" class="btn btn-danger" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>

            </form>
        </div>
    </section>
    <?php include('includes/footer_script.php'); ?>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
               
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }
    </script>

<script>
        //Submit login_form
        $("#regForm").on("submit", function(e) {
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
                        // setTimeout(function() {
                        //     window.location.reload();
                        // }, 4000);
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

</body>



</html>





