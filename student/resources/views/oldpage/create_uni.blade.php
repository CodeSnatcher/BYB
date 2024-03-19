<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>Create University</title>
    <meta name="description" content="">
    <!-- Headerscript -->
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>



    @include('includes.header_script')
    <style>
        .radiobutton {
            border: 1px solid #d9dee3;
            border-radius: 0.375rem;
            padding: 7px;
        }
    </style>
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
                    <div class="row d-flex justify-content-start">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="mb-0">Create University/College</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('/') }}/add_universities" class="p-3" enctype="multipart/form-data">
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
                                            <div class="m-3">
                                                <label class="form-label" for="university-code">Unique Code <span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" value="UNI-00{{$pagedata->id+1}}" name="uni_code" placeholder="e" required readonly>


                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="m-3 ">
                                                <label class="form-label">Choose Option*</label>
                                                <div class="radiobutton">
                                                    <input type="radio" id="university-radio" name="center_type" value="University" onchange="selectedType(this.value)"> University&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" id="college-radio" name="center_type" value="College" onchange="selectedType(this.value)"> College
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="m-3">
                                                <label class="form-label" for="institution-dropdown">Select Type<span class="text-danger"> *</span></label>
                                                <select class="form-control" id="institution_dropdown" name="uni_clg_type" required>
                                                    <option value="" disabled selected>Select an Option</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="m-3">
                                                <label class="form-label" for="university-name">Univeristy/College Name <span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="university-name" name="uni_name" placeholder="Name">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="m-3">
                                                <label class="form-label" for="university-location">University/College Country <span class="text-danger"> *</span></label>
                                                <select class="form-select" name="source_country">
                                                    @php
                                                    $sortedCountries = $country->sortBy('name');
                                                    @endphp
                                                    @foreach($sortedCountries as $data)
                                                    <option value="{{$data->id}}" @if($data->name === 'INDIA') selected @endif>{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>




                                        <div class="col-sm-6">
                                            <div class="m-3">
                                                <label class="form-label" for="university-location">Univeristy/College State<span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" name="state" placeholder="State">

                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="m-3">
                                                <label class="form-label" for="university-location">Univeristy/College Distt <span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" name="distt" placeholder="Distt">

                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="m-3">
                                                <label class="form-label" for="university-location">Univeristy/College City <span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" name="city" placeholder="City">

                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="m-3">
                                                <label class="form-label" for="university-location">Univeristy/College Near By <span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" name="near_by" placeholder="Near By">

                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="m-3">
                                                <label for="from-date" class="form-label">Univeristy/College Establish Year <span class="text-danger"> *</span></label>

                                                <select class="form-control" name="est_year" required>
                                                    <option value="" disabled selected>Select an Option</option>
                                                    <?php
                                                    for ($i = 1950; $i <= date('Y'); $i++) {
                                                        echo '<option value="' . $i . '" >' . $i . '</option>';
                                                    }

                                                    ?>

                                                </select>


                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="m-3">
                                                <label class="form-label" for="website">Univeristy/College Website<span class="text-danger"> *</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="website" name="uni_website" placeholder="Website" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="m-3">
                                                <label class="form-label" for="email">Univeristy/College Email <span class="text-danger"> *</span></label>
                                                <input type="email" class="form-control" id="email" name="uni_email" placeholder="Email">
                                                <div id="email-error" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="m-3">
                                                <label class="form-label" for="phone-number">Univeristy/College Phone Number <span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="phone-number" name="uni_phone" placeholder=" Phone Number" required>
                                            </div>
                                        </div>


                                        <div class="list_wrapper mb-3">
                                            <div class="row ">
                                                <div class="col-5">
                                                    <div class="m-3 form-group">
                                                        <label class="form-label"> (UGC) affiliation letter/Certificate Name</label>
                                                        <input type="text" class="form-control" name="certi_name[]" placeholder="Certificate Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="m-3 form-group">
                                                        <label class="form-label"> (UGC) affiliation letter/Certificate File</label>
                                                        <input type="file" class="form-control" name="certi_url[]" accept=".pdf" placeholder="Certificate File" required>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class=" m-3 form-group">
                                                        <label class="form-label">Add More</label>
                                                        <button type="button" class="list_add_button btn btn btn-success"> <i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="m-3">
                                                <label class="form-label">Description:</label>

                                                <div class="input-group input-group-merge">


                                                    <textarea class="form-control" id="editor" name="description" rows="2" cols="50"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save</button>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="default-footer">
                    @include('includes.footer')
                </footer>

                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- Layout page -->

        <!-- Overlay and Footer Script -->
        <div class="layout-overlay layout-menu-toggle"></div>
        @include('includes.footer_script')
        <script>
            function selectedType(selctvalue) {
                var selectValues = "";
                $('#institution_dropdown').empty();
                if (selctvalue == 'University') {
                    selectValues = {
                        "Central University": "Central University",
                        "State University": "State University",
                        "Deemed to be University": "Deemed to be University",
                        "Private University": "Private University"
                    };

                } else if (selctvalue == 'College') {
                    selectValues = {
                        "Autonomous College": "Autonomous College",
                        "Affiliated with Government University": "Affiliated with Government University"
                    };
                }
                var $mySelect = $('#institution_dropdown');
                $.each(selectValues, function(key, value) {
                    var $option = $("<option/>", {
                        value: key,
                        text: value
                    });
                    $mySelect.append($option);
                });
            }
            $(document).ready(function() {
                var x = 0; //Initial field counter
                var list_maxField = 15; //Input fields increment limitation
                $('.list_add_button').click(function() {
                    if (x < list_maxField) {
                        x++; //Increment field counter
                        var list_fieldHTML = '  <div class="row"> <div class="col-5">  <div class="m-3 form-group"> <label > (UGC) affiliation letter/Certificate Name</label>   <input type="text" class="form-control" name="certi_name[]" required>  </div> </div>  <div class="col-5"> <div class=" m-3  form-group">  <label > (UGC) affiliation letter/Certificate File</label> <input type="file" class="form-control" name="certi_url[]" accept=".pdf" required>  </div> </div> <div class="col-1"> <div class=" m-3  form-group">  <label class="form-label" >Remove</label>  <button type="button" class="list_remove_button  btn btn btn-danger"> <i class="fa fa-minus"></i></button>  </div> </div>  </div>';
                        $('.list_wrapper').append(list_fieldHTML); //Add field html
                    }
                });
                //Once remove button is clicked
                $('.list_wrapper').on('click', '.list_remove_button', function() {
                    $(this).closest('.row').remove(); //Remove field html
                    x--; //Decrement field counter
                });
            });












            ClassicEditor.create(document.querySelector('#editor')).catch(error => {
                console.error(error);
            });
        </script>
</body>

</html>