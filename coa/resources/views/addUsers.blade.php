<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Add Users</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/images-theme/favicon.ico">

        <!-- App css -->
        <link href="css/css-theme/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/css-theme/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>

    </head>

    <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            @include('adminNavigation')

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="images/user.png" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                    <span class="account-user-name"><strong> {{ $loggedUser->firstname }} {{ $loggedUser->surname }}</strong></span>
                                     <span class="account-position">{{ $loggedUser->login_id }}</span> 
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                                                     <a href="{{ route('log.out') }}" class="dropdown-item notify-item">
                                           <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <div class="app-search dropdown d-none d-lg-block">
                            <form>
                                
                            </form>

                        </div>
                    </div>
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                <!-- start page title -->
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Users</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 
                        <div>
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                <h5 class="message"> {{ session()->get('success') }} </h2>
                                </div>
                            @endif
                        </div>      
                        <div class="card">
                            <div class="card-body">
                            <form method="POST" action="{{ route('save.users') }}" class="users-form" id="users-form"> 
                            @csrf 
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="name" class="form-label">Name </label>
                                    <input class="form-control" type="text" id="name" name="name" placeholder="Enter new staff name" required autocomplete=off>
                                </div>
                                <div class="col-md-1 mb-3">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="department" class="form-label">Select Department</label>
                                    <select name="department" id="department" class="form-control select2 form-select" autocomplete=off required>
                                        <option value="" disabled selected hidden>Choose a deparment</option>
                                        @foreach ($departments as $department)               
                                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1 mb-3">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="role" class="form-label">Select Role</label>
                                    <select name="role" id="role" class="form-control select2 form-select" autocomplete=off required>
                                        <option value="" disabled selected hidden>Choose a role</option>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="address" class="form-label">Address </label>
                                    <textarea class="form-control" name="address" id="address" rows="2" cols="40"  aria-required="true" class="input-data" required></textarea>
                                </div>
                                <div class="col-md-1 mb-3">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="postcode" class="form-label">Postcode </label>
                                    <input class="form-control" type="text" id="postcode" name="postcode" placeholder="Enter the postcode" required autocomplete=off>
                                </div>
                            </div>
                            
                            <div class="row">
                                             <div class="col-md-2 mb-3">
                                                    <label for="country_code_contact" class="form-label">Code</label>
                                                    <select name="country_code_contact" id="country_code_contact" class="form-control select2" data-toggle="select2" autocomplete=off>
                                    <option data-countryCode="IN" value="91" Selected>India (+91)</option>
                                    <option data-countryCode="GB" value="44" >UK (+44)</option>
                                    <option data-countryCode="US" value="1">USA (+1)</option>
