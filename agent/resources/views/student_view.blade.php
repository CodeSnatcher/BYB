<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>View</title>

    <meta name="description" content="" />

    @include('includes.header_script')

</head>

<body>

    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">

            @include('includes.sidebar')

            <div class="layout-page">

                @include('includes.header')

                <div class="container mt-3">

                    <div class="card mb-4">

                        <div class="card-header d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">View Students</h5>

                        </div>

                        <div class="container">

                            <div class="card">
                                <h5 class="card-header">Display Student Details</h5>

                                <div class="table-responsive text-nowrap">

                                    <table class="table" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="false" data-show-columns="true" data-show-columns-toggle-all="true" data-detail-view="false" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">

                                        <thead>

                                            <tr>

                                                <th>#</th>

                                                <th> Name</th>


                                                <th>Email</th>

                                                <th>Phone No.</th>

                                                <th>Student Photo</th>

                                                <th>Status</th>

                                                <th>Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            @foreach($pagedata as $key => $data)

                                            @php

                                            $key++;

                                            @endphp

                                            <tr>

                                                <td>{{$key}}</td>

                                                <td>{{$data->name}}</td>



                                                <td>{{$data->email}}</td>

                                                <td>{{$data->phone_no}}</td>

                                                <td><a href="{{ asset('uploads/student_photo/' .$data->photo)}}" target="blank"><img class="table_img" src="{{ asset('uploads/student_photo/' .$data->photo)}}" style="height:50px !important; "></a></td>

                                                <td>
                                                    @if($data->status == 1)
                                                    <div class="form-check form-switch">
                                                        <input id="status" onchange="update_status({{$data -> id}},0)" checked class="form-check-input" value="0" type="checkbox" role="switch">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                    </div>

                                                    @else
                                                    <div class="form-check form-switch">
                                                        <input id="status" onchange="update_status({{$data -> id}},1)" class="form-check-input" value="0" type="checkbox" role="switch">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                    </div>

                                                    @endif
                                                </td>

                                                <td>

                                                    <a href="{{url('view_detail_student',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>

                                                    <a href="{{url('editstudent',$data->id)}}" class="btn btn-primary btn-sm"><i class=" bx bx-pencil"></i></a>

                                                    <!-- <form class="mb-3 d-inline" action="{{url('/') }}/deletestudent" method="POST" type="button" onsubmit="return confirm('This student will be delete')">

                                                        @csrf

                                                        <input type="hidden" name="id" class="form-control" value="{{ $data->id }}" />

                                                        <button type="submit" class="btn btn-danger btn-sm"><i class=" bx bx-trash"></i></button>

                                                    </form> -->

                                                </td>

                                            </tr>

                                            @endforeach

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                        <footer class="default-footer">

                            @include('includes.footer')

                            <div class="content-backdrop fade"></div>

                    </div>

                </div>

            </div>

            <div class="layout-overlay layout-menu-toggle"></div>

            @include('includes.footer_script')

        </div>

    </div>
    <script>
        function update_status(student_id,update_val) {

            
            $.ajax({
                type: "POST",
                url: '{{url("/")}}/update_student_status',
                data: {
                    'student_id': student_id,
                    'status': update_val,
                    '_token': '{{csrf_token()}}',
                },
                success: function(response) {
                    if (response.error == "1") {
                        $.toast({
                            heading: "<i class='fa fa-warning' ></i> " + response.error_msg,
                            position: 'top-right',
                            stack: false
                        })
                    } else {


                        toastMixin.fire({
                            animation: true,
                            title: 'Application updated Successfully'
                        });
                        setTimeout(()=>{

                            location.reload();
                        },3000)
                    }
                }
            });
        }
    </script>
</body>

<script>

</script>

</html>