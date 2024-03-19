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
                        <div class="card rounded-3 shadow ">
                            <div class="card-header bg-secondary py-2">
                                <span class="text-white fs-5">Unpaid Application</span>
                            </div>
                            <div class="card-body">

                                <div class="row align-items-center justify-content-center mt-3">

                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="w-100">
                                                <thead>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">App#</th>
                                                    <th scope="col">University</th>
                                                    <th scope="col">Program</th>
                                                    <th scope="col">Start Date</th>
                                                    <th scope="col">Fees</th>
                                                    <th scope="col">Action</th>
                                                </thead>

                                                @foreach($pagedata as $key => $application_data)
                                                @php
                                                $key++;
                                                @endphp

                                                @if($application_data -> app_status==5)

                                                @else

                                                <tr class=" ">
                                                    <td>
                                                    @if($application_data -> app_status==0)
                                                        <span class="badge bg-danger mx-auto">Pending</span>

                                                        @elseif($application_data -> app_status==1)
                                                        <span class="badge bg-warning text-dark mx-auto">verifying application</span>

                                                        @elseif($application_data -> app_status==2)
                                                        <span class="badge bg-warning text-dark mx-auto">Pay Registeration Fee</span>

                                                        @elseif($application_data -> app_status==3)
                                                        <span class="badge bg-warning text-dark mx-auto">Document Verification</span>

                                                        @elseif($application_data -> app_status==4)
                                                        <span class="badge bg-warning text-dark mx-auto">Pay Program Fee</span>

                                                        @else
                                                        <span class="badge bg-success mx-auto">Get Offer Letter</span>

                                                        @endif

                                                    </td>
                                                    <td>{{$application_data -> app_id}}</td>
                                                    <td>{{$application_data -> uni_name}}</td>
                                                    <td>{{$application_data -> course_name}}</td>
                                                    <td>
                                                        {{$application_data -> app_date}}
                                                    </td>
                                                    <td>Application Fee</td>
                                                    <td>
                                                        @if($application_data -> app_status==0)

                                                        <button type="button" class="btn btn-danger btn-sm" onclick="del({{$application_data -> app_id}})"><i class="fa-solid fa-trash"></i></button>
                                                        @else
                                                        <button type="button" disabled class="btn btn-danger btn-sm" onclick="del({{$application_data -> app_id}})"><i class="fa-solid fa-trash"></i></button>


                                                        @endif
                                                    </td>
                                                </tr>

                                                @endif

                                                @endforeach


                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- <div class="card-footer">
                                <span>You have no unpaid application</span>
                            </div> -->
                        </div>
                        <div class="d-flex gap-3 mt-5">
                            <button class="btn btn-outline-primary">Find More Programs </button>
                            <button class="btn btn-primary" disabled>Pay For Application </button>
                        </div>
                        <div class="card rounded-3 mt-2">
                            <div class="card-header bg-primary py-2">
                                <span class="text-white fs-5">Paid Application</span>
                            </div>
                            <div class="card-body">

                                <div class="row align-items-center justify-content-center mt-3">

                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="w-100">
                                                <thead>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">App#</th>
                                                    <th scope="col">University</th>
                                                    <th scope="col">Program</th>
                                                    <th scope="col">Start Date</th>
                                                    <th scope="col">Fees</th>
                                                    <th scope="col">Action</th>
                                                </thead>

                                                @foreach($pagedata as $key => $application_data)
                                                @php
                                                $key++;
                                                @endphp

                                                @if($application_data -> app_status==5)
                                                <tr class="">
                                                    <td>
                                                        @if($application_data -> app_status==0)
                                                        <span class="badge bg-danger mx-auto">Pending</span>

                                                        @elseif($application_data -> app_status==1)
                                                        <span class="badge bg-warning text-dark mx-auto">In-Progress</span>

                                                        @else
                                                        <span class="badge bg-success mx-auto">Get Offer Letter</span>

                                                        @endif

                                                    </td>
                                                    <td>{{$application_data -> app_id}}</td>
                                                    <td>{{$application_data -> uni_name}}</td>
                                                    <td>{{$application_data -> course_name}}</td>
                                                    <td>
                                                        {{$application_data -> app_date}}
                                                    </td>
                                                    <td>Application Fee</td>
                                                    <td>
                                                        @if($application_data -> app_status==0)

                                                        <button type="button" class="btn bg-danger text-white btn-sm" onclick="del({{$application_data -> app_id}})"><i class="fa-solid fa-trash"></i></button>
                                                        @else
                                                        <button type="button" disabled class="btn bg-danger text-white btn-sm" onclick="del({{$application_data -> app_id}})"><i class="fa-solid fa-trash"></i></button>


                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif

                                                @endforeach


                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

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
       

        function del(app_id) {

            $.ajax({
                type: "POST",
                url: '{{url("/")}}/del_application',
                data: {
                    'app_id': app_id,
                    '_token': '{{csrf_token()}}'
                },
                success: function(response) {
                    // alert(response);
                    if (response.success == "0") {
                        $.toast({
                            heading: "<i class='fa fa-warning' ></i> " + response.error_msg,
                            position: 'top-right',
                            stack: false
                        })
                        $(".loader").css("display", "none");
                    } else {

                        toastMixin.fire({
                            animation: true,
                            title: 'Application Deleted Successfully'
                        });
                        setTimeout(() => {
                            window.location.reload();
                        }, 4000)


                    };
                }
            });
        }
    </script>
</body>

</html>