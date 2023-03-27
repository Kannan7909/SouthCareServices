<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Health Check Questionnaire</title>
<!--         <meta name="viewport" content="width=device-width, initial-scale=1.0">
 -->    <meta name="csrf-token" content="{{ csrf_token() }}">   
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/images-theme/favicon.ico">

        <!-- App css -->
        <link href="css/css-theme/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/css-theme/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
        <!-- Begin page -->
        <div class="wrapper">
            @if( $employee->employee_contract == "Pending" )
                @include('navigationMenu')
            @else
                @include('navigationMenuContract')
            @endif
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    @include('topBar')
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                    <!-- start page title -->
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    
                                    <h4 class="page-title">Health Check Questionnaire</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 


                        


                        <div class="row">
                            <div class="col-xl-12">
                                <!-- training-Information -->
                                <div class="card" id="Health-Question">
                                    <div class="card-body">
                                    <form method="POST" action="{{ route('save.health') }}" class="health-form" id="health-form">
                                    @csrf
                                        <div class="row">   
                                            <div class="col-md-6 mb-3">
                                                <label for="criminal_offence" class="form-label">You may provide this information only if you are happy in disclosing these at this stage. This section is not mandatory before registration. Please confirm if you are happy to proceed with this now.</label>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <select name="health" id="health" class="form-control select2 form-select required-dbs" required autocomplete=off>
                                                    <option value="" disabled selected hidden>Choose One</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                         </div>
                                         </div>
                                </div>
                                <!-- training-Information -->
                         <!-- Health-Questionnaire-->
                         <div class="card" id="health-later" style="display:none">
                            <div class="card-body">
                                <div id="health-details_later" class="health-details_later">
                                <label for="msg" class="form-label">Your Health Check Questionnaire is pending. You can submit the details later. Please proceed to the Office Induction.</label><a href="{{ route('induction.employee') }}" class="text-muted ms-1"><b>Click Here</b></a>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="health-check" style="display:none">
                         <div class="card-body">
                         <div id="health-details" class="health-details">
                                        <h4 class="header-title mt-0 mb-3">Health Check Questionnaire</h4>
                                            <p class="text-muted font-13">
                                            </p>

                                            <hr>
                                        
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="gp_name" class="form-label">GP Name </label>
                                                    <input class="form-control required-health" type="text" id="gp_name" name="gp_name" placeholder="Enter GP Name" required autocomplete=off>
                                                </div>
                                                <div class="col-md-1 mb-3">
                                                </div>
                                                 <div class="col-md-2 mb-3">
                                                    <label for="country_code_mobile" class="form-label">Code</label>
                                                    <select name="gp_country_code" id="gp_country_code" class="form-control select2" data-toggle="select2" required autocomplete=off>
                                    <option data-countryCode="IN" value="91" >India (+91)</option>
                                    <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
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
                                                <div class="col-md-3 mb-3">
                                                    <label for="gp_mobile" class="form-label">GP Mobile Number </label>
                                                    <input class="form-control required-personal" type="text" id="gp_mobile" minlength="10" maxlength="10" onkeypress="return onlyNumberKey(event)" name="gp_mobile" placeholder="Enter GP Mobile Number" required autocomplete=off>
                                                </div>
                                                
                                            </div>
                                           <!--  <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="gp_address" class="form-label">GP Address </label>
                                                    <textarea  class="form-control required-health" id="gp_address" name="gp_address"  rows="3"  placeholder="Enter GP Address" required></textarea>
                                                </div>
                                            </div> -->
                                            @include('postcodeLookup')
                                            <h5 class="mt-0 mb-3">
                                            <i class="fa fa-lightbulb-o" style="font-size:24px"></i> Please answer all the following questions by giving relevant details
                                            </h5></br>
                                          
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                <div class="mt-0 mb-3"><b>1.Have you ever suffered from any of the following:</b></div>
                                                </div>
                                            </div>

                                            <div class="row">   
                                                <div class="col-md-5 mb-3">
                                                    <label for="depression" class="form-label">a) Depression, anxiety state, nervous illness or breakdown</label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="depression" id="depression" class="form-control select2 form-select required-health" required autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control" type="text" id="depression_note" name="depression_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>

                                            <div class="row">   
                                                <div class="col-md-5 mb-3">
                                                    <label for="epilepsy" class="form-label">b) Epilepsy or disease of the nervous system</label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="epilepsy" id="epilepsy" class="form-control select2 form-select required-health" required autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control" type="text" id="epilepsy_note" name="epilepsy_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>

                                            <div class="row">   
                                                <div class="col-md-5 mb-3">
                                                    <label for="ailment" class="form-label">c) Ailment of lungs or chest</label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="ailment" id="ailment" class="form-control select2 form-select required-health" required autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control" type="text" id="ailment_note" name="ailment_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>

                                            <div class="row">   
                                                <div class="col-md-5 mb-3">
                                                    <label for="spinal" class="form-label">d) Spinal problem (backache)</label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="spinal" id="spinal" class="form-control select2 form-select required-health" required autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control" type="text" id="spinal_note" name="spinal_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>

                                             <div class="row">   
                                                <div class="col-md-5 mb-3">
                                                    <label for="arthritis" class="form-label">e) Arthritis, Rheumatism or Gout etc</label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="arthritis" id="arthritis" class="form-control select2 form-select required-health" required autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control" type="text" id="arthritis_note" name="arthritis_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>

                                            <div class="row">   
                                                <div class="col-md-5 mb-3">
                                                    <label for="heart" class="form-label">f) Any heart or circulatory, including blood problems</label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="heart" id="heart" class="form-control select2 form-select required-health" required autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control" type="text" id="heart_note" name="heart_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>

                                            <div class="row">   
                                                <div class="col-md-5 mb-3">
                                                    <label for="kidney" class="form-label">g) Illness of the kidneys, bladder, liver or glands</label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="kidney" id="kidney" class="form-control select2 form-select required-health" required autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control" type="text" id="kidney_note" name="kidney_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>

                                            <div class="row">   
                                                <div class="col-md-5 mb-3">
                                                    <label for="diabetes" class="form-label">h) Diabetes</label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="diabetes" id="diabetes" class="form-control select2 form-select required-health" required autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control" type="text" id="diabetes_note" name="diabetes_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>

                                            <div class="row">   
                                                <div class="col-md-5 mb-3">
                                                    <label for="skin" class="form-label">i) Skin disorder</label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="skin" id="skin" class="form-control select2 form-select required-health" required autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control" type="text" id="skin_note" name="skin_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>                       
                                              
                                            <div class="row">
                                                <div class="col-md-10 mb-3">
                                                    <label for="medication">2) Are you presently taking medication or undergoing treatment. If so give details</label></br>
                                                </div>
                                            </div>
                                            <div class="row">
                                               
                                                <div class="col-md-6 mb-3">
                                                    <input class="form-control required-health" type="text" id="medication" name="medication" placeholder="Enter Your Treatment Details" required autocomplete=off>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="consumption">3) What is your average daily consumption of: </label></br>
                                                </div>
                                            </div>
                                            <div class="row">
                                               
                                                <div class="col-md-1 mb-3">
                                                    <label for="alcohol">Alcohol </label></br>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control required-health" type="text" id="alcohol" name="alcohol" placeholder="Enter Alcohol Consumption" required autocomplete=off>
                                                </div>
                                                <div class="col-md-1 mb-3">
                                                    <label for="tobacco">Tobacco </label></br>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control required-health" type="text" id="tobacco" name="tobacco" placeholder="Enter Tobacco Consumption" required autocomplete=off>
                                                </div>
                                            </div>

                                            <div class="row">   
                                                <div class="col-md-4 mb-3 ">
                                                    <label for="disabled" class="form-label">4) Are you a registered disabled person? </label>
                                                </div>
                                            </div>
                                            <div class="row">   
                                                <div class="col-md-2 mb-3">
                                                    <select name="disabled" id="disabled" class="form-control select2 form-select required-health" required autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control" type="text" id="disabled_note" name="disabled_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div> 
                                            
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="benefit">5) Details of any industrial disablement benefit received:</label></br>
                                                </div>
                                            </div>
                                            <div class="row">
                                            
                                                <div class="col-md-6 mb-3">
                                                    <input class="form-control required-health" type="text" id="benefit" name="benefit" placeholder="Please specify" required autocomplete=off>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-10 mb-3">
                                                    <label for="absent">6) How many working days have you been absent from during the last 12 months (apart from holidays)</label></br>
                                                </div>
                                            </div>
                                            <div class="row">
                                              
                                                <div class="col-md-6 mb-3">
                                                    <input class="form-control required-health" type="text" id="absent" name="absent" placeholder="Enter The Working Days" required autocomplete=off>
                                                </div>
                                            </div>
                                            
                                            <div class="row">   
                                                <div class="col-md-3 mb-3">
                                                    <label for="pregnant" class="form-label">7) Are you now pregnant? </label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="pregnant" id="pregnant" class="form-control select2 form-select required-health" required autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                        <option value="N/A">N/A</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control" type="text" id="pregnant_note" name="pregnant_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div> 

                                            <div class="row">
                                                <div class="col-md-10 mb-3">
                                                    <label for="additional">8) Additional details: ( If necessary)</label></br>
                                                </div>
                                            </div>
                                            <div class="row">
                                             
                                                <div class="col-md-6 mb-3">
                                                    <input class="form-control" type="text" id="additional" name="additional" placeholder="Enter The Additional Details" autocomplete=off>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                
                                                </div>

                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary toggle-disabled " type="submit" disabled>Submit </button>
                                                </div> 
                                         </div>
                                            </div>   
                                       </div>                        
                                    </div>  <!-- Health-Questionnaire end-->

                                        </form>                    
                                 
                                    
                            


                                <!-- Messages-->
                              

                            </div> <!-- end col-->



                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right Sidebar -->
      

       <!-- /End-bar -->


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