<!--                                     <optgroup label="Other countries">
 -->                                        <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                        <option data-countryCode="AD" value="376">Andorra (+376)</option>
                                        <option data-countryCode="AO" value="244">Angola (+244)</option>
                                        <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                                        <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                                        <option data-countryCode="AR" value="54">Argentina (+54)</option>
                                        <option data-countryCode="AM" value="374">Armenia (+374)</option>
                                        <option data-countryCode="AW" value="297">Aruba (+297)</option>
                                        <option data-countryCode="AU" value="61">Australia (+61)</option>
                                        <option data-countryCode="AT" value="43">Austria (+43)</option>
                                        <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                                        <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                                        <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                                        <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                                        <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                                        <option data-countryCode="BY" value="375">Belarus (+375)</option>
                                        <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                        <option data-countryCode="BZ" value="501">Belize (+501)</option>
                                        <option data-countryCode="BJ" value="229">Benin (+229)</option>
                                        <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                                        <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                                        <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                                        <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                                        <option data-countryCode="BW" value="267">Botswana (+267)</option>
                                        <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                        <option data-countryCode="BN" value="673">Brunei (+673)</option>
                                        <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                                        <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                                        <option data-countryCode="BI" value="257">Burundi (+257)</option>
                                        <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                                        <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                                        <option data-countryCode="CA" value="1">Canada (+1)</option>
                                        <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                                        <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                                        <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                                        <option data-countryCode="CL" value="56">Chile (+56)</option>
                                        <option data-countryCode="CN" value="86">China (+86)</option>
                                        <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                        <option data-countryCode="KM" value="269">Comoros (+269)</option>
                                        <option data-countryCode="CG" value="242">Congo (+242)</option>
                                        <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                                        <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                                        <option data-countryCode="HR" value="385">Croatia (+385)</option>
                                        <option data-countryCode="CU" value="53">Cuba (+53)</option>
                                        <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                                        <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                                        <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                                        <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                        <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                                        <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                                        <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                                        <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                                        <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                        <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                                        <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                                        <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                                        <option data-countryCode="EE" value="372">Estonia (+372)</option>
                                        <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                                        <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                                        <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                                        <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                                        <option data-countryCode="FI" value="358">Finland (+358)</option>
                                        <option data-countryCode="FR" value="33">France (+33)</option>
                                        <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                                        <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                                        <option data-countryCode="GA" value="241">Gabon (+241)</option>
                                        <option data-countryCode="GM" value="220">Gambia (+220)</option>
                                        <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                                        <option data-countryCode="DE" value="49">Germany (+49)</option>
                                        <option data-countryCode="GH" value="233">Ghana (+233)</option>
                                        <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                                        <option data-countryCode="GR" value="30">Greece (+30)</option>
                                        <option data-countryCode="GL" value="299">Greenland (+299)</option>
                                        <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                                        <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                                        <option data-countryCode="GU" value="671">Guam (+671)</option>
                                        <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                                        <option data-countryCode="GN" value="224">Guinea (+224)</option>
                                        <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                                        <option data-countryCode="GY" value="592">Guyana (+592)</option>
                                        <option data-countryCode="HT" value="509">Haiti (+509)</option>
                                        <option data-countryCode="HN" value="504">Honduras (+504)</option>
                                        <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                                        <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                        <option data-countryCode="IS" value="354">Iceland (+354)</option>
