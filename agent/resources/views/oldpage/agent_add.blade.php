<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>Add Agents</title>

    <meta name="description" content="">



    <!-- Headerscript -->

    @include('includes.header_script')

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

                                    <h5 class="mb-0">Add Agents </h5>

                                </div>

                                <div class="card-body">

                                    <form method="POST" action="{{ url('/') }}/add_agents" enctype="multipart/form-data">

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

                                                <div class="mb-3">

                                                    <label class="form-label">Business Certificate</label>

                                                    <input type="file" class="form-control" name="business_certificate" accept=".pdf" required>

                                                </div>

                                            </div>

                                            <div class="col-sm-6">

                                                <div class="mb-3">

                                                    <label class="form-label">Business Logo</label>

                                                    <input type="file" class="form-control" name="business_logo" required>

                                                </div>

                                            </div>

                                            <div class="col-sm-6">

                                                <div class="mb-3">

                                                    <label class="form-label">First Name</label>

                                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required>

                                                </div>

                                            </div>

                                            <div class="col-sm-6">

                                                <div class="mb-3">

                                                    <label class="form-label">Last Name</label>

                                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>

                                                </div>

                                            </div>

                                            <div class="col-sm-6">

                                                <div class="mb-3">

                                                    <label class="form-label">Email</label>

                                                    <input class="form-control" type="email" name="email" placeholder="Email" required>

                                                </div>

                                            </div>

                                            <div class="col-sm-6">

                                                <div class="mb-3">

                                                    <label class="form-label">Phone Number</label>

                                                    <input type="text" class="form-control" name="phone_no" placeholder="Phone Number" required>

                                                </div>

                                            </div>

                                            <div class="col-sm-6">

                                                <div class="mb-3">

                                                    <label class="form-label">Contact Method</label>

                                                    <select class="form-select" name="contact_method" required>

                                                        <option disabled selected hidden class="sr-only">select</option>

                                                        <option value="Call/ SMS/ Email">Call/ SMS/ Email</option>

                                                        <option value="Skype">Skype</option>

                                                        <option value="WhatsApp">WhatsApp</option>

                                                        <option value="WeChat">WeChat</option>

                                                        <option value="Telegram">Telegram</option>

                                                    </select>

                                                </div>

                                            </div>

                                            <div class="col-sm-6">

                                                <div class="mb-3">

                                                    <label class="form-label">How did you find out about applyboard?</label>

                                                    <select class="form-select" name="find_out" required>

                                                        <option disabled selected hidden class="sr-only">select</option>

                                                        <option value="Social Media Platform">Social Media Platform</option>

                                                        <option value="LinkedIn">LinkedIn</option>

                                                        <option value="Word Of Mouth">Word Of Mouth</option>

                                                        <option value="Through A Student">Through A Student</option>

                                                        <option value="ApplyBoard Approached Me">ApplyBoard Approached Me</option>

                                                    </select>

                                                </div>

                                            </div>

                                            <div class="col-sm-6">

                                                <div class="mb-3">

                                                    <label class="form-label">In which year did you begin recruiting students?</label>

                                                    <input class="form-control" type="date" name="recruiting_year" required>

                                                </div>

                                            </div>

                                            <div class="col-sm-6">

                                                <div class="mb-3">

                                                    <label class="form-label">Has anyone at applyboard referred you?if yes,who?(optional)</label>

                                                    <input type="text" class="form-control" name="reference" placeholder="Has anyone at applyboard referred you?if yes,who">

                                                </div>

                                            </div>



                                            <div class="col-sm-6">

                                                <div class="mb-3">

                                                    <label class="form-label">Please specify the main source country of your students</label>

                                                    <select class="form-select" name="source_country" required>



                                                        <option disabled="disabled" selected="selected">select languages</option>

                                                        <option value="AF">Afghanistan</option>

                                                        <option value="AX">Aland Islands</option>

                                                        <option value="AL">Albania</option>

                                                        <option value="DZ">Algeria</option>

                                                        <option value="AS">American Samoa</option>

                                                        <option value="AD">Andorra</option>

                                                        <option value="AO">Angola</option>

                                                        <option value="AI">Anguilla</option>

                                                        <option value="AQ">Antarctica</option>

                                                        <option value="AG">Antigua and Barbuda</option>

                                                        <option value="AR">Argentina</option>

                                                        <option value="AM">Armenia</option>

                                                        <option value="AW">Aruba</option>

                                                        <option value="AU">Australia</option>

                                                        <option value="AT">Austria</option>

                                                        <option value="AZ">Azerbaijan</option>

                                                        <option value="BS">Bahamas</option>

                                                        <option value="BH">Bahrain</option>

                                                        <option value="BD">Bangladesh</option>

                                                        <option value="BB">Barbados</option>

                                                        <option value="BY">Belarus</option>

                                                        <option value="BE">Belgium</option>

                                                        <option value="BZ">Belize</option>

                                                        <option value="BJ">Benin</option>

                                                        <option value="BM">Bermuda</option>

                                                        <option value="BT">Bhutan</option>

                                                        <option value="BO">Bolivia</option>

                                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>

                                                        <option value="BA">Bosnia and Herzegovina</option>

                                                        <option value="BW">Botswana</option>

                                                        <option value="BV">Bouvet Island</option>

                                                        <option value="BR">Brazil</option>

                                                        <option value="IO">British Indian Ocean Territory</option>

                                                        <option value="BN">Brunei Darussalam</option>

                                                        <option value="BG">Bulgaria</option>

                                                        <option value="BF">Burkina Faso</option>

                                                        <option value="BI">Burundi</option>

                                                        <option value="KH">Cambodia</option>

                                                        <option value="CM">Cameroon</option>

                                                        <option value="CA">Canada</option>

                                                        <option value="CV">Cape Verde</option>

                                                        <option value="KY">Cayman Islands</option>

                                                        <option value="CF">Central African Republic</option>

                                                        <option value="TD">Chad</option>

                                                        <option value="CL">Chile</option>

                                                        <option value="CN">China</option>

                                                        <option value="CX">Christmas Island</option>

                                                        <option value="CC">Cocos (Keeling) Islands</option>

                                                        <option value="CO">Colombia</option>

                                                        <option value="KM">Comoros</option>

                                                        <option value="CG">Congo</option>

                                                        <option value="CD">Congo, Democratic Republic of the Congo</option>

                                                        <option value="CK">Cook Islands</option>

                                                        <option value="CR">Costa Rica</option>

                                                        <option value="CI">Cote D'Ivoire</option>

                                                        <option value="HR">Croatia</option>

                                                        <option value="CU">Cuba</option>

                                                        <option value="CW">Curacao</option>

                                                        <option value="CY">Cyprus</option>

                                                        <option value="CZ">Czech Republic</option>

                                                        <option value="DK">Denmark</option>

                                                        <option value="DJ">Djibouti</option>

                                                        <option value="DM">Dominica</option>

                                                        <option value="DO">Dominican Republic</option>

                                                        <option value="EC">Ecuador</option>

                                                        <option value="EG">Egypt</option>

                                                        <option value="SV">El Salvador</option>

                                                        <option value="GQ">Equatorial Guinea</option>

                                                        <option value="ER">Eritrea</option>

                                                        <option value="EE">Estonia</option>

                                                        <option value="ET">Ethiopia</option>

                                                        <option value="FK">Falkland Islands (Malvinas)</option>

                                                        <option value="FO">Faroe Islands</option>

                                                        <option value="FJ">Fiji</option>

                                                        <option value="FI">Finland</option>

                                                        <option value="FR">France</option>

                                                        <option value="GF">French Guiana</option>

                                                        <option value="PF">French Polynesia</option>

                                                        <option value="TF">French Southern Territories</option>

                                                        <option value="GA">Gabon</option>

                                                        <option value="GM">Gambia</option>

                                                        <option value="GE">Georgia</option>

                                                        <option value="DE">Germany</option>

                                                        <option value="GH">Ghana</option>

                                                        <option value="GI">Gibraltar</option>

                                                        <option value="GR">Greece</option>

                                                        <option value="GL">Greenland</option>

                                                        <option value="GD">Grenada</option>

                                                        <option value="GP">Guadeloupe</option>

                                                        <option value="GU">Guam</option>

                                                        <option value="GT">Guatemala</option>

                                                        <option value="GG">Guernsey</option>

                                                        <option value="GN">Guinea</option>

                                                        <option value="GW">Guinea-Bissau</option>

                                                        <option value="GY">Guyana</option>

                                                        <option value="HT">Haiti</option>

                                                        <option value="HM">Heard Island and Mcdonald Islands</option>

                                                        <option value="VA">Holy See (Vatican City State)</option>

                                                        <option value="HN">Honduras</option>

                                                        <option value="HK">Hong Kong</option>

                                                        <option value="HU">Hungary</option>

                                                        <option value="IS">Iceland</option>

                                                        <option value="IN">India</option>

                                                        <option value="ID">Indonesia</option>

                                                        <option value="IR">Iran, Islamic Republic of</option>

                                                        <option value="IQ">Iraq</option>

                                                        <option value="IE">Ireland</option>

                                                        <option value="IM">Isle of Man</option>

                                                        <option value="IL">Israel</option>

                                                        <option value="IT">Italy</option>

                                                        <option value="JM">Jamaica</option>

                                                        <option value="JP">Japan</option>

                                                        <option value="JE">Jersey</option>

                                                        <option value="JO">Jordan</option>

                                                        <option value="KZ">Kazakhstan</option>

                                                        <option value="KE">Kenya</option>

                                                        <option value="KI">Kiribati</option>

                                                        <option value="KP">Korea, Democratic People's Republic of</option>

                                                        <option value="KR">Korea, Republic of</option>

                                                        <option value="XK">Kosovo</option>

                                                        <option value="KW">Kuwait</option>

                                                        <option value="KG">Kyrgyzstan</option>

                                                        <option value="LA">Lao People's Democratic Republic</option>

                                                        <option value="LV">Latvia</option>

                                                        <option value="LB">Lebanon</option>

                                                        <option value="LS">Lesotho</option>

                                                        <option value="LR">Liberia</option>

                                                        <option value="LY">Libyan Arab Jamahiriya</option>

                                                        <option value="LI">Liechtenstein</option>

                                                        <option value="LT">Lithuania</option>

                                                        <option value="LU">Luxembourg</option>

                                                        <option value="MO">Macao</option>

                                                        <option value="MK">Macedonia, the Former Yugoslav Republic of</option>

                                                        <option value="MG">Madagascar</option>

                                                        <option value="MW">Malawi</option>

                                                        <option value="MY">Malaysia</option>

                                                        <option value="MV">Maldives</option>

                                                        <option value="ML">Mali</option>

                                                        <option value="MT">Malta</option>

                                                        <option value="MH">Marshall Islands</option>

                                                        <option value="MQ">Martinique</option>

                                                        <option value="MR">Mauritania</option>

                                                        <option value="MU">Mauritius</option>

                                                        <option value="YT">Mayotte</option>

                                                        <option value="MX">Mexico</option>

                                                        <option value="FM">Micronesia, Federated States of</option>

                                                        <option value="MD">Moldova, Republic of</option>

                                                        <option value="MC">Monaco</option>

                                                        <option value="MN">Mongolia</option>

                                                        <option value="ME">Montenegro</option>

                                                        <option value="MS">Montserrat</option>

                                                        <option value="MA">Morocco</option>

                                                        <option value="MZ">Mozambique</option>

                                                        <option value="MM">Myanmar</option>

                                                        <option value="NA">Namibia</option>

                                                        <option value="NR">Nauru</option>

                                                        <option value="NP">Nepal</option>

                                                        <option value="NL">Netherlands</option>

                                                        <option value="AN">Netherlands Antilles</option>

                                                        <option value="NC">New Caledonia</option>

                                                        <option value="NZ">New Zealand</option>

                                                        <option value="NI">Nicaragua</option>

                                                        <option value="NE">Niger</option>

                                                        <option value="NG">Nigeria</option>

                                                        <option value="NU">Niue</option>

                                                        <option value="NF">Norfolk Island</option>

                                                        <option value="MP">Northern Mariana Islands</option>

                                                        <option value="NO">Norway</option>

                                                        <option value="OM">Oman</option>

                                                        <option value="PK">Pakistan</option>

                                                        <option value="PW">Palau</option>

                                                        <option value="PS">Palestinian Territory, Occupied</option>

                                                        <option value="PA">Panama</option>

                                                        <option value="PG">Papua New Guinea</option>

                                                        <option value="PY">Paraguay</option>

                                                        <option value="PE">Peru</option>

                                                        <option value="PH">Philippines</option>

                                                        <option value="PN">Pitcairn</option>

                                                        <option value="PL">Poland</option>

                                                        <option value="PT">Portugal</option>

                                                        <option value="PR">Puerto Rico</option>

                                                        <option value="QA">Qatar</option>

                                                        <option value="RE">Reunion</option>

                                                        <option value="RO">Romania</option>

                                                        <option value="RU">Russian Federation</option>

                                                        <option value="RW">Rwanda</option>

                                                        <option value="BL">Saint Barthelemy</option>

                                                        <option value="SH">Saint Helena</option>

                                                        <option value="KN">Saint Kitts and Nevis</option>

                                                        <option value="LC">Saint Lucia</option>

                                                        <option value="MF">Saint Martin</option>

                                                        <option value="PM">Saint Pierre and Miquelon</option>

                                                        <option value="VC">Saint Vincent and the Grenadines</option>

                                                        <option value="WS">Samoa</option>

                                                        <option value="SM">San Marino</option>

                                                        <option value="ST">Sao Tome and Principe</option>

                                                        <option value="SA">Saudi Arabia</option>

                                                        <option value="SN">Senegal</option>

                                                        <option value="RS">Serbia</option>

                                                        <option value="CS">Serbia and Montenegro</option>

                                                        <option value="SC">Seychelles</option>

                                                        <option value="SL">Sierra Leone</option>

                                                        <option value="SG">Singapore</option>

                                                        <option value="SX">Sint Maarten</option>

                                                        <option value="SK">Slovakia</option>

                                                        <option value="SI">Slovenia</option>

                                                        <option value="SB">Solomon Islands</option>

                                                        <option value="SO">Somalia</option>

                                                        <option value="ZA">South Africa</option>

                                                        <option value="GS">South Georgia and the South Sandwich Islands</option>

                                                        <option value="SS">South Sudan</option>

                                                        <option value="ES">Spain</option>

                                                        <option value="LK">Sri Lanka</option>

                                                        <option value="SD">Sudan</option>

                                                        <option value="SR">Suriname</option>

                                                        <option value="SJ">Svalbard and Jan Mayen</option>

                                                        <option value="SZ">Swaziland</option>

                                                        <option value="SE">Sweden</option>

                                                        <option value="CH">Switzerland</option>

                                                        <option value="SY">Syrian Arab Republic</option>

                                                        <option value="TW">Taiwan, Province of China</option>

                                                        <option value="TJ">Tajikistan</option>

                                                        <option value="TZ">Tanzania, United Republic of</option>

                                                        <option value="TH">Thailand</option>

                                                        <option value="TL">Timor-Leste</option>

                                                        <option value="TG">Togo</option>

                                                        <option value="TK">Tokelau</option>

                                                        <option value="TO">Tonga</option>

                                                        <option value="TT">Trinidad and Tobago</option>

                                                        <option value="TN">Tunisia</option>

                                                        <option value="TR">Turkey</option>

                                                        <option value="TM">Turkmenistan</option>

                                                        <option value="TC">Turks and Caicos Islands</option>

                                                        <option value="TV">Tuvalu</option>

                                                        <option value="UG">Uganda</option>

                                                        <option value="UA">Ukraine</option>

                                                        <option value="AE">United Arab Emirates</option>

                                                        <option value="GB">United Kingdom</option>

                                                        <option value="US">United States</option>

                                                        <option value="UM">United States Minor Outlying Islands</option>

                                                        <option value="UY">Uruguay</option>

                                                        <option value="UZ">Uzbekistan</option>

                                                        <option value="VU">Vanuatu</option>

                                                        <option value="VE">Venezuela</option>

                                                        <option value="VN">Viet Nam</option>

                                                        <option value="VG">Virgin Islands, British</option>

                                                        <option value="VI">Virgin Islands, U.s.</option>

                                                        <option value="WF">Wallis and Futuna</option>

                                                        <option value="EH">Western Sahara</option>

                                                        <option value="YE">Yemen</option>

                                                        <option value="ZM">Zambia</option>

                                                        <option value="ZW">Zimbabwe</option>

                                                    </select>

                                                </div>

                                            </div>

                                            <div class="col-sm-6">

                                                <div class="mb-3">

                                                    <label class="form-label">What services do you provide to your clients?</label>

                                                    <input type="text" class="form-control" name="services" placeholder="What services do you provide to your clients" required>

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

    </div>



    <!-- Overlay and Footer Script -->

    <div class="layout-overlay layout-menu-toggle"></div>

    @include('includes.footer_script')

    <!-- Footerscript -->

</body>



</html>