<!DOCTYPE html>



<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">



<head>

  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no minimum-scale=1.0, maximum-scale=1.0" />

  <title>Profile setting</title>

  <meta name="description" content="" />



  <!-- headerscript -->

  @include('includes.header_script')

</head>



<body>

  <!-- Layout wrapper -->

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

            <h4 class="fw-bold py-3 mb-4">My Profile</h4>

            <!-- Basic Layout -->

            <div class="row">


              <div class="col-md-3">




                <div class="sidebar">
                  <ul>
                    <li class="menu-item">
                      <a href="#" onclick="general_info()" class="menu-link text-primary">
                        <i class="bi bi-arrow-right"></i>
                        <div data-i18n="Layouts" class="fw-bold fs-5">General Information</div>
                      </a>
                    </li>

                  </ul>
                </div>



                <div class="sidebar">
                  <ul>
                    <li class="menu-item">
                      <a href="#" onclick="edu_history()" class="menu-link text-primary">
                        <i class="bi bi-arrow-right"></i>
                        <div data-i18n="Layouts" class="fw-bold fs-5">Education History</div>
                      </a>
                    </li>
                  </ul>
                </div>



                <!-- <div class="sidebar">
                  <ul>
                    <li class="menu-item">
                      <a href="#" class="menu-link text-primary">
                        <i class="bi bi-arrow-right"></i>
                        <div data-i18n="Layouts" class="fw-bold fs-5">Test Scores</div>
                      </a>

                    </li>
                  </ul>
                </div> -->


                <div class="sidebar">
                  <ul>
                    <li class="menu-item">
                      <a href="#" onclick="visa_study()" class="menu-link text-primary">
                        <i class="bi bi-arrow-right"></i>
                        <div data-i18n="Layouts" class="fw-bold fs-5">Visa and Study Permit</div>
                      </a>
                    </li>
                  </ul>
                </div>

              </div>

              <div class="col-md-9">
                <div id="genral_info">
                  <div class="card mb-4">

                    <div class="card-header d-flex justify-content-between align-items-center">

                      <h5 class="mb-0">Personal Information</h5>

                      <small class="text-muted float-end"></small>

                    </div>

                    <div class="card-body">

                      <form action="{{url('/') }}/profile" method="POST" enctype="multipart/form-data">

                        @csrf

                        @if ($errors->any())

                        <div class="alert alert-danger">

                          <ul>

                            @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                            @endforeach

                          </ul>

                        </div>

                        @endif

                        @if(session('success'))

                        <div class="alert alert-primary">

                          {{ session('success') }}

                        </div>

                        @endif



                        <div class="row">
                          <div class="col-sm-12">

                            <div class="mb-3">

                              <label class="form-label" for="basic-icon-default-vendorname"> Profile Picture:</label>

                              <div class="input-group input-group-merge">

                                <input type="file" class="form-control" name="photo" />



                              </div>

                            </div>
                          </div>



                          <div class="col-sm-6">

                            <div class="mb-3">

                              <label class="form-label" for="basic-icon-default-vendorname"> Name:</label>

                              <div class="input-group input-group-merge">

                                <input type="text" value="{{ isset($pagedata['name']) ? $pagedata['name'] : '' }}" class="form-control" name="firstname" required />



                              </div>

                            </div>
                          </div>


                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-dob">Father Name</label>
                              <div class="input-group input-group-merge">
                                <!-- Use the input type "date" for Date of Birth -->
                                <input type="text" value="{{ isset($pagedata['father_name']) ? $pagedata['father_name'] : '' }}" class="form-control" name="father_name" required />
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-dob">Mother Name</label>
                              <div class="input-group input-group-merge">
                                <!-- Use the input type "date" for Date of Birth -->
                                <input type="text" value="{{ isset($pagedata['mother_name']) ? $pagedata['mother_name'] : '' }}" class="form-control" name="mother_name" required />
                              </div>
                            </div>
                          </div>




                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-dob">Date of Birth:</label>
                              <div class="input-group input-group-merge">
                                <!-- Use the input type "date" for Date of Birth -->
                                <input type="date" value="{{ isset($pagedata['dob']) ? $pagedata['dob'] : '' }}" class="form-control" name="dob" required />
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label" for="highest_education_level">Highest Level of Education:</label>

                                <div class="input-group input-group-merge">
                                  <input type="text" value="{{ $pagedata->qualification ?? '' }}" class="form-control" name="qualification" required />
                                </div>
                              </div>
                            </div>

                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-first-language">First Language:</label>
                              <div class="input-group input-group-merge">
                                <input type="text" value="{{ isset($pagedata['first_lang']) ? $pagedata['first_lang'] : '' }}" class="form-control" name="first_lang" required />
                              </div>
                            </div>
                          </div>


                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-citizenship">Country of Citizenship:</label>
                              <div class="input-group input-group-merge">
                                <input type="text" value="{{ isset($pagedata['nationality']) ? $pagedata['nationality'] : '' }}" class="form-control" name="nationality" required />
                              </div>
                            </div>
                          </div>


                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-passport-number">Passport Number:</label>
                              <div class="input-group input-group-merge">
                                <input type="text" value="{{ isset($pagedata['passport_num']) ? $pagedata['passport_num'] : '' }}" class="form-control" name="passport_num" required />
                              </div>
                            </div>
                          </div>



                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-passport-expiry">Passport Expiry Date:</label>
                              <div class="input-group input-group-merge">
                                <!-- Use the input type "date" for Passport Expiry Date -->
                                <input type="date" value="{{ isset($pagedata['passport_exp_date']) ? $pagedata['passport_exp_date'] : '' }}" class="form-control" name="passport_exp_date" required />
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-email">Email:</label>
                              <div class="input-group input-group-merge">
                                <input type="email" value="{{ isset($pagedata['email']) ? $pagedata['email'] : '' }}" class="form-control" name="email" required />
                              </div>
                            </div>
                          </div>


                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-phone">Phone Number:</label>
                              <div class="input-group input-group-merge">
                                <input type="tel" value="{{ isset($pagedata['phone_no']) ? $pagedata['phone_no'] : '' }}" class="form-control" name="phone_no" required />
                              </div>
                            </div>
                          </div>


                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label">Marital Status:</label>

                              <div class="row">
                                <!-- Two radio buttons on the left side -->
                                <div class="col-sm-6">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="marital_status" id="marital_status_single" value="single" {{ optional($pagedata)->marital_status == 'single' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="marital_status_single">Single</label>
                                  </div>

                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="marital_status" id="marital_status_married" value="married" {{ optional($pagedata)->marital_status == 'married' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="marital_status_married">Married</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label">Gender:</label>

                              <div class="row">

                                <!-- Two radio buttons on the right side -->
                                <div class="col-sm-6">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male" {{ optional($pagedata)->gender == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender_male">Male</label>
                                  </div>

                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female" {{ optional($pagedata)->gender == 'female' ? 'checked' : '' }}>


                                    <label class="form-check-label" for="gender_female">Female</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>






                        </div>

                        <button type="submit" class="btn btn-success">Save</button>

                      </form>

                    </div>

                  </div>

                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Address Detail</h5>
                      <small class="text-muted float-end"></small>
                    </div>

                    <div class="card-body">
                      <form action="{{url('/') }}/profile_address" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif

                        @if(session('success'))
                        <div class="alert alert-primary">
                          {{ session('success') }}
                        </div>
                        @endif

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-address">Address:</label>
                              <div class="input-group input-group-merge">
                                <input type="text" value="{{ isset($pagedata_address['address']) ? $pagedata_address['address'] : '' }}" class="form-control" name="address" required />
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-city-town">City/Town:</label>
                              <div class="input-group input-group-merge">
                                <input type="text" value="{{ isset($pagedata_address['city_town']) ? $pagedata_address['city_town'] : '' }}" class="form-control" name="city_town" required />
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="highest_education_level">Country:</label>
                              <div class="input-group input-group-merge">
                                <select id="country" value="{{ isset($pagedata_address['country']) ? $pagedata_address['country'] : '' }}" name="country" class="form-control"></select>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="highest_education_level">State:</label>
                              <div class="input-group input-group-merge">
                                <select name="state" value="{{ isset($pagedata_address['province_state']) ? $pagedata_address['province_state'] : '' }}" id="state" class="form-control"></select>
                              </div>
                            </div>
                          </div>


                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-postal-zip-code">Postal Zip Code:</label>
                              <div class="input-group input-group-merge">
                                <input type="text" value="{{ isset($pagedata_address['postal_code']) ? $pagedata_address['postal_code'] : '' }}" class="form-control" name="postal_code" required />
                              </div>
                            </div>
                          </div>


                          




                        </div>

                        <button type="submit" class="btn btn-success">Save</button>

                      </form>
                    </div>

                  </div>
                </div>
                <!-- 2 -->
                <div id="edu_history" style="display: none;">

                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Education History</h5>
                      <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                      <!-- Your Education History form fields go here -->
                      <!-- Example: -->
                      <div>
                        <form action="{{url('/') }}/profile_eduhis" method="POST" enctype="multipart/form-data">
                          @csrf

                          @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                          @endif

                          @if(session('success'))
                          <div class="alert alert-primary">
                            {{ session('success') }}
                          </div>
                          @endif

                          <div class="row">
                            <!-- Add this block after the "Address" field -->
                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label" for="basic-icon-default-country-education">Country of Education:</label>
                                <div class="input-group input-group-merge">
                                  <input type="text" value="{{ $pagedata_eduhis->country_of_edu ?? '' }}" class="form-control" name="country_of_edu" required />
                                </div>
                              </div>
                            </div>



                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label" for="highest_education_level">Highest Level of Education:</label>
                                <div class="input-group input-group-merge">
                                  <select class="form-select" name="highest_level_of_edu[]" required>
                                    <option value="" selected disabled>Select Education Level</option>
                                    <option value="high_school" {{ optional($pagedata_eduhis)->highest_level_of_edu == 'high_school' ? 'selected' : '' }}>High School</option>
                                    <option value="associate_degree" {{ optional($pagedata_eduhis)->highest_level_of_edu == 'associate_degree' ? 'selected' : '' }}>Associate Degree</option>
                                    <option value="bachelor_degree" {{ optional($pagedata_eduhis)->highest_level_of_edu == 'bachelor_degree' ? 'selected' : '' }}>Bachelor's Degree</option>
                                    <!-- Add more options as needed -->
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label" for="grading_scheme">Grading Scheme:</label>
                                <div class="input-group input-group-merge">
                                  <select class="form-select" name="grading_scheme[]" required>
                                    <option value="" selected disabled>Select Grading Scheme</option>
                                    <option value="letter_grade" {{ optional($pagedata_eduhis)->grading_scheme == 'letter_grade' ? 'selected' : '' }}>Letter Grade</option>
                                    <option value="percentage" {{ optional($pagedata_eduhis)->grading_scheme == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                    <!-- Add more options as needed -->
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label">I have graduated from this institution:</label>

                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="graduated_from[]" id="graduated_yes" value="yes" {{ optional($pagedata_eduhis)->graduated_from == 'yes' ? 'checked' : '' }}>
                                  <label class="form-check-label" for="graduated_yes">Yes</label>
                                </div>

                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="graduated_from[]" id="graduated_no" value="no" {{ optional($pagedata_eduhis)->graduated_from == 'no' ? 'checked' : '' }}>
                                  <label class="form-check-label" for="graduated_no">No</label>
                                </div>
                              </div>
                            </div>






                          </div>

                          <button type="submit" class="btn btn-success">Save</button>

                        </form>
                      </div>
                    </div>
                  </div>



                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Schools</h5>
                      <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                      <!-- Your Education History form fields go here -->
                      <!-- Example: -->
                      <div>
                        <form action="{{url('/') }}/profile_sch" method="POST" enctype="multipart/form-data">
                          @csrf

                          @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                          @endif

                          @if(session('success'))
                          <div class="alert alert-primary">
                            {{ session('success') }}
                          </div>
                          @endif

                          <div class="row">
                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label" for="country_of_institute">Country of Institute:</label>
                                <div class="input-group input-group-merge">
                                  <input type="text" value="{{ optional($pagedata_sch_detail)->country_of_inst }}" class="form-control" name="country_of_inst" required />
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label" for="name_of_institute">Name of Institute:</label>
                                <div class="input-group input-group-merge">
                                  <input type="text" value="{{ optional($pagedata_sch_detail)->name_of_inst }}" class="form-control" name="name_of_inst" required />
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label" for="level_of_education">Level of Education:</label>
                                <div class="input-group input-group-merge">
                                  <select class="form-select" name="level_of_edu" required>
                                    <option value="" selected disabled>Select Level of Education</option>
                                    <option value="high_school" {{ optional($pagedata_sch_detail)->level_of_edu == 'high_school' ? 'selected' : '' }}>High School</option>
                                    <option value="associate_degree" {{ optional($pagedata_sch_detail)->level_of_edu == 'associate_degree' ? 'selected' : '' }}>Associate Degree</option>
                                    <option value="bachelor_degree" {{ optional($pagedata_sch_detail)->level_of_edu == 'bachelor_degree' ? 'selected' : '' }}>Bachelor's Degree</option>
                                    <!-- Add more options as needed -->
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label" for="primary_language_of_instruction">Primary Language of Instruction:</label>
                                <div class="input-group input-group-merge">
                                  <input type="text" value="{{ optional($pagedata_sch_detail)->primary_lang_instruct }}" class="form-control" name="primary_lang_instruct" required />
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label" for="attended_from_date">Attended Institute from date:</label>
                                <div class="input-group input-group-merge">
                                  <input type="date" value="{{ optional($pagedata_sch_detail)->attended_inst_from }}" class="form-control" name="attended_inst_from" required />
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label" for="attended_to_date">Attended Institute to date:</label>
                                <div class="input-group input-group-merge">
                                  <input type="date" value="{{ optional($pagedata_sch_detail)->attended_inst_to }}" class="form-control" name="attended_inst_to" required />
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label" for="degree_name">Degree Name:</label>
                                <div class="input-group input-group-merge">
                                  <input type="text" value="{{ optional($pagedata_sch_detail)->degree_name }}" class="form-control" name="degree_name" required />
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label">I have graduated from this institution:</label>

                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="graduate_from_inst" id="graduated_yes" value="yes" {{ optional($pagedata_sch_detail)->graduate_from_inst == 'yes' ? 'checked' : '' }}>
                                <label class="form-check-label" for="graduated_yes">Yes</label>
                              </div>

                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="graduate_from_inst" id="graduated_no" value="no" {{ optional($pagedata_sch_detail)->graduate_from_inst == 'no' ? 'checked' : '' }}>
                                <label class="form-check-label" for="graduated_no">No</label>
                              </div>
                            </div>
                          </div>

                          <hr>

                          <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">School Address</h5>
                            <small class="text-muted float-end"></small>
                          </div>

                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-address">Address:</label>
                              <div class="input-group input-group-merge">
                                <input type="text" value="{{ optional($pagedata_sch_detail)->sch_address }}" class="form-control" name="sch_address" required />
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-city-town">City/Town:</label>
                              <div class="input-group input-group-merge">
                                <input type="text" value="{{ optional($pagedata_sch_detail)->sch_city }}" class="form-control" name="sch_city" required />
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-province-state">Province/State:</label>
                              <div class="input-group input-group-merge">
                                <input type="text" value="{{ optional($pagedata_sch_detail)->sch_state }}" class="form-control" name="sch_state" required />
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label class="form-label" for="basic-icon-default-postal-zip-code">Postal Zip Code:</label>
                              <div class="input-group input-group-merge">
                                <input type="text" value="{{ optional($pagedata_sch_detail)->sch_postal_zip }}" class="form-control" name="sch_postal_zip" required />
                              </div>
                            </div>
                          </div>





                      </div>

                      <button type="submit" class="btn btn-success">Save</button>

                      </form>
                    </div>
                  </div>
                </div>
                <div id="Visa" style="display: none;">

                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Visa & Study Permit</h5>
                      <small class="text-muted float-end"></small>
                    </div>

                    <div class="card-body">
                      <div>
                        <form action="{{url('/') }}/profile_visa" method="POST" enctype="multipart/form-data">
                          @csrf

                          @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                          @endif

                          @if(session('success'))
                          <div class="alert alert-primary">
                            {{ session('success') }}
                          </div>
                          @endif

                          <div class="row">


                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label">Have you been refused a visa from Canada, the USA, the United Kingdom, New Zealand, Australia, or Ireland?</label>

                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="refused_visa" id="refused_yes" value="yes" {{ optional($pagedata_visa)->refused_visa == 'yes' ? 'checked' : '' }}>
                                  <label class="form-check-label" for="refused_yes">Yes</label>
                                </div>

                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="refused_visa" id="refused_no" value="no" {{ optional($pagedata_visa)->refused_visa == 'no' ? 'checked' : '' }}>
                                  <label class="form-check-label" for="refused_no">No</label>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label">Which valid study permits or visas do you have?</label>

                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="visa_you_have[]" id="study_permit_canadian" value="Canadian Study Permit/ Visitor Visa" {{ optional($pagedata_visa)->visa_you_have == 'Canadian Study Permit/ Visitor Visa' ? 'checked' : '' }}>
                                  <label class="form-check-label" for="study_permit_canadian">Canadian Study Permit/ Visitor Visa</label>
                                </div>

                                <!-- Add similar blocks for other checkboxes -->

                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="visa_you_have[]" id="study_permit_none" value="I dont have this" {{ optional($pagedata_visa)->visa_you_have == 'I dont have this' ? 'checked' : '' }}>
                                  <label class="form-check-label" for="study_permit_none">I don't have this</label>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="mb-3 form-group">
                                <label class="form-label">More information about your current study permit/visa and any past refusals, if any</label>
                                <div class="input-group input-group-merge">
                                  <textarea class="form-control" name="more_information" rows="4" required>{{ optional($pagedata_visa)->more_information }}</textarea>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-success">Save</button>
                            </div>



                        </form>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end 2    -->



              <!-- 3 -->

              <!-- end 3 -->
            </div>



          </div>



        </div>

        <!--/ Content-->

        <!-- Footer -->

        <footer class="default-footer">

          @include('includes.footer')

          <!-- / Footer -->

          <div class="content-backdrop fade"></div>

      </div>

      <!-- Content wrapper-->

    </div>

    <!-- / Layout page -->

  </div>

  <!-- Overlay -->

  <div class="layout-overlay layout-menu-toggle"></div>

  </div>
  <script>
    var loadFile = function(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById('output');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };





    function general_info() {
      document.getElementById('edu_history').style.display = 'none';
      document.getElementById('Visa').style.display = 'none';
      document.getElementById('genral_info').style.display = 'block';
    }

    function edu_history() {
      document.getElementById('edu_history').style.display = 'block';
      document.getElementById('Visa').style.display = 'none';
      document.getElementById('genral_info').style.display = 'none';
    }


    function visa_study() {

      document.getElementById('edu_history').style.display = 'none';
      document.getElementById('Visa').style.display = 'block';
      document.getElementById('genral_info').style.display = 'none';
    }
  </script>
  <!-- / Layout wrapper -->

  @include('includes.footer_script')

  <!-- footerscrit -->

</body>



</html>