<!--                                         <option data-countryCode="IN" value="91">India (+91)</option>
 -->                                        <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                                        <option data-countryCode="IR" value="98">Iran (+98)</option>
                                        <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                        <option data-countryCode="IE" value="353">Ireland (+353)</option>
                                        <option data-countryCode="IL" value="972">Israel (+972)</option>
                                        <option data-countryCode="IT" value="39">Italy (+39)</option>
                                        <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                                        <option data-countryCode="JP" value="81">Japan (+81)</option>
                                        <option data-countryCode="JO" value="962">Jordan (+962)</option>
                                        <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                        <option data-countryCode="KE" value="254">Kenya (+254)</option>
                                        <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                                        <option data-countryCode="KP" value="850">Korea North (+850)</option>
                                        <option data-countryCode="KR" value="82">Korea South (+82)</option>
                                        <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                                        <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                                        <option data-countryCode="LA" value="856">Laos (+856)</option>
                                        <option data-countryCode="LV" value="371">Latvia (+371)</option>
                                        <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                                        <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                                        <option data-countryCode="LR" value="231">Liberia (+231)</option>
                                        <option data-countryCode="LY" value="218">Libya (+218)</option>
                                        <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                                        <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                                        <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                                        <option data-countryCode="MO" value="853">Macao (+853)</option>
                                        <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                                        <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                                        <option data-countryCode="MW" value="265">Malawi (+265)</option>
                                        <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                        <option data-countryCode="MV" value="960">Maldives (+960)</option>
                                        <option data-countryCode="ML" value="223">Mali (+223)</option>
                                        <option data-countryCode="MT" value="356">Malta (+356)</option>
                                        <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                                        <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                                        <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                                        <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                                        <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                        <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                                        <option data-countryCode="MD" value="373">Moldova (+373)</option>
                                        <option data-countryCode="MC" value="377">Monaco (+377)</option>
                                        <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                                        <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                                        <option data-countryCode="MA" value="212">Morocco (+212)</option>
                                        <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                                        <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                                        <option data-countryCode="NA" value="264">Namibia (+264)</option>
                                        <option data-countryCode="NR" value="674">Nauru (+674)</option>
                                        <option data-countryCode="NP" value="977">Nepal (+977)</option>
                                        <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                                        <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                                        <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                        <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                        <option data-countryCode="NE" value="227">Niger (+227)</option>
                                        <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                                        <option data-countryCode="NU" value="683">Niue (+683)</option>
                                        <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                        <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                        <option data-countryCode="NO" value="47">Norway (+47)</option>
                                        <option data-countryCode="OM" value="968">Oman (+968)</option>
                                        <option data-countryCode="PW" value="680">Palau (+680)</option>
                                        <option data-countryCode="PA" value="507">Panama (+507)</option>
                                        <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                        <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                                        <option data-countryCode="PE" value="51">Peru (+51)</option>
                                        <option data-countryCode="PH" value="63">Philippines (+63)</option>
                                        <option data-countryCode="PL" value="48">Poland (+48)</option>
                                        <option data-countryCode="PT" value="351">Portugal (+351)</option>
                                        <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                                        <option data-countryCode="QA" value="974">Qatar (+974)</option>
                                        <option data-countryCode="RE" value="262">Reunion (+262)</option>
                                        <option data-countryCode="RO" value="40">Romania (+40)</option>
                                        <option data-countryCode="RU" value="7">Russia (+7)</option>
                                        <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                                        <option data-countryCode="SM" value="378">San Marino (+378)</option>
                                        <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                                        <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                                        <option data-countryCode="SN" value="221">Senegal (+221)</option>
                                        <option data-countryCode="CS" value="381">Serbia (+381)</option>
                                        <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                                        <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                                        <option data-countryCode="SG" value="65">Singapore (+65)</option>
                                        <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                                        <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                                        <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                                        <option data-countryCode="SO" value="252">Somalia (+252)</option>
                                        <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                                        <option data-countryCode="ES" value="34">Spain (+34)</option>
                                        <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                        <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                                        <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                                        <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                                        <option data-countryCode="SD" value="249">Sudan (+249)</option>
                                        <option data-countryCode="SR" value="597">Suriname (+597)</option>
                                        <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                                        <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                        <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                                        <option data-countryCode="SI" value="963">Syria (+963)</option>
                                        <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                        <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                        <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                        <option data-countryCode="TG" value="228">Togo (+228)</option>
                                        <option data-countryCode="TO" value="676">Tonga (+676)</option>
                                        <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                                        <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                                        <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                        <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                                        <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                                        <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                        <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                        <option data-countryCode="UG" value="256">Uganda (+256)</option>
                                        <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                                        <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                                        <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                                        <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                                        <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                                        <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                        <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                        <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                        <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                        <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                        <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                        <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                        <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                        <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                        <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                        <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                        <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
<!--                                     </optgroup>
 -->                                </select> 
                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="contact_tel" class="form-label">Whatsapp Number </label>
                                                    <input class="form-control" type="text" required onkeypress="return onlyNumberKey(event)"  data-toggle="tooltip" data-placement="right" title="Should be digits only" type="text" id="contact_tel" name="contact_tel" placeholder="Enter Whatsapp No." minlength="10" maxlength="10">
                                                   <!--  <span id="mobile-valid" class="hide-text mob" style="color:green";>
                                                        <i class="fa fa-check pwd-valid"></i>Valid Mobile No
                                                    </span> -->   
                                                </div>
                                               
                                                <div class="col-md-2 mb-3">
                                                    <label for="country_code_mobile" class="form-label">Code</label>
                                                    <select name="country_code_mobile" id="country_code_mobile" class="form-control select2" data-toggle="select2" autocomplete=off>
                                    <option data-countryCode="IN" value="91" Selected>India (+91)</option>
                                    <option data-countryCode="GB" value="44" >UK (+44)</option>
                                    <option data-countryCode="US" value="1">USA (+1)</option>
