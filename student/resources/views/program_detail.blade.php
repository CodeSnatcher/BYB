<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no minimum-scale=1.0, maximum-scale=1.0" />
  <title>Dashboard</title>
  <meta name="description" content="" />


  <!-- headerscript -->
  @include('includes.header_script')



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
            <h1 class="text-center">Program Detail</h1>
            <div class="card rounded-3 p-3 shadow">
              <div class="d-flex gap-3 align-items-center">
                <img src="assets/img/SCC_Logo.png" class="rounded-circle border border-dark" style="width: 120px;" alt="Avatar" />
                <div>
                  <div class="fs-3 text-dark">St. Clair College - Windsor Campus</div>
                  <div class="text-secondary fs-6">Windsor, Ontario, CA</div>
                </div>
              </div>
            </div>
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

</body>

</html>