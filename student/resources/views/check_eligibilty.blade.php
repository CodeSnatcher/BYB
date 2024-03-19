<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no minimum-scale=1.0, maximum-scale=1.0" />
  <title>Dashboard</title>
  <meta name="description" content="" />


  <!-- headerscript -->
  @include('includes.header_script')
  <style>
    /* Style the form */
    #regForm {
      background-color: #ffffff;

    }

    /* Style the input fields */
    input {
      padding: 10px;
      width: 100%;
      font-size: 17px;
      font-family: Raleway;
      border: 1px solid #aaaaaa;
    }

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
      background-color: #696CFF !important;
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
      background-color: #696CFF !important;
    }
  </style>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      @include('includes.sidebar')
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        @include('includes.header')
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row justify-content-center ">
              <div class="col-md-8">
                <div class="rounded-3 card border pt-1 px-5 ">
                  <div class="card-header">
                    <h2 class=" text-center fw-bold">CHECK ELIGIBILTY</h2>
                    <hr>
                  </div>

                  <form id="regForm" action="{{ url('/') }}/profile_eligibilty" method="post">
                    @csrf
                    <!--Toast for error-->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif

                    <!--Toast for success-->
                    @if(session('success'))
                    <div class="alert alert-primary">
                      {{ session('success') }}
                    </div>
                    @endif



                    <!--step 1-->
                    <div class="tab ms-3">
                      <p>
                      <div class="text-primary fs-5">Which Country Do you want to study In ?</div>
                      <div class="my-3">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="study_country" value="1" id="india" checked>
                          <label class="form-check-label fs-6 text-dark" for="india">
                            India
                          </label>
                        </div>
                      </div>
                      <!-- <div class="text-primary fs-3">What is your highest level of Education ?</div>
                      <div class="my-3">


                        <div class="my-3">

                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="level_of_education" placeholder="Education Level">
                            <label for="floatingInput">Education Level</label>
                          </div>

                        </div>
                      </div> -->
                      <div class="text-primary fs-5">What is your highest level of Education ?</div>
                      <div class="my-3">

                        <!-- <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="high_edu_level" value="O-Level" id="O-Level">
                          <label class="form-check-label fs-5 text-dark" for="O-Level">
                            O-Level
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="high_edu_level" value="A-Level" id="A-Level">
                          <label class="form-check-label fs-5 text-dark" for="A-Level">
                            A-Level
                          </label>
                        </div> -->



                        @foreach($pagedata as $key => $coursetype)
                        @php
                        $key++;
                        @endphp
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="high_edu_level" onchange="sendData({{$coursetype->id}})" value="{{$coursetype->id}}" id="{{$coursetype->id}}">
                          <label class="form-check-label fs-6 text-dark" for="{{$coursetype->id}}">
                            {{$coursetype->type}}
                          </label>
                        </div>
                        @endforeach

                      </div>
                      </p>
                    </div>



                    <!--step 2-->
                    <div class="tab ms-3">
                      <p>
                      <div class="text-primary fs-5">What would you like to study ?</div>

                      <div class="my-3">
                        <!-- <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="apply_education_cat" id="dfg">
                          <label class="form-check-label fs-5 text-dark" for="dfg">
                            <div class="fs-5 " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                              Bachelor
                            </div>
                            <div class="collapse" id="collapseExample">
                              <div class="card card-body">
                                <ul>
                                  <li>BCA</li>
                                  <li>BBA</li>
                                  <li>BSC</li>
                                  <li>B-Tech</li>
                                </ul>
                              </div>
                            </div>
                          </label>
                        </div> -->


                        <!-- @foreach($categorydata as $key => $Course_Category)
                        @php
                        $key++;
                        @endphp
                        <div id="cat_data">
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="apply_education_cat" value=" {{$Course_Category->id}}" id="{{$Course_Category->id}}">
                            <label class="form-check-label fs-5 text-dark" for="{{$Course_Category->id}}">
                              {{$Course_Category->course_category}}
                            </label>
                          </div>
                        </div>
                        @endforeach -->

                        <div id="cat_data">

                        </div>

                      </div>
                      <div class="text-primary fs-5">What's your estimated yearly tuition budget?</div>
                      <div class="my-3">
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" value="2000" name="yearly_tuition_budget" id="$2,000">
                          <label class="form-check-label fs-6 text-dark" for="$2,000">
                            Upto ~$2,000 USD
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" value="3000" name="yearly_tuition_budget" id="$3,000">
                          <label class="form-check-label fs-6 text-dark" for="$3,000">
                            Upto ~$3,000 USD
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" value="4,000" name="yearly_tuition_budget" id="$4,000">
                          <label class="form-check-label fs-6 text-dark" for="$4,000">
                            Up to ~$4,000 USD
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" value="5,000" name="yearly_tuition_budget" id="$5,000">
                          <label class="form-check-label fs-6 text-dark" for="$5,000">
                            Up to ~$5,000 USD
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" value="6,000" name="yearly_tuition_budget" id="$6,000">
                          <label class="form-check-label fs-6 text-dark" for="$6,000">
                            Up to ~$6,000 USD
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" value="1000000" name="yearly_tuition_budget" id="No Limit">
                          <label class="form-check-label fs-6 text-dark" for="No Limit">
                            No Limit
                          </label>
                        </div>
                      </div>

                      </p>
                    </div>







                    <!--final step-->
                    <div class="tab ms-3">
                      <p>
                      <div class="text-primary fs-5">Which intake you want to apply for ?</div>
                      <div class="my-3">

                        <div class="form-floating">
                          <select class="form-select w-75" id="floatingSelect" aria-label="Floating label select example ">
                            <option selected>Select</option>
                            <option value="1">July'24</option>
                            <option value="2">Dec'24</option>
                            <option value="3">Not Sure</option>
                          </select>
                          <label for="floatingSelect">Works with selects</label>
                        </div>


                      </div>
                      <div class="text-primary fs-5">Have you taken any English proficiency tests?</div>
                      <div class="my-3">
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="english_proficiency" value="USA F1 Visa" id="usa_f1">
                          <label class="form-check-label fs-6 text-dark" for="usa_f1">
                            USA F1 Visa
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="english_proficiency" value="IELTS" id="IELTS">
                          <label class="form-check-label fs-6 text-dark" for="IELTS">
                            IELTS
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="english_proficiency" value="TOEFL" id="TOEFL">
                          <label class="form-check-label fs-6 text-dark" for="TOEFL">
                            TOEFL
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="english_proficiency" value="PTE" id="PTE">
                          <label class="form-check-label fs-6 text-dark" for="PTE">
                            PTE
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="english_proficiency" value="Duolingo" id="Duolingo">
                          <label class="form-check-label fs-6 text-dark" for="Duolingo">
                            Duolingo
                          </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="english_proficiency" value="I don't have this" id="!english">
                          <label class="form-check-label fs-6 text-dark" for="!english">
                            I don't have this
                          </label>
                        </div>
                      </div>
                      </p>
                    </div>

                    <div style="overflow:auto;" class="me-3">
                      <div style="float:right;">
                        <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
                      </div>
                    </div>

                    <!-- Circles which indicates the steps of the form: -->
                    <div class="text-center mb-3">
                      <span class="step"></span>
                      <span class="step"></span>
                      <span class="step"></span>

                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Footer -->
            <footer class="default-footer">
              @include('includes.footer')
              <!-- / Footer -->

              <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->




    @include('includes.footer_script')
    <!-- footerscrit -->
    <script>
      function sendData(ele_id) {
        // alert($(`#${ele_id}`).val());

        $.ajax({
          type: "POST",
          url: '{{url("/")}}/cat_data',
          data: {
            'type_id': $(`#${ele_id}`).val(),
            '_token': '{{csrf_token()}}'
          },
          success: function(response) {
            console.log(response.data);
            if (response.error == "1") {
              $.toast({
                heading: "<i class='fa fa-warning' ></i> " + response.error_msg,
                position: 'top-right',
                stack: false
              })
              $(".loader").css("display", "none");
            } else {

              var $cat_data = $('#cat_data');
              $cat_data.html('');
              response.data.forEach(function(row) {
                $cat_data.append('<div class="form-check mb-2"><input class="form-check-input" type="radio" name="apply_education_cat" value="' + row.id + '" id="' + row.id + '"><label class="form-check-label fs-6 text-dark" for="' + row.id + '">' + row.course_category + '</label></div>');
              });

            };
          }
        });
      }
    </script>
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
        if (n == (x.length - 1)) {
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

        for (i = 0; i < y.length; i++) {
          //     // If a field is empty...
          if (y[i].value == "") {
            //       // add an "invalid" class to the field:
            y[i].className += " invalid";
            //       // and set the current valid status to false:
            valid = false;
          }
        }

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
</body>

</html>