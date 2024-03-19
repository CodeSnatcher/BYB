<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Buddy_Program</title>

    <?php include('includes/header_script.php'); ?>
    <!--





-->
</head>

<body>

    <!-- ***** Header Area Start ***** -->

    <?php include('includes/light_header.php'); ?>




    <section class="my-5 py-5" id="university">
        <div class="container">
            <div class="bg-image">
                <div class="d-flex mt-5 border border-dark shadow justify-content-center">
                    <form id="university_register" action="phpScript/controllers.php" method="post" class="shadow p-4 ">
                        <div class="row justify-content-evenly align-items-center">
                            <div class="col-md-12">
                                <h2 class="mb-3">University Register</h2>
                                <input type="" class="d-none" name="tag" value="university_register" required>

                            </div>
                            <div class="col-md-5">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="uni_code" required id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">University Code</label>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="uni_name" required id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">University Name</label>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="m-3 d-flex ">
                                    <label class="form-label fw-bold me-2">Choose Option*</label>
                                    <div class="radiobutton d-flex ">
                                        <div class="mx-sm-5 mx-1">
                                            <input type="radio" id="university-radio" name="center_type" value="University" onchange="selectedType(this.value)"> University
                                        </div>
                                        <div>
                                            <input type="radio" id="college-radio" name="center_type" value="College" onchange="selectedType(this.value)"> College
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="source_country" aria-label="Floating label select example">
                                        <option selected>select</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antartica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo">Congo, the Democratic Republic of the</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                        <option value="Croatia">Croatia (Hrvatska)</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="France Metropolitan">France, Metropolitan</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                        <option value="Holy See">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran (Islamic Republic of)</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia, Federated States of</option>
                                        <option value="Moldova">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint LUCIA">Saint LUCIA</option>
                                        <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                        <option value="Span">Spain</option>
                                        <option value="SriLanka">Sri Lanka</option>
                                        <option value="St. Helena">St. Helena</option>
                                        <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Viet Nam</option>
                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                        <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                        <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                    <label for="floatingSelect">University/College Country</label>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="state" aria-label="Floating label select example">
                                        <option value="">Select state</option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Ladakh">Ladakh</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                    <label for="floatingSelect">University/College State</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="distt" required id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">University/College District</label>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="city" required id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">University/College City</label>
                                </div>

                            </div>

                            <div class="col-md-5">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="near_by" required id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">University/College Near By</label>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="est_year" aria-label="Floating label select example">
                                        <option selected>select</option>
                                        <?php
                                        for ($i = 1950; $i <= date('Y'); $i++) {
                                            echo '<option value="' . $i . '" >' . $i . '</option>';
                                        }

                                        ?>
                                    </select>
                                    <label for="floatingSelect">University/College Establish Year</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="uni_website" required id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">University/College Website</label>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" name="uni_phone" required id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">University/College Phone Number</label>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="uni_email" required id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">University/College Email</label>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" required id="new_pass" placeholder="name@example.com">
                                    <label for="floatingInput">University/College Password</label>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" required id="con_pass" placeholder="name@example.com">
                                    <label for="floatingInput">University/College Confirm Password</label>
                                    <p id="message" class="text-danger"></p>
                                </div>

                            </div>






                            <div class="col-md-12">
                                <fieldset>
                                    <button type="submit" class="btn bg-warning-shade">Create Account</button>
                                </fieldset>
                            </div>
                            <span class="mt-3">Existing User <a href="" class="text-danger">Login</a></span>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </section>

    <?php include('includes/light_footer.php') ?>


    <!-- Scripts -->
    <?php include('includes/footer_script.php'); ?>
    <script>
        $('#con_pass').on('keyup', function() {
            if ($('#new_pass').val() != $('#con_pass').val()) {
                $('#message').html('Passwords do not match.').css("display", "block");
                return
            } else {
                $('#message').html('Password Match').css("display", "none");
            }
        });


        function CheckPassword(newpas) {
            var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
            if (newpas.match(passw)) {
                return true;
            } else {
                return false;
            }
        }

        //Submit login_form
        $("#university_register").on("submit", function(e) {
            e.preventDefault();

            var newpas = document.getElementById('new_pass').value;
            var conpass = document.getElementById('con_pass').value;



            if (CheckPassword(newpas) == false || CheckPassword(conpass) == false) {
                $('#message').html('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.').css("display", "block");
            } else {



                $(".loader").css("display", "block");
                var obj = $(this);
                var form = $(this)[0];
                var data = new FormData(form);

                $.ajax({
                    type: "POST",
                    url: e.target.action,
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: "json",

                    success: function(response) {

                        if (response.success == "1") {
                            $(".loader").css("display", "none");
                            $.toast({
                                heading: "<i class='fa fa-check' ></i> " + response.message,
                                position: 'bottom-right',
                                stack: false,
                                icon: 'success'
                            })
                            setTimeout(function() {
                                window.location.replace("https://bringyourbuddy.in/student/public/login");
                            }, 4000);
                        } else {
                            $(".loader").css("display", "none");
                            $.toast({
                                heading: response.message,
                                position: 'bottom-right',
                                stack: false,
                                icon: 'error'
                            })
                        }
                    }
                });
            }

        });
    </script>

</body>


</html>