</html>

<style>
    .context{
        width:65%;
    }
</style>

<script>
    $( document ).ready(function() {
        $('#health-check').hide();
        $('#health-later').hide();
       $('#depression_note').hide();
       $('#epilepsy_note').hide();
       $('#ailment_note').hide();
       $('#spinal_note').hide();
       $('#arthritis_note').hide();
       $('#heart_note').hide();
       $('#kidney_note').hide();
       $('#diabetes_note').hide();
       $('#skin_note').hide();
       $('#disabled_note').hide();
       $('#pregnant_note').hide();
    });
   
   
    $('#health').on('change', function () {
         if (this.value === 'yes'){
            $('#health-check').show();
            $('#health-later').hide();
        } else {
            $('#health-check').hide();
            $('#health-later').show();
        }
    });

    $('#depression').on('change', function () {
         if (this.value === 'yes'){
            $('#depression_note').show();
            $("#depression_note").attr("class","form-control required-health");
            $('#depression_note').attr('required', 'required');
        } else {
            $('#depression_note').hide();
            $('#depression_note').removeAttr('required');
            $("#depression_note").attr("class","");
        }
    });
    $('#epilepsy').on('change', function () {
         if (this.value === 'yes'){
            $('#epilepsy_note').show();
            $("#epilepsy_note").attr("class","form-control required-health");
            $('#epilepsy_note').attr('required', 'required');
        } else {
            $('#epilepsy_note').hide();
            $('#epilepsy_note').removeAttr('required');
            $("#epilepsy_note").attr("class","");
        }
    });
    $('#ailment').on('change', function () {
         if (this.value === 'yes'){
            $('#ailment_note').show();
            $("#ailment_note").attr("class","form-control required-health");
            $('#ailment_note').attr('required', 'required');
        } else {
            $('#ailment_note').hide();
            $('#ailment_note').removeAttr('required');
            $("#ailment_note").attr("class","");
        }
    });
    $('#spinal').on('change', function () {
         if (this.value === 'yes'){
            $('#spinal_note').show();
            $("#spinal_note").attr("class","form-control required-health");
            $('#spinal_note').attr('required', 'required');
        } else {
            $('#spinal_note').hide();
            $('#spinal_note').removeAttr('required');
            $("#spinal_note").attr("class","");
        }
    });
    $('#arthritis').on('change', function () {
         if (this.value === 'yes'){
            $('#arthritis_note').show();
            $("#arthritis_note").attr("class","form-control required-health");
            $('#arthritis_note').attr('required', 'required');
        } else {
            $('#arthritis_note').hide();
            $('#arthritis_note').removeAttr('required');
            $("#arthritis_note").attr("class","");
        }
    });
    $('#heart').on('change', function () {
         if (this.value === 'yes'){
            $('#heart_note').show();
            $("#heart_note").attr("class","form-control required-health");
            $('#heart_note').attr('required', 'required');
        } else {
            $('#heart_note').hide();
            $('#heart_note').removeAttr('required');
            $("#heart_note").attr("class","");
        }
    });
    $('#kidney').on('change', function () {
         if (this.value === 'yes'){
            $('#kidney_note').show();
            $("#kidney_note").attr("class","form-control required-health");
            $('#kidney_note').attr('required', 'required');
        } else {
            $('#kidney_note').hide();
            $('#kidney_note').removeAttr('required');
            $("#kidney_note").attr("class","");

        }
    });
    $('#diabetes').on('change', function () {
         if (this.value === 'yes'){
            $('#diabetes_note').show();
            $("#diabetes_note").attr("class","form-control required-health");
            $('#diabetes_note').attr('required', 'required');
        } else {
            $('#diabetes_note').hide();
            $('#diabetes_note').removeAttr('required');
            $("#diabetes_note").attr("class","");
        }
    });
    $('#skin').on('change', function () {
         if (this.value === 'yes'){
            $('#skin_note').show();
            $("#skin_note").attr("class","form-control required-health");
            $('#skin_note').attr('required', 'required');
        } else {
            $('#skin_note').hide();
            $('#skin_note').removeAttr('required');
            $("#skin_note").attr("class","");
        }
    });
    $('#disabled').on('change', function () {
         if (this.value === 'yes'){
            $('#disabled_note').show();
            $("#disabled_note").attr("class","form-control required-health");
            $('#disabled_note').attr('required', 'required');
        } else {
            $('#disabled_note').hide();
            $('#disabled_note').removeAttr('required');
            $("#disabled_note").attr("class","");
        }
    });
    $('#pregnant').on('change', function () {
         if (this.value === 'yes'){
            $('#pregnant_note').show();
            $("#pregnant_note").attr("class","form-control required-health");
            $('#pregnant_note').attr('required', 'required');
        } else {
            $('#pregnant_note').hide();
            $('#pregnant_note').removeAttr('required');
            $("#pregnant_note").attr("class","");
        }
    });

    $(document).on('change keyup', '.required-health', function(e){
                let Disabled = true;
                $(".required-health").each(function() {
                let value = this.value
                if ((value)&&(value.trim() !=''))
                    {
                        Disabled = false
                    }else{
                        Disabled = true
                        return false
                    }
                });
            
            if(Disabled){
                    $('.toggle-disabled').prop("disabled", true);
                }else{
                    $('.toggle-disabled').prop("disabled", false);
                }
            });
    function onlyNumberKey(evt) {
          
          // Only ASCII character in that range allowed
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
              return false;
              
          return true;
      }
</script>