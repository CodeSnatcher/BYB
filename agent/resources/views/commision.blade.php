<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no minimum-scale=1.0, maximum-scale=1.0" />
    <title>Agent-Commision</title>
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
                        <div class="fs-3 text-primary">Account Balances</div>
                        <div class="row">
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
                                        <span class="fw-semibold d-block mb-1">Balance</span>
                                        <h4 class="card-title mb-2">{{$partner_data->balance}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-3 text-primary">Payment History</h4>

                        <div class="card shadow p-3 rounded-2">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th scope="col">Pay ID</th>
                                        <th scope="col">Student</th>
                                        <th scope="col">University</th>
                                        <th scope="col">Program</th>
                                        <th scope="col">paid Amount</th>
                                        <th scope="col">Commission</th>
                                        <th scope="col">Pay Date</th>
                                    </thead>
                                    <tbody>
                                        @foreach($history_data as $key => $history)

                                        @php

                                        $key++;

                                        @endphp


                                        <tr>
                                            <td>{{$history->pay_id}}</td>
                                            <td>{{$history->stu_name}}</td>
                                            <td>{{$history->uni_name}}</td>
                                            <td>{{$history->course_name}}</td>
                                            <td>{{$history->paid_amount}}</td>
                                            <td>{{$history->commission}}</td>
                                            <td>{{$history->date}}</td>

                                        </tr>
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