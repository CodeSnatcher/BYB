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

            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile Setting/</span>edit my profile</h4>

            <!-- Basic Layout -->

            <div class="row">

              <div class="col-xl">

                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">Update Profile</h5>

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





                        <div class="col-sm-6">

                          <div class="mb-3">

                            <label class="form-label">First Name</label>

                            <input type="text" class="form-control" name="first_name" value="{{ isset($pagedata['first_name']) ? $pagedata['first_name'] : '' }}" placeholder="First Name" required>

                          </div>

                        </div>

                        <div class="col-sm-6">

                          <div class="mb-3">

                            <label class="form-label">Last Name</label>

                            <input type="text" class="form-control" name="last_name" value="{{ isset($pagedata['last_name']) ? $pagedata['last_name'] : '' }}" placeholder="Last Name" required>

                          </div>

                        </div>

                        <div class="col-sm-6">

                          <div class="mb-3">

                            <label class="form-label">Email</label>

                            <input class="form-control" type="email" name="email" value="{{ isset($pagedata['email']) ? $pagedata['email'] : '' }}" placeholder="Email" required>

                          </div>

                        </div>





                        <div class="col-sm-6">

                          <div class="mb-3">

                            <label class="form-label">Phone Number</label>

                            <input type="text" class="form-control" name="phone_no" value="{{ isset($pagedata['phone_no']) ? $pagedata['phone_no'] : '' }}" placeholder="Phone Number" required>

                          </div>

                        </div>

                        <div class="col-sm-6">

                          <div class="mb-3">

                            <label class="form-label">Contact Method</label>

                            <select class="form-select" name="contact_method" value="{{ isset($pagedata['contact_method']) ? $pagedata['contact_method'] : '' }}" required>

                              <option disabled selected hidden class="sr-only">select</option>

                              <option value="Call/ SMS/ Email">Call/ SMS/ Email</option>

                              <option value="Skype">Skype</option>

                              <option value="WhatsApp">WhatsApp</option>

                              <option value="WeChat">WeChat</option>

                              <option value="Telegram">Telegram</option>

                            </select>

                          </div>

                        </div>

                        <div class="col-sm-6">

                          <div class="mb-3">

                            <label class="form-label">How did you find out about applyboard?</label>

                            <select class="form-select" name="find_out" value="{{ isset($pagedata['find_out']) ? $pagedata['find_out'] : '' }}" required>

                              <option disabled selected hidden class="sr-only">select</option>

                              <option value="Social Media Platform">Social Media Platform</option>

                              <option value="LinkedIn">LinkedIn</option>

                              <option value="Word Of Mouth">Word Of Mouth</option>

                              <option value="Through A Student">Through A Student</option>

                              <option value="ApplyBoard Approached Me">ApplyBoard Approached Me</option>

                            </select>

                          </div>

                        </div>

                      </div>

                      <button type="submit" class="btn btn-primary">Save</button>

                    </form>


                  </div>

                </div>

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
  </script>
  <!-- / Layout wrapper -->

  @include('includes.footer_script')

  <!-- footerscrit -->

</body>



</html>