<!--                                     <optgroup label="Other countries">
 -->                                        <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                        <option data-countryCode="AD" value="376">Andorra (+376)</option>
                                        <option data-countryCode="AO" value="244">Angola (+244)</option>
                                        <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                                        <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                                        <option data-countryCode="AR" value="54">Argentina (+54)</option>
                                        <option data-countryCode="AM" value="374">Armenia (+374)</option>
                                        <option data-countryCode="AW" value="297">Aruba (+297)</option>
                                        <option data-countryCode="AU" value="61">Australia (+61)</option>
                                        <option data-countryCode="AT" value="43">Austria (+43)</option>
                                        <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                                        <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                                        <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                                        <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                                        <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                                        <option data-countryCode="BY" value="375">Belarus (+375)</option>
                                        <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                        <option data-countryCode="BZ" value="501">Belize (+501)</option>
                                        <option data-countryCode="BJ" value="229">Benin (+229)</option>
                                        <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                                        <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                                        <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                                        <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                                        <option data-countryCode="BW" value="267">Botswana (+267)</option>
                                        <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                        <option data-countryCode="BN" value="673">Brunei (+673)</option>
                                        <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                                        <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                                        <option data-countryCode="BI" value="257">Burundi (+257)</option>
                                        <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                                        <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                                        <option data-countryCode="CA" value="1">Canada (+1)</option>
                                        <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                                        <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                                        <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                                        <option data-countryCode="CL" value="56">Chile (+56)</option>
                                        <option data-countryCode="CN" value="86">China (+86)</option>
                                        <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                        <option data-countryCode="KM" value="269">Comoros (+269)</option>
                                        <option data-countryCode="CG" value="242">Congo (+242)</option>
                                        <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                                        <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                                        <option data-countryCode="HR" value="385">Croatia (+385)</option>
                                        <option data-countryCode="CU" value="53">Cuba (+53)</option>
                                        <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                                        <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                                        <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                                        <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                        <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                                        <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                                        <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                                        <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                                        <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                        <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                                        <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                                        <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                                        <option data-countryCode="EE" value="372">Estonia (+372)</option>
                                        <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                                        <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                                        <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                                        <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                                        <option data-countryCode="FI" value="358">Finland (+358)</option>
                                        <option data-countryCode="FR" value="33">France (+33)</option>
                                        <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                                        <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                                        <option data-countryCode="GA" value="241">Gabon (+241)</option>
                                        <option data-countryCode="GM" value="220">Gambia (+220)</option>
                                        <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                                        <option data-countryCode="DE" value="49">Germany (+49)</option>
                                        <option data-countryCode="GH" value="233">Ghana (+233)</option>
                                        <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                                        <option data-countryCode="GR" value="30">Greece (+30)</option>
                                        <option data-countryCode="GL" value="299">Greenland (+299)</option>
                                        <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                                        <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                                        <option data-countryCode="GU" value="671">Guam (+671)</option>
                                        <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                                        <option data-countryCode="GN" value="224">Guinea (+224)</option>
                                        <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                                        <option data-countryCode="GY" value="592">Guyana (+592)</option>
                                        <option data-countryCode="HT" value="509">Haiti (+509)</option>
                                        <option data-countryCode="HN" value="504">Honduras (+504)</option>
                                        <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                                        <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                        <option data-countryCode="IS" value="354">Iceland (+354)</option>
