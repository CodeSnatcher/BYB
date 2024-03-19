<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Admin access</title>
  <meta name="description" content="" />

  <!-- Headerscript -->
  @include('includes.header_script')





  <!-- Add DataTables CSS -->

</head>
<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      @include('includes.sidebar')
      <!-- Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        @include('includes.header')
        <!-- Navbar -->

        <!-- Centered Form -->
        <div class="container mt-3">
        <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">View</h5>
     <!-- <small class="text-muted float-end">Add Access Data</small> -->
     </div>

        <div class="container">
          <div class="card">
            <h5 class="card-header">Display Course</h5>
            <div class="table-responsive text-nowrap">

            <table class="table" data-toggle="table"    
    data-toolbar="#toolbar"
 data-search="true"
 data-show-refresh="true"
 data-show-toggle="true"
 data-show-fullscreen="false"
 data-show-columns="true"
 data-show-columns-toggle-all="true"
 data-detail-view="false"
 data-show-export="true"
 data-click-to-select="true"
 data-detail-formatter="detailFormatter"
 data-minimum-count-columns="2"
 data-show-pagination-switch="true"
 data-pagination="true"
 data-id-field="id"
 data-page-list="[10, 25, 50, 100, all]"
 data-show-footer="true"
 data-side-pagination="server"
 data-response-handler="responseHandler">
                <thead>
                  <tr>
                    <th>Course Id</th>
                    <th>Course Name</th>
                    <th>Course Code (Reference number)</th>
                    <th>Course Type</th>
                   
                    <th>Course Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($pagedata as $key => $course)
                @php
                $key++;
                @endphp
                <tr>
                  <td>{{$key}}</td>
                  <td>{{$course->course_name}}</td>
                  <td>{{$course->course_code}}</td>
                  <td>{{$course->course_type}}</td>
                  
                  
                  <td>@if($course->status==1)<span class="btn btn-success btn-xs">Active</span>@else <span class="btn btn-warning btn-xs">Inactive</span>@endif</td>
                  <td>
                  <a href="{{ route('course.view', ['id' => $course->id]) }}">
  <button type="button" class="btn btn-warning btn-sm">View</button>
</a>
                    <a href="{{ route('course.delete',['id'=> $course->id])}}" onclick="return confirm('Are you sure you want to delete this record?')">
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </a>
                    <a href="{{ route('course.edit',['id'=> $course->id])}}"><button type="submit" class="btn btn-primary btn-sm">Edit</button></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <footer class="default-footer">
        @include('includes.footer')
        <!-- Footer -->

        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- Layout page -->
  </div>
  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  <!-- Layout wrapper -->
  @include('includes.footer_script')
  <!-- Footerscript -->

  <!-- Add DataTables JavaScript -->
 
  
</body>
</html>
