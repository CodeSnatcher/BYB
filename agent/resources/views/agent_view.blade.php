<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>



    <meta charset="utf-8" />



    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />



    <title>View Agents</title>



    <meta name="description" content="" />



    @include('includes.header_script')



    <script type="text/javascript" src="js/plugins/interface/datatables.min.js"></script>

    <script src="js/jquery.dataTables.min.js"></script>

    <script src="js/dataTables.buttons.min.js"></script>

    <script src="js/dataTables.bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="css/buttons.dataTables.min.css">

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


                            <h5 class="mb-0">View Sub Agent</h5>

                        </div>

                        <div class="container">

                            <div class="card">
                                <h5 class="card-header">Display Agent Details</h5>

                                <div class="table-responsive text-nowrap">
                                    <table class="table" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="false" data-show-columns="true" data-show-columns-toggle-all="true" data-detail-view="false" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">

                                        <thead>

                                            <tr>

                                                <th>#</th>

                                                <th>First Name</th>

                                                <th>Last Name</th>

                                                <th>Business Logo</th>

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

                                                <td>{{$data->first_name}}</td>

                                                <td>{{$data->last_name}}</td>

                                                <td><a href="{{ asset('uploads/business_logo/' .$data->business_logo)}}" target="blank"><img class="table_img" src="{{ asset('uploads/business_logo/' .$data->business_logo)}}" style="width:80px; height:auto;"></a></td>

                                                <td>
                                                    @if($data->status == 1)
                                                    <div class="form-check form-switch">
                                                        <input id="status" onchange="update_status({{$data -> id}})" checked class="form-check-input" value="0" type="checkbox" role="switch">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                    </div>

                                                    @else
                                                    <div class="form-check form-switch">
                                                        <input id="status" onchange="update_status({{$data -> id}})" class="form-check-input" value="0" type="checkbox" role="switch">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                    </div>

                                                    @endif
                                                </td>

                                                <td class="">

                                                    <a href="{{url('viewdetail_agents',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>

                                                    <a href="{{url('editagent',$data->id)}}" class="btn btn-primary btn-sm"><i class=" bx bx-pencil"></i></a>

                                                    <form class="mb-3 d-inline" action="{{url('/') }}/deleteagent" method="POST" type="button" onsubmit="return confirm('This agent will be delete')">

                                                        @csrf

                                                        <input type="hidden" name="id" class="form-control" value="{{ $data->id }}" />

                                                        <button type="submit" class="btn btn-danger btn-sm"><i class=" bx bx-trash "></i></button>

                                                    </form>

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
        function update_status(agent_id) {

            var update_val = 0;
            if ($('#status').is(':checked')) {
                update_val = 1;
            }
            $.ajax({
                type: "POST",
                url: '{{url("/")}}/update_agent_status',
                data: {
                    'agent_id': agent_id,
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

                        location.reload();
                    }
                }
            });
        }
    </script>

</body>



</html>