<!--                                         <option data-countryCode="IN" value="91">India (+91)</option>
 -->                                        <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                                        <option data-countryCode="IR" value="98">Iran (+98)</option>
                                        <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                        <option data-countryCode="IE" value="353">Ireland (+353)</option>
                                        <option data-countryCode="IL" value="972">Israel (+972)</option>
                                        <option data-countryCode="IT" value="39">Italy (+39)</option>
                                        <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                                        <option data-countryCode="JP" value="81">Japan (+81)</option>
                                        <option data-countryCode="JO" value="962">Jordan (+962)</option>
                                        <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                        <option data-countryCode="KE" value="254">Kenya (+254)</option>
                                        <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                                        <option data-countryCode="KP" value="850">Korea North (+850)</option>
                                        <option data-countryCode="KR" value="82">Korea South (+82)</option>
                                        <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                                        <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                                        <option data-countryCode="LA" value="856">Laos (+856)</option>
                                        <option data-countryCode="LV" value="371">Latvia (+371)</option>
                                        <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                                        <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                                        <option data-countryCode="LR" value="231">Liberia (+231)</option>
                                        <option data-countryCode="LY" value="218">Libya (+218)</option>
                                        <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                                        <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                                        <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                                        <option data-countryCode="MO" value="853">Macao (+853)</option>
                                        <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                                        <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                                        <option data-countryCode="MW" value="265">Malawi (+265)</option>
                                        <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                        <option data-countryCode="MV" value="960">Maldives (+960)</option>
                                        <option data-countryCode="ML" value="223">Mali (+223)</option>
                                        <option data-countryCode="MT" value="356">Malta (+356)</option>
                                        <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                                        <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                                        <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                                        <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                                        <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                        <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                                        <option data-countryCode="MD" value="373">Moldova (+373)</option>
                                        <option data-countryCode="MC" value="377">Monaco (+377)</option>
                                        <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                                        <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                                        <option data-countryCode="MA" value="212">Morocco (+212)</option>
                                        <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                                        <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                                        <option data-countryCode="NA" value="264">Namibia (+264)</option>
                                        <option data-countryCode="NR" value="674">Nauru (+674)</option>
                                        <option data-countryCode="NP" value="977">Nepal (+977)</option>
                                        <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                                        <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                                        <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                        <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                        <option data-countryCode="NE" value="227">Niger (+227)</option>
                                        <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                                        <option data-countryCode="NU" value="683">Niue (+683)</option>
                                        <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                        <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                        <option data-countryCode="NO" value="47">Norway (+47)</option>
                                        <option data-countryCode="OM" value="968">Oman (+968)</option>
                                        <option data-countryCode="PW" value="680">Palau (+680)</option>
                                        <option data-countryCode="PA" value="507">Panama (+507)</option>
                                        <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                        <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                                        <option data-countryCode="PE" value="51">Peru (+51)</option>
                                        <option data-countryCode="PH" value="63">Philippines (+63)</option>
                                        <option data-countryCode="PL" value="48">Poland (+48)</option>
                                        <option data-countryCode="PT" value="351">Portugal (+351)</option>
                                        <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                                        <option data-countryCode="QA" value="974">Qatar (+974)</option>
                                        <option data-countryCode="RE" value="262">Reunion (+262)</option>
                                        <option data-countryCode="RO" value="40">Romania (+40)</option>
                                        <option data-countryCode="RU" value="7">Russia (+7)</option>
                                        <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                                        <option data-countryCode="SM" value="378">San Marino (+378)</option>
                                        <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                                        <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                                        <option data-countryCode="SN" value="221">Senegal (+221)</option>
                                        <option data-countryCode="CS" value="381">Serbia (+381)</option>
                                        <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                                        <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                                        <option data-countryCode="SG" value="65">Singapore (+65)</option>
                                        <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                                        <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                                        <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                                        <option data-countryCode="SO" value="252">Somalia (+252)</option>
                                        <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                                        <option data-countryCode="ES" value="34">Spain (+34)</option>
                                        <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                        <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                                        <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                                        <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                                        <option data-countryCode="SD" value="249">Sudan (+249)</option>
                                        <option data-countryCode="SR" value="597">Suriname (+597)</option>
                                        <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                                        <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                        <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                                        <option data-countryCode="SI" value="963">Syria (+963)</option>
                                        <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                        <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                        <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                        <option data-countryCode="TG" value="228">Togo (+228)</option>
                                        <option data-countryCode="TO" value="676">Tonga (+676)</option>
                                        <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                                        <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                                        <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                        <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                                        <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                                        <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                        <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                        <option data-countryCode="UG" value="256">Uganda (+256)</option>
                                        <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                                        <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                                        <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                                        <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                                        <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                                        <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                        <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                        <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                        <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                        <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                        <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                        <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                        <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                        <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                        <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                        <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                        <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
