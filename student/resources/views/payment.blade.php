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
                        <!-- <div class="fs-3 text-primary">Account Balances</div> -->
                        <!-- <div class="row">
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card" class="rounded" />

                                            </div>
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                    <a class="dropdown-item" href="#">View More</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="fw-semibold d-block mb-1">Apply Credits</span>
                                        <h4 class="card-title mb-2">$0.00 USD</h4>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <h4 class="mt-3 text-primary">Payment History</h4>
                        <!-- <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Search</label>
                                    <input type="search" class="form-control" id="exampleFormControlInput1" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">From Date</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="From Date">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">To Date</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="To Date">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Min Amount</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="min-Amount">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Max Amount</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="max-Amount">
                                </div>
                            </div>
                        </div> -->
                        <div class="card shadow p-3 rounded-2">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th scope="col">Payment ID</th>
                                        <th scope="col">University</th>
                                        <th scope="col">Program</th>
                                        <th scope="col">Pay Date</th>
                                        <th scope="col">paid Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Reciept</th>
                                    </thead>
                                    <tbody>
                                        @foreach($pagedata as $key => $application_data)
                                        @php
                                        $key++;
                                        @endphp

                                        @if($application_data -> app_status==2)

                                        <tr class="border">

                                            <td>{{$application_data -> app_id}}</td>
                                            <td>{{$application_data -> uni_name}}</td>
                                            <td>{{$application_data -> course_name}}</td>
                                            <td>
                                                {{$application_data -> app_date}}
                                            </td>
                                            <td>${{$application_data -> anl_fee}}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="fs-4">Paid</div>
                                                    <i class="fa-solid fa-check fs-3 text-center text-success"></i>
                                                </div>

                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#invoice">
                                                    Reciept
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="invoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-body">
                                                                <div class="card border">
                                                                    <div class="card-body mx-1">

                                                                        <p class=" fs-4 text-dark text-center ">Thank for your purchase</p>
                                                                        <div class="row">
                                                                            <ul class="list-unstyled">
                                                                                <li class="text-muted mt-1"><span class="text-black">Invoice</span> #12345</li>
                                                                                <li class="text-black d-flex justify-content-between">
                                                                                    <div class="fs-5 ">
                                                                                        University
                                                                                    </div>
                                                                                    <div class="fs-5 ">
                                                                                        {{$application_data -> uni_name}}

                                                                                    </div>
                                                                                </li>
                                                                                <li class="text-black d-flex justify-content-between">
                                                                                    <div class="fs-5 ">
                                                                                        Course
                                                                                    </div>
                                                                                    <div class="fs-5 ">
                                                                                        {{$application_data -> course_name}}
                                                                                    </div>
                                                                                </li>
                                                                                <li class="text-black d-flex justify-content-between">
                                                                                    <div class="fs-5 ">
                                                                                        Payment Date
                                                                                    </div>
                                                                                    <div class="fs-5 ">
                                                                                        {{$application_data -> app_date}}
                                                                                    </div>
                                                                                </li>

                                                                            </ul>
                                                                            <hr>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-xl-10">
                                                                                <p>Amount</p>
                                                                            </div>
                                                                            <div class="col-xl-2">
                                                                                <p class="float-end text-dark">${{$application_data -> anl_fee}}
                                                                                </p>
                                                                            </div>
                                                                            <hr style="border: 2px solid black;">
                                                                        </div>
                                                                        <div class="row text-black">

                                                                            <div class="col-xl-12">
                                                                                <div class="d-flex align-items-center gap-2">
                                                                                    <div class="fs-4">Paid</div>
                                                                                    <i class="fa-solid fa-check fs-3 text-center text-success"></i>
                                                                                </div>

                                                                            </div>

                                                                        </div>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        @endif

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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

</body>

</html>