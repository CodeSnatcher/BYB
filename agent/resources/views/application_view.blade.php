<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Applications</title>
    <meta name="description" content="" />
    <style>
        #email_box {
            font-size: 200px !important;
        }
    </style>

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
                                <h5 class="card-header">View Applications</h5>

                                <!-- Modal -->

                                <div class="table-responsive text-nowrap">

                                    <table class="table" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="false" data-show-columns="true" data-show-columns-toggle-all="true" data-detail-view="false" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">
                                        <thead>
                                            <tr>
                                                <th>Student</th>
                                                <th>University</th>
                                                <th>Course </th>
                                                <th>Annual <br> Price</th>
                                                <th>Application <br> Price</th>
                                                <th>Apply Date</th>
                                                <th>Status</th>
                                                <th>PDF</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pagedata as $key => $application_data)
                                            @php
                                            $key++;
                                            @endphp

                                            <tr>
                                                <td>{{$application_data -> stu_name}}</td>
                                                <td>{{$application_data -> uni_name}}</td>
                                                <td>{{$application_data -> course_name}}</td>
                                                <td>{{$application_data -> anl_fee}}</td>
                                                <td>{{$application_data -> reg_fees}}</td>
                                                <td>{{$application_data -> app_date}}</td>

                                                <td>



                                                    @if($application_data -> app_status==0)
                                                    <button type="button" class="btn btn-danger btn-xs">Pending</button>

                                                    @elseif($application_data -> app_status==1)
                                                    <button type="button" class="btn btn-primary btn-xs">Application Verification</button>


                                                    @elseif($application_data -> app_status==2)
                                                    <button type="button" class="btn btn-success btn-xs">Registeration Fee</button>

                                                    @elseif($application_data -> app_status==3)
                                                    <button type="button" class="btn btn-dark btn-xs">Document Verification</button>

                                                    @elseif($application_data -> app_status==4)
                                                    <button type="button" class="btn btn-success btn-xs">Offer Letter</button>

                                                    @elseif($application_data -> app_status==5)
                                                    <button type="button" class="btn btn-primary btn-xs">Program Fee</button>

                                                    @else
                                                    <button type="button" class="btn btn-success btn-xs">Admission Letter</button>

                                                    @endif

                                                </td>
                                                <!-- <td>
                                                    @if($application_data -> app_status==1)
                                                    <button type="button" class="btn btn-danger btn-sm">Apply</button>
                                                    @else
                                                    <button disabled type="button" class="btn btn-danger btn-sm">Apply</button>
                                                    @endif
                                                </td> -->

                                                <td>
                                                    <form action="{{ url('/') }}/doc_pdf" method="post">
                                                        @csrf
                                                        <input type="text" hidden name="stu_id" value="{{$application_data->stu_id}}" id="">
                                                        <input type="text" hidden name="course_id" value="{{$application_data->course_id}}" id="">
                                                        <input type="text" hidden name="uni_id" value="{{$application_data->uni_id}}" id="">
                                                        <button type="submit" class="btn btn-dark btn-sm">PDF</button>
                                                    </form>
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
            <div class="modal fade" id="email_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card rounded-3 border shadow p-3 mb-3">
                                        <div class="d-flex gap-3 align-items-center">
                                            <img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/dummy_logo.png" class="rounded-3 mt-3" style="width: 80px !important;" alt="University-logo" />
                                            <div>
                                                <div class="fs-4 text-danger text-decoration-underline" id="univ_name"></div>
                                                <!-- <div class="text-secondary" style="font-size: 12px !important;">Windsor, Ontario, CA</div> -->
                                            </div>
                                        </div>
                                        <h4 id="stu_name" class="text-primary my-2">BCA</h4>
                                        <div class="fs-6 mt-2">Eligibilty : <span id="elig"></span>A-Level</div>
                                        <h4 id="crs_name" class="text-dark  mb-0 text-decoration-underline ">BCA</h4>
                                        <hr class="my-2">

                                        <div class="d-flex justify-content-between mb-3">
                                            <div class="fw-bold">Duration</div>
                                            <div><span id="dur_month"></span> Months / <span id="dur_sem"></span> Sem / <span id="dur_year"></span> Year</div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <div class="fw-bold">Annual Fee</div>
                                            <div>$ <span id="annul_fee"></span></div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <div class="fw-bold">Annual Fee</div>
                                            <div>$ <span id="reg_fees"></span></div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <div class="fw-bold">Application Status</div>
                                            <div class="btn btn-warning btn-xs">In-Progress</div>
                                        </div>
                                    </div>
                                    <form action="{{url('ol_gen_mail')}}" method="post">
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
                                        <!-- <button type="button" onclick="sendemail()" class="btn btn-primary w-100 mt-2">Send Email</button> -->
                                        <div id="form_field">

                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 mt-2">Send Email</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add DataTables JavaScript -->
            </div>
            <div class="modal fade" id="stu_con_email_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <h5 class="text-center text-dark">Send Confirmation Mail to Student</h5>

                                    <form action="{{url('stu_con_mail')}}" method="post">
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
                                        <!-- <button type="button" onclick="sendemail()" class="btn btn-primary w-100 mt-2">Send Email</button> -->
                                        <div id="stu_con_field">

                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 mt-2">Send Email</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add DataTables JavaScript -->
            </div>

            <div class="modal fade" id="doc_ver_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <h5 class="text-center text-dark">Send Mail to Student for Update there document</h5>

                                    <form action="{{url('doc_verify')}}" method="post">
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



                                        <script>
                                            toastMixin.fire({
                                                animation: true,
                                                title: 'Email Sent Successfully'
                                            });
                                        </script>


                                        @endif
                                        <!-- <button type="button" onclick="sendemail()" class="btn btn-primary w-100 mt-2">Send Email</button> -->
                                        <div id="doc_ver_field">

                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 mt-2">Send Email</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add DataTables JavaScript -->
            </div>
        </div>

        <script>
         

            function gen_pdf(stu_id, course_id, uni_id) {
                $.ajax({
                    type: "POST",
                    url: '{{url("/")}}/doc_pdf',
                    data: {
                        "stu_id": stu_id,
                        "course_id": course_id,
                        "uni_id": uni_id,
                        "_token": '{{csrf_token()}}'
                    },

                });

            }
        </script>


</body>

</html>