<!--                                     </optgroup>
 -->                                </select> 
                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="mobile_no" class="form-label">Mobile Number </label>
                                                    <input class="form-control" type="text" required onkeypress="return onlyNumberKey(event)"  data-toggle="tooltip" data-placement="right" title="Should be digits only" type="text" id="mobile_no" name="mobile_no" placeholder="Enter Mobile Number" minlength="10" maxlength="10">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="email" class="form-label">Email </label>
                                                    <input class="form-control" type="email" required id="email" name="email" placeholder="Enter Email address" oninput="emailCheck(this.value)">
                                                    <div class="emailError" id="emailError" style="color:red;">
                                                    
                                                    </div>                                               
                                                 </div>
                                              <!--   <div class="col-md-1">
                                                </div> -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="username" class="form-label">User Name</label>
                                                    <input class="form-control" type="text" required id="username" name="username" placeholder="Enter Username" minlength="4" oninput="usernameCheck(this.value)">
                                                    <div class="usernameError" id="usernameError" style="color:red;">
                                                        
                                                        </div>
                                                    <small id="note" class="form-text text-muted">Username can be any combination of characters and must be at least 4 characters in length.</small>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input class="form-control" type="password" required id="password" name="password" placeholder="Enter Password">
                                                </div>
                                            </div>

                            </div>
                        </div> 
                        <div class="card">
                                    <div class="card-body">
<!--                                     <h4 class="header-title mt-0 mb-3"> Additional Uploaded Documents</h4>
 -->                                        <p class="text-muted font-13">
                                        </p>
                                         
                                    <div class="text-start">
                                        <table class="table table-striped  dt-responsive nowrap w-100">
                                                <tr>
                                                <thead>
                                                <th>Functions</th>
                                                <th>View</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>Upload Documents</th>
                                                <th>Download Documents</th>
                                                </thead>
                                                 </tr>      
                                                 <tbody class="allData">
                                                 <tr>
                                                 <td>All Users</td>
                                                 <td><input type="checkbox" name="view_user" id="view_user" autocomplete=off></td>
                                                 <td><input type="checkbox" name="edit_user" id="edit_user" autocomplete=off></td>
                                                 <td><input type="checkbox" name="delete_user" id="delete_user" autocomplete=off></td>
                                                 <td><input type="checkbox" name="upload_user" id="upload_user" autocomplete=off></td>
                                                 <td><input type="checkbox" name="download_user" id="download_user" autocomplete=off></td>
                                                </tr>
                                                <tr>
                                                 <td>Application Status</td>
                                                 <td><input type="checkbox" name="view_application" id="view_application" autocomplete=off></td>
                                                 <td><input type="checkbox" name="edit_application" id="edit_application" autocomplete=off></td>
                                                 <td><input type="checkbox" name="delete_application" id="delete_application" autocomplete=off></td>
                                                 <td><input type="checkbox" name="upload_application" id="upload_application" autocomplete=off></td>
                                                 <td><input type="checkbox" name="download_application" id="download_application" autocomplete=off></td>
                                                </tr>
                                                <tr>
                                                 <td>Training Status</td>
                                                 <td><input type="checkbox" name="view_training" id="view_training" autocomplete=off></td>
                                                 <td><input type="checkbox" name="edit_training" id="edit_training" autocomplete=off></td>
                                                 <td><input type="checkbox" name="delete_training" id="delete_training" autocomplete=off></td>
                                                 <td><input type="checkbox" name="upload_training" id="upload_training" autocomplete=off></td>
                                                 <td><input type="checkbox" name="download_training" id="download_training" autocomplete=off></td>
                                                </tr>
                                                <tr>
                                                 <td>Reference Status</td>
                                                 <td><input type="checkbox" name="view_reference" id="view_reference" autocomplete=off></td>
                                                 <td><input type="checkbox" name="edit_reference" id="edit_reference" autocomplete=off></td>
                                                 <td><input type="checkbox" name="delete_reference" id="delete_reference" autocomplete=off></td>
                                                 <td><input type="checkbox" name="upload_reference" id="upload_reference" autocomplete=off></td>
                                                 <td><input type="checkbox" name="download_reference" id="download_reference" autocomplete=off></td>
                                                </tr>
                                                <tr>
                                                 <td>Health Status</td>
                                                 <td><input type="checkbox" name="view_health" id="view_health" autocomplete=off></td>
                                                 <td><input type="checkbox" name="edit_health" id="edit_health" autocomplete=off></td>
                                                 <td><input type="checkbox" name="delete_health" id="delete_health" autocomplete=off></td>
                                                 <td><input type="checkbox" name="upload_health" id="upload_health" autocomplete=off></td>
                                                 <td><input type="checkbox" name="download_health" id="download_health" autocomplete=off></td>
                                                </tr>
                                                <tr>
                                                 <td>DBS Status</td>
                                                 <td><input type="checkbox" name="view_dbs" id="view_dbs" autocomplete=off></td>
                                                 <td><input type="checkbox" name="edit_dbs" id="edit_dbs" autocomplete=off></td>
                                                 <td><input type="checkbox" name="delete_dbs" id="delete_dbs" autocomplete=off></td>
                                                 <td><input type="checkbox" name="upload_dbs" id="upload_dbs" autocomplete=off></td>
                                                 <td><input type="checkbox" name="download_dbs" id="download_dbs" autocomplete=off></td>
                                                </tr>
                                                <tr>
                                                 <td>Bank Status</td>
                                                 <td><input type="checkbox" name="view_bank" id="view_bank" autocomplete=off></td>
                                                 <td><input type="checkbox" name="edit_bank" id="edit_bank" autocomplete=off></td>
                                                 <td><input type="checkbox" name="delete_bank" id="delete_bank" autocomplete=off></td>
                                                 <td><input type="checkbox" name="upload_bank" id="upload_bank" autocomplete=off></td>
                                                 <td><input type="checkbox" name="download_bank" id="download_bank" autocomplete=off></td>
                                                </tr>
                                                <tr>
                                                 <td>Starter Status</td>
                                                 <td><input type="checkbox" name="view_starter" id="view_starter" autocomplete=off></td>
                                                 <td><input type="checkbox" name="edit_starter" id="edit_starter" autocomplete=off></td>
                                                 <td><input type="checkbox" name="delete_starter" id="delete_starter" autocomplete=off></td>
                                                 <td><input type="checkbox" name="upload_starter" id="upload_starter" autocomplete=off></td>
                                                 <td><input type="checkbox" name="download_starter" id="download_starter" autocomplete=off></td>
                                                </tr>
                                                <tr>
                                                 <td>Contract Status</td>
                                                 <td><input type="checkbox" name="view_contract" id="view_contract" autocomplete=off></td>
                                                 <td><input type="checkbox" name="edit_contract" id="edit_contract" autocomplete=off></td>
                                                 <td><input type="checkbox" name="delete_contract" id="delete_contract" autocomplete=off></td>
                                                 <td><input type="checkbox" name="upload_contract" id="upload_contract" autocomplete=off></td>
                                                 <td><input type="checkbox" name="download_contract" id="download_contract" autocomplete=off></td>
                                                </tr>
                                                <tr>
                                                 <td>Induction Status</td>
                                                 <td><input type="checkbox" name="view_induction" id="view_induction" autocomplete=off></td>
                                                 <td><input type="checkbox" name="edit_induction" id="edit_induction" autocomplete=off></td>
                                                 <td><input type="checkbox" name="delete_induction" id="delete_induction" autocomplete=off></td>
                                                 <td><input type="checkbox" name="upload_induction" id="upload_induction" autocomplete=off></td>
                                                 <td><input type="checkbox" name="download_induction" id="download_induction" autocomplete=off></td>
                                                </tr>
                                                </tbody>                  
                                                </table>
                                         </div>
                                         </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <p class="text-muted font-13">
                                        </p>
                                         
                                    <div class="text-start">
                                        <table class="table table-striped  dt-responsive nowrap w-100">
                                                <tr>
                                                <thead>
                                                <th>Function</th>
                                                <th>Terms & Conditons</th>
                                                <th>Email Template</th>
                                                <th>Contract Content</th>
                                                <th>Pay Rates</th>
                                                </thead>
                                                 </tr>      
                                                 <tbody class="allData">
                                                 <tr>
                                                    <td>Editor</td>
                                                    <td><input type="checkbox" name="terms_condition" id="terms_condition" autocomplete=off></td>
                                                    <td><input type="checkbox" name="email_template" id="email_template" autocomplete=off></td>
                                                    <td><input type="checkbox" name="contract_content" id="contract_content" autocomplete=off></td>
                                                    <td><input type="checkbox" name="pay_rates" id="pay_rates" autocomplete=off></td>
                                                </tr>
                                                </tbody>                  
                                                </table>
                                         </div>
                                         </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <p class="text-muted font-13">
                                        </p>
                                         
                                    <div class="text-start">
                                        <table class="table table-striped  dt-responsive nowrap w-100">
                                                <tr>
                                                <thead>
                                                <th>Function</th>
                                                <th>Department & Role</th>
                                                <th>Add Staff</th>
                                                <th>View/Edit Staff</th>
                                                <th>Delete/De-activate</th>
                                                </thead>
                                                 </tr>      
                                                 <tbody class="allData">
                                                 <tr>
                                                    <td>Admin Management</td>
                                                    <td><input type="checkbox" name="department_role" id="department_role" autocomplete=off></td>
                                                    <td><input type="checkbox" name="add_staff" id="add_staff" autocomplete=off></td>
                                                    <td><input type="checkbox" name="view_edit" id="view_edit" autocomplete=off></td>
                                                    <td><input type="checkbox" name="delete_deactivate" id="delete_deactivate" autocomplete=off></td>
                                                </tr>
                                                </tbody>                  
                                                </table>
                                         </div>
                                         </div>
                                </div>

                        <div class="row">
                            <div class="col-md-5 mb-3" style="margin-left:-40px;">
                            </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                <button class="btn btn-primary" type="submit" id="submit"> Submit</button>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->
</form>
                <!-- Footer Start -->
                
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right Sidebar -->
      

<!--     //settings div rightside  
    
        <div class="rightbar-overlay"></div>
 -->        <!-- /End-bar -->


        <!-- bundle -->
        <script src="js/js-theme/vendor.min.js"></script>
        <script src="js/js-theme/app.min.js"></script>

        <!-- third party js -->
        <script src="js/js-theme/vendor/chart.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="js/js-theme/pages/demo.profile.js"></script>
        <!-- end demo js-->

    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:07:07 GMT -->
</html>

<script>
function onlyNumberKey(evt) {
          
          // Only ASCII character in that range allowed
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
              return false;
              
          return true;
      }
      function emailCheck(val) {
        $.ajax({
        url: "{{route('email.check')}}",
        method: 'get',
        data: {val:val},
        success: function(result){
            console.log(result);
            successFunction(result);
        }
       
      });
}  
function successFunction(result){
    document.getElementById('emailError').innerHTML = result;
}
function usernameCheck(val) {
        $.ajax({
        url: "{{route('username.check')}}",
        method: 'get',
        data: {val:val},
        success: function(result){
            console.log(result);
            usernameSuccess(result);
        }
       
      });
}
function usernameSuccess(result){
    document.getElementById('usernameError').innerHTML = result;
}
$('#department').on('change', function () {
    var department= $("#department").val()
     $.ajax({
        url: "{{route('get.role')}}",
        method: 'get',
        data: {department:department},
        success: function(result){
            console.log(result);
            getRoleSuccess(result);
        }
       
      }); 
    });
    function getRoleSuccess(result){
        document.getElementById("role").options.length = 0;
       for (let i = 0; i < result.length; i++) {
            console.log(result[i]);
            var role = document.getElementById("role");
	        role.options[role.options.length] = new Option(result[i]['role_name'], result[i]['id']);          
        }
           }
</script>