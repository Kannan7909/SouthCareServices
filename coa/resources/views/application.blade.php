<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Application Form</title>
<!--         <meta name="viewport" content="width=device-width, initial-scale=1.0">
 -->        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
            <!-- ========== Left Sidebar Start ========== -->
            @if( $employee->employee_contract == "Pending" )
                @include('navigationMenu')
            @else
                @include('navigationMenuContract')
            @endif
            <!-- Left Sidebar End -->

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
                                    <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">Profile 2</li>
                                        </ol>
                                    </div> -->
                                    <h4 class="page-title">Application Form</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 


                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Profile -->
                                <!--end profile/ card -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                        <form method="POST" action="{{ route('save.application') }}" class="application-form" id="application-form">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Application-Information -->
                                <div class="card">
                                    <div class="card-body">
                                     <!-- Personal-Details -->   
                                    <div id="personal-details" class="personal-details">
                                        <h4 class="header-title mt-0 mb-3">Personal Details</h4>
                                            <p class="text-muted font-13">
                                            </p>

                                            <hr>
                                        
                                               <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="posts" class="form-label">Post Applied For</label>
                                                    <select name="posts" id="posts" class="form-control select2 required-personal form-select"  disabled required>
                                                        <option value="{{ $employee->posts }}" disabled selected hidden>{{ $employee->posts }}</option>
                                                     <!--    <option value="Nurse">Nurse(RGN)</option>
                                                        <option value="Care Assistant">Care Assistant</option>
                                                        <option value="Senior Carer">Senior Carer</option>
                                                        <option value="Chefs">Chefs</option>
                                                        <option value="Kitchen Assistant">Kitchen Assistant</option>
                                                        <option value="Domcare">Domcare</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">   
                                                <div class="col-md-4 mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <select name="title" id="title" class="form-control select2 required-personal form-select" disabled required>
                                                        <option value="{{ $employee->title }}" disabled selected hidden>{{ $employee->title }}</option>
                                                       <!--  <option value="Mr">Mr.</option>
                                                        <option value="Mrs">Mrs.</option>
                                                        <option value="Miss">Miss.</option> -->                                                              
                                                    </select> 
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="surname" class="form-label">Surname</label>
                                                    <input class="form-control required-personal" type="text" id="surname" name="surname" placeholder="Enter Your Surname" value="{{ $employee->surname }}" disabled required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input class="form-control required-personal" type="text" id="first_name" name="first_name" placeholder="Enter Your First Name" value="{{ $employee->firstname }}" disabled required>
                                                </div>
                                            </div>
                                            <div class="row">   
                                                <div class="col-md-4 mb-3">
                                                    <label for="address1" class="form-label">Address Line One</label>
                                                    <input class="form-control" type="text" id="address1" name="address1" placeholder="Enter Address Line One" value="{{ $employee->address1 }}" disabled required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="address1" class="form-label">Address Line Two (Optional)</label>
                                                    <input class="form-control" type="text" id="address2" name="address2" placeholder="Enter Address Line Two" value="{{ $employee->address2 }}" disabled>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="address1" class="form-label">Address Line Three(Optional)</label>
                                                    <input class="form-control" type="text" id="address3" name="address3" placeholder="Enter Address Line Three" value="{{ $employee->address3 }}" disabled>
                                                </div>
                                            </div> 
                                            <div class="row">   
                                                <div class="col-md-4 mb-3">
                                                    <label for="address1" class="form-label">Post Town</label>
                                                    <input class="form-control" type="text" id="postTown" name="postTown" placeholder="Enter Your Post Town" value="{{ $employee->postTown }}" disabled>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="password" class="form-label">Postcode</label>
                                                    <input class="form-control" type="text" id="postCode" name="postCode" placeholder="Enter Your Postcode" value="{{ $employee->postcode }}" disabled>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="tel_no" class="form-label">Whatsapp Number </label>
                                                    <input class="form-control required-personal" type="text" id="contact" name="contact" placeholder="Enter Your Contact Number" value="{{ $employee->contact_no }}" disabled required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="mobile_no" class="form-label">Mobile Number </label>
                                                    <input class="form-control required-personal" type="text" id="uk_contact" name="uk_contact" placeholder="Enter Your Mobile Number" value="{{ $employee->uk_contact_no }}" disabled required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="email" class="form-label">Email </label>
                                                    <input class="form-control required-personal" type="email" id="email" name="email" placeholder="Enter Your Email Address" value="{{ $employee->email }}" disabled required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Date Of Birth</label>
                                               <!--     <input type="text" class="form-control date required-personal" id="birthday" name="birthday" data-toggle="date-picker" data-single-date-picker="true"> -->
                                               <input type="date" class="form-control date required-personal" id="birthday" name="birthday" autocomplete=off>
                                                </div>
                     <!--                            <div class="col-md-4 mb-3">
                                                    <label for="marital_status" class="form-label">Marital Status </label>
                                                    <select name="marital_status" id="marital_status" class="form-control select2 required-personal" data-toggle="select2" required>
                                                        <option value="" disabled selected hidden>Choose Your Marital Status</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Widowed">Widowed</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Divorced">Divorced</option>                                                            
                                                    </select> 
                                                </div> -->
                                                <div class="col-md-4 mb-3">
                                                    <label for="marital_status" class="form-label">Marital Status </label>
                                                    <select name="marital_status" id="marital_status" class="form-control select2 required-personal form-select" autocomplete=off>
                                                        <option value=""  disabled selected hidden>Choose Your Marital Status</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Widowed">Widowed</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Divorced">Divorced</option>                                                            
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Nationality</label>
                                                    <input class="form-control required-personal" type="text" id="nationality" name="nationality" placeholder="Enter Your Nationality" autocomplete=off>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="ni" class="form-label">Do you have NI Number? </label>
                                                    <select name="have_ni" id="have_ni" class="form-control select2 required-personal form-select" autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select> 
                                                </div>
                                                <div class="col-md-3 mb-3" id="ni" style="display:none">
                                                    <label for="ni_number" class="form-label">NI Number </label>
                                                    <input class="" type="text" id="ni_number" name="ni_number" placeholder="Enter Your NI Number" autocomplete=off onkeypress="return NINumCheck(event)">
                                                    <span id="less-characters" class="hide-text" style="color:red;">
                                                    Should enter 9 characters
                                                    </span>
                                                </div>
                                                <div class="col-md-3 mb-3" id="ni_reference" style="display:none">
                                                    <label for="ni_reference_number" class="form-label">NI Reference Number </label>
                                                    <input class="" type="text" id="ni_reference_number" name="ni_reference_number" placeholder="Enter Your NI Reference Number" autocomplete=off onkeypress="return NIReferenceNumCheck(event)">
                                                    <span id="less-reference-characters" class="hide-text" style="color:red;">
                                                    Should enter 8 characters
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="mnc" class="form-label">Do you have NMC Pin? </label>
                                                    <select name="have_mnc" id="have_mnc" class="form-control select2 required-personal form-select" autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select> 
                                                </div>
                                                <div class="col-md-3 mb-3" id="mnc" style="display:none">
                                                    <label for="mnc_pin" class="form-label">NMC Pin </label>
                                                    <input class="" type="text" id="mnc_pin" name="mnc_pin" placeholder="Enter Your NMC Pin" autocomplete=off onkeypress="return NMCNumCheck(event)">
                                                    <span id="less-nmc-characters" class="hide-text" style="color:red;">
                                                    Should enter 8 characters
                                                    </span>
                                                </div>
                                            </div>
                                            <hr>
 
                                            <h4 class="header-title mt-0 mb-3 info-align">Next Of Kin</h4>
                                            <div id="" class="info-msg form-text info-align text-muted">(Please make sure that the below person can be contacted during an emergency)<br /><br /></div>
                                            
                                            <div class="row">   
                                                <div class="col-md-4 mb-3">
                                                    <label for="relative_name" class="form-label">Name</label>
                                                    <input class="form-control required-personal" type="text" id="relative_name" name="relative_name" placeholder="Enter Name" autocomplete=off>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="relationship" class="form-label">Relationship</label>
                                                    <input class="form-control required-personal" type="text" id="relationship" name="relationship" placeholder="Enter Your Relationship" autocomplete=off>
                                                </div>
                                            </div>
                                            @include('postcodeLookup')
                                            <!-- <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="relative_address" class="form-label">Address </label>
                                                    <textarea  class="form-control required-personal" id="relative_address" name="relative_address"  rows="3"  placeholder="Enter Address Of Your Relative"></textarea>
                                                </div>
                                             </div> -->
                                             <div class="row">
                                             <div class="col-md-2 mb-3">
                                                    <label for="country_code_mobile" class="form-label">Code</label>
                                                    <select name="relative_tel_code" id="relative_tel_code" class="form-control select2" data-toggle="select2" autocomplete=off>
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
                                                <div class="col-md-2 mb-3">
                                                    <label for="relative_tel" class="form-label">Contact Tel </label>
                                                    <input class="form-control required-personal" type="text" id="relative_tel" name="relative_tel" onkeypress="return onlyNumberKeyContact(event)" placeholder="Enter Contact Number" autocomplete=off>
                                                   <!--  <span id="mobile-valid" class="hide-text mob" style="color:green";>
                                                        <i class="fa fa-check pwd-valid"></i>Valid Mobile No
                                                    </span> -->   
                                                    <span id="less-digits" class="hide-text mob-helpers" style="color:red;">
                                                        <!-- <i class="fa fa-times mobile-invalid"></i> -->Should Enter 10 Digts
                                                    </span>
                                                </div>
                                               
                                                <div class="col-md-2 mb-3">
                                                    <label for="country_code_mobile" class="form-label">Code</label>
                                                    <select name="relative_mobile_code" id="relative_mobile_code" class="form-control select2" data-toggle="select2" autocomplete=off>
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
                                                <div class="col-md-2 mb-3">
                                                    <label for="relative_mobile" class="form-label">Mobile Number </label>
                                                    <input class="form-control required-personal" type="text" id="relative_mobile" onkeypress="return onlyNumberKeyMobile(event)" name="relative_mobile" placeholder="Enter Mobile Number" autocomplete=off>
                                                    <span id="mobile-digits" class="hide-text mob-helpers" style="color:red;">
                                                        <!-- <i class="fa fa-times mobile-invalid"></i>-->Should Enter 10 Digits
                                                    </span> 
                                                </div>
                                              <!--   <div class="col-md-1">
                                                </div> -->
                                                <div class="col-md-3 mb-3">
                                                    <label for="relative_email" class="form-label">Email </label>
                                                    <input class="form-control required-personal" type="email" id="relative_email" name="relative_email"  placeholder="Enter Email Address" autocomplete=off>
                                                    <span id="invalid-mail" class="hide-text mob-helpers" style="color:red;">
                                                        <!-- <i class="fa fa-times mobile-invalid"></i>-->Should Enter Valid Email Address
                                                    </span> 
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8">
                                                
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary toggle-disabled" type="button" onclick="applicationPersonalSubmit()" disabled><!-- <i class="mdi mdi-account-circle"></i> --> Next </button>
                                                </div>
                                            </div>
                                    </div>  <!-- Personal-Details end-->
                                    
                                    
 
                                    <!-- Passport-Details-->
                                    <div id="passport-details" class="passport-details">
                                        <h4 class="header-title mt-0 mb-3">Passport/ Visa Details</h4>
                                        <input class="form-control  mb-3 required-personal" type="hidden" id="loggedId" name="loggedId"  value="{{ $employee->id }}" autocomplete=off> 

                                            <p class="text-muted font-13">
                                            </p>

                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="visa_status" class="form-label">Visa Status</label>
<!--                                                     <input class="form-control required-passport" type="text" id="visa_status" name="visa_status" placeholder="Enter Visa Status" required>
 -->                                                  <select name="visa_status" id="visa_status" class="form-control select2 form-select" autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose Visa Status</option>
                                                        <option value="Dependant Visa">Dependant Visa</option>
                                                        <option value="EU Settlement Scheme (EUSS)">EU Settlement Scheme (EUSS)</option>
                                                        <option value="Graduate Visa">Graduate Visa</option>Not Applicable  
                                                        <option value="High Potential Individual (HPI) visa">High Potential Individual (HPI) visa</option>
                                                        <option value="Not Applicable">Not Applicable</option>
                                                        <option value="Other">Other (Please specify)</option>
                                                        <option value="Right of Abode">Right of Abode</option> 
                                                        <option value="Start-up or Innovator Visa">Start-up or Innovator Visa </option>
                                                        <option value="Student Visa">Student Visa</option>
                                                        <option value="UK Ancestry visa">UK Ancestry visa</option>
                                                        <option value="Work Visa">Work Visa</option>                                                                                                                            
                                                    </select>  
                                                </div>
                                                <div class="col-md-3 mb-3" id="other" style="display:none" >
                                                    <label for="other_note" class="form-label">Please Specify</label>
                                                    <input class="" type="text" id="other_note" name="other_note" placeholder="Please Specify" autocomplete=off>
                                                </div>
                                                <div class="col-md-4 mb-3"  id="visa_details" style="display:none">
                                                    <label for="visa_expiry_date" class="form-label">Visa Expiry Date</label>
                                                    <input type="date" class="form-control date" id="visa_expiry_date" name="visa_expiry_date" autocomplete=off>
                                                </div>
                                            </div>
                                            <div id="passport_details_section" style="display:none">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="passport_no" class="form-label">Passport No.</label>
                                                    <input class="" type="text" id="passport_no" name="passport_no" placeholder="Enter Your Passport Number" autocomplete=off>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="place_of_issue" class="form-label">Passport Place Of Issue</label>
                                                    <input class="form-control" type="text" id="place_of_issue" name="place_of_issue" placeholder="Enter Place Of Issue" autocomplete=off>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="issue_date" class="form-label">Passport Issue Date</label>
                                                    <input type="date" class="form-control date" id="issue_date" name="issue_date" autocomplete=off>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="expiry_date" class="form-label">Passport Expiry Date</label>
                                                    <input type="date" class="form-control date" id="expiry_date" name="expiry_date" autocomplete=off>
                                                </div>
                                            </div>
                                            
                                            <!-- Upload File message -->
                                            <!-- Response message -->

                                            <!-- File preview --> 
                                           <!--  <div id="filepreview" class="displaynone" > 
                                            <img src="" class="displaynone" with="200px" height="200px"><br>

                                              <a href="#" class="displaynone" >Click Here..</a> 
                                            </div>  -->
                                            <hr>
                                            <div class="alert displaynone" id="responseMsg" style="display:none"></div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
<!--                                                     <small id="" class="info-msg form-text text-muted"><i class="fa fa-lightbulb-o" style="font-size:24px"></i><b>Please click on the corresponding Upload button once the file is selected.</b></small>
 -->                                                </div>
                                            </div>

                                            <div class="row">
                                                 <div class="col-md-1 mb-3" style="width: 12.499999995%">
                                                    <label for="passportFile" class="form-label">Passport</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control" type="file" id="passportFile" name="passportFile" onchange="passportSubmit()">
                                                </div>
                                                <!-- <div class="col-md-1 mb-3">
                                                    <input class="btn btn-primary" type="button" id="passportSubmit" name="passportSubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-1 mb-3" style="width: 12.499999995%">
                                                <br/><br/>
                                                    <label for="brpFile" class="form-label">BRP</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="place_of_issue" class="form-label">BRP Expiry Date</label>
                                                    <input type="date" class="form-control date" id="brp_expiry_date" name="brp_expiry_date" autocomplete=off>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                <label for="brpFile" class="form-label">Choose BRP</label>
                                                    <input class="form-control" type="file" id="brpFile" name="brpFile" onchange="brpSubmit()">
                                                </div>
                                               <!--  <div class="col-md-3 mb-3">
                                                    <input class="btn btn-primary" type="button" id="brpSubmit" name="brpSubmit" value='Upload' required>
                                                </div> -->
                                            </div>

                                        <!--     <div class="row">
                                                <div class="col-md-1 mb-3" style="width: 12.499999995%">
                                                    <label for="rightFile" class="form-label">Right to Work </label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input class="form-control" type="file" id="rightFile" name="rightFile"  onchange="rightSubmit()">
                                                </div>
                                            </div> -->
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="mnc" class="form-label">Do you have Employer Share Code? </label>
                                                    <select name="have_sharecode" id="have_sharecode" class="form-control select2 required-passport form-select" autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="generated">No</option>
                                                    </select> 
                                                </div>
                                                <div class="col-md-3 mb-3" id="employer_sharecode" style="display:none">
                                                    <label for="sharecode" class="form-label">Share Code </label>
                                                    <input class="" type="text" id="sharecode" name="sharecode" placeholder="Enter Your Share Code" autocomplete=off>
                                                </div>
                                            </div>
                                                <div class="col-md-12 mb-3" id="sharecode_generator" style="display:none"><br/>
                                                Click on the link to generate a share code which will be used by your employer to check your right to work in the UK.
                                               <a href="https://www.gov.uk/prove-right-to-work" target="_blank"><b style="color:red;">Click here</b></a>
                                                </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary toggle-disabled" type="button" id="passport-button" onclick="applicationPassportSubmit()"><!-- <i class="mdi mdi-account-circle"></i> --> Next </button>
                                                </div>
                                            </div>
                                        </div> 
                                        <!-- </div>   -->                          
                                    </div>  <!-- Passport-Details end-->


                                    <!-- Education-Work-Details-->
                                    <div id="education-work-details" class="education-work-details">
                                        <h4 class="header-title mt-0 mb-3">Educational Details</h4>
                                            <p class="text-muted font-13">
                                            </p>
                                            <div class="alert alert-success successMsg" id="successMsg"role="alert" style="display:none">
                                                Saved Successfully!
                                            </div>
                                            <hr>
                                            <div class="alert displaynone" id="responseMsg" style="display:none"></div>
                                            <br>
                                            <table id="tbl">
                                                <tr>
                                                    <th style="width:85px">SL. No</th>
                                                    <th>Place Of Study</th>
                                                    <th>Qualification</th>
                                                    <th>Graduation Date</th>
                                                    <th>Document (Optional)</th>
                                                </tr>               
                                                 <tr>
                                                     <td><input class="form-control mb-3 required-education" type="text" id="eduId" name="eduId" value="1" disabled></td>
                                                    <td><input class="form-control mb-3 required-education" type="text" id="study_place1" name="study_place1" placeholder="Enter Your Study Place" autocomplete=off></td>
                                                    <td><input class="form-control mb-3 required-education" type="text" id="qualification1" name="qualification1" placeholder="Enter Your Qualification" autocomplete=off></td> 
                                                    <td><input type="date" class="form-control mb-3  required-education" id="qualified_date1" name="qualified_date1" autocomplete=off></td>
                                                    <td><input class="form-control mb-3" type="file" id="docEducation1" name="docEducation1" onchange="uploadEducationDoc()" autocomplete=off></td> 
                                                    <td> <input type="submit" class="button mb-3" value="+"title="Click to add more rows" id="" onclick="addField('tbl')"/></td>

                                                </tr> 
                                                </table>
                                               
                                                
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <input class="btn btn-primary toggle-disabled-education" type="button" id="educationSubmit" name="educationSubmit" value='Save' disabled>
                                                </div>
                                                <hr>
                                                <div class="row" id="work" style="display:none">
                                                    <div class="col-md-3 mb-3">
                                                        <label for="have_work" class="form-label">Do you have work experience? </label>
                                                        <select name="have_work" id="have_work" class="form-control select2 form-select" autocomplete=off>
                                                            <option value="" disabled selected hidden>Choose One</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div id ="work_experience" style="display:none">
                                                <h4 class="header-title mt-0 mb-3">Work Details</h4>
                                            <p class="text-muted font-13">
                                            </p>

                                            <div class="alert alert-success workSuccessMsg" id="workSuccessMsg"role="alert" style="display:none">
                                                Saved Successfully!
                                            </div>
                                            <br>
                                            <table id="workTable">
                                                <tr>
                                                <th style="width:85px">SL. No</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Employer Name</th>
                                                <th>Business Type</th>
                                                <th>Job Title</th>
                                                <th>Document (Optional)</th>
                                                 </tr>               
                                                 <tr>
                                                    
                                                    <td><input class="form-control mb-3 required-work" type="text" id="workId" name="workId" value="1" disabled></td>
                                                    <td><input type="date" class="form-control mb-3" id="from1" name="from1" autocomplete=off></td>
                                                    <td><input type="date" class="form-control mb-3" id="to1" name="to1" autocomplete=off></td>
                                                    <td><input class="form-control mb-3 required-work" type="text" id="employer_name1" name="employer_name1" placeholder="Enter Your Employer Name" autocomplete=off></td>
                                                    <td><input class="form-control mb-3 required-work" type="text" id="business_type1" name="business_type1" placeholder="Enter Your Business Type" autocomplete=off></td>
                                                    <td><input class="form-control mb-3 required-work" type="text" id="job_title1" name="job_title1" placeholder="Enter Your Job Title" autocomplete=off></td>
                                                    <td><input class="form-control mb-3" type="file" id="docWork1" name="docWork1" onchange="uploadWorkDoc()" autocomplete=off></td> 
                                                    <td><input type="submit" class="button mb-3" value="+" title="Click to add more rows" onclick="addWorkField('workTable');" /></td>

                                                </tr> 
                                                </table>
                                         
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <input class="btn btn-primary toggle-disabled-work" type="button" id="workSubmit" name="workSubmit" value='Save' disabled>
                                                </div>
                                                </div></br></br></br>
                                                <div class="row">
                                                <div class="col-md-8">
                                                
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary toggle-disabled" type="button" id="education-button" onclick="applicationEducationSubmit()" disabled><!-- <i class="mdi mdi-account-circle"></i> --> Next </button>
                                                </div>
                                            </div>
                                          
                                        <!-- </div>   -->                          
                                    </div>  <!-- Education-work-Details end-->

                                    
                                     <!-- Equal Opportunity Monitoring Form-Details-->
                                     <div id="equal-opportunity-details" class="equal-opportunity-details">
                                        <h4 class="header-title mt-0 mb-3">Equal Opportunity Monitoring Form</h4>
                                            <p class="text-muted font-15">
                                            The information on this form will be used in total confidence and accordance with current data protection legislation. It will help to ensure
			that the company property monitors and confirms with its policies relating to equality of opportunity. Information will be used for monitoring
			only. Our commitment aims to allow our staff to develop their skills and realize their maximum potential as individuals without any wish on
			the part of the company to limit their opportunity.
                                            </p>

                                             
                                            
                                            <div class="row">   
                                                <div class="col-md-2 mb-3">
                                                    <label for="ethinic" class="form-label">Ethinic Groups</label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="choose" id="choose" class="form-control select2 form-select required-equal" autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="White">White</option>
                                                        <option value="Mixed">Mixed</option>
                                                        <option value="Asian">Asian</option>
                                                        <option value="Black">Black</option>
                                                        <option value="Chinese">Chinese</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                             </div>

                                            <div class="row">   
                                                <div class="col-md-2 mb-3">
                                                    <label for="gender" class="form-label">Gender</label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="gender" id="gender" class="form-control select2 form-select required-equal" autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                             </div>
                                                                                
                                            <div class="row">   
                                                <div class="col-md-2 mb-3">
                                                    <label for="ethinic" class="form-label">Age Range</label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="age" id="age" class="form-control select2 form-select required-equal" autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="age1">16-21</option>
                                                        <option value="age2">22-25</option>
                                                        <option value="age3">26-30</option>
                                                        <option value="age4">31-35</option>
                                                        <option value="age5">36-40</option>
                                                        <option value="age6">41-50</option>
                                                        <option value="age7">51-60</option>
                                                        <option value="age8">61-65</option>
                                                    </select>
                                                </div>
                                             </div>
                                            
                                            <div class="row">   
                                                <div class="col-md-5 mb-3">
                                                    <label for="disability" class="form-label">Do you consider yourself to have a disability of some kind ? </label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="disable" id="disable" class="form-control select2 form-select required-equal" autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3" id="disability" style="display:none">
                                                    <input class="" type="text" id="disability_note" name="disability_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>

                                             <hr> 
                                            
                                             <h4 class="header-title mt-0 mb-3">Protection Of Children and Vulnerable Adults Declaration</h4>


                                            <div class="row">   
                                                <div class="col-md-6 mb-3">
                                                    <label for="service" class="form-label">Has any Social Service Department or Police Service ever conducted an enquiry or investigation into any allegations
					or that you may pose an actual or potential risk to children or vulnerable adults? </label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="service" id="service" class="form-control select2 form-select required-equal" autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3" id="service_details" style="display:none">
                                                    <input class="" type="text" id="service_note" name="service_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>

                                            <div class="row">   
                                                <div class="col-md-6 mb-3">
                                                    <label for="offence" class="form-label">Have you ever been convicted of any offence relating to children or vulnerable adults? </label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="offence" id="offence" class="form-control select2 form-select required-equal" autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3" id="offence_details" style="display:none">
                                                    <input class="" type="text" id="offence_note" name="offence_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>

                                            <div class="row">   
                                                <div class="col-md-6 mb-3">
                                                    <label for="disciplinary_procedure" class="form-label">Have you ever been the subject of any disciplinary procedure or been asked to leave employment or voluntary
                                                    activity due fo inappropriate behavior towards a child or vulnerable adult? </label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="disciplinary_procedure" id="disciplinary_procedure" class="form-control select2 form-select required-equal" autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3" id="disciplinary_details" style="display:none">
                                                    <input class="" type="text" id="disciplinary_note" name="disciplinary_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>
                                             <hr>

                                           <h4 class="header-title mt-0 mb-3">Rehabilation Of Offenders</h4> 
                                            <p class="text-muted font-15">
                                                Because of the nature of the work for which youare applying, this post is exempt from the provisions of Section 4(2} of the
		Rehabilitation of Offenders Act 1974, by virtue of the Rehabilitation of Offenders Act 1974 (Exemptions) Order 1975. Applicants
		are therefore not entitled to withhold information about convictions, which for other purposes are spent under the provisions of the
		act and in the event of employment any failure to disclose such convictions could result in dismissal or disciplinary action by the
		employer. All Successful candidates will be required to obtain an enhanced disclosure report from the Disclosure and Barring
		Service.  </p>

                                            <div class="row">   
                                                <div class="col-md-6 mb-3">
                                                    <label for="criminal_offence" class="form-label">Have you ever been convicted of a criminal offence, or been subject to any confidential discharge, bind overs or caution.</label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="criminal_offence" id="criminal_offence" class="form-control select2 form-select required-equal" autocomplete=off>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3" id="criminal_details" style="display:none">
                                                    <input class="" type="text" id="criminal_note" name="criminal_note" placeholder="Please specify" autocomplete=off>
                                                </div>
                                             </div>

                                            <div class="row">    
                                                <div class="form-check form-check-inline">
<!--                                                      <input type="radio" value="yes" id="agree_declaration" name="agree_declaration" class="form-check-input">
 -->                                                    
                                                    <input type="checkbox" class="required-equal" name="agree_declaration" id="agree_declaration" autocomplete=off>

                                                    <span><b>I declare that I do not possess, nor have I ever possessed a criminal conviction, not have I been subject to any conditional
			                                        discharges, bindovers or cautions. </b></span>
                                                    
                                                   
                                                </div>
                                            </div><br><br>

                                            <!-- div class="row">
                                                <div class="col-md-12 mb-3"> -->
                                                    <div style="color:#494848"><i>Any information contained in this form will be treated in confidence. Failure to disclose any relevant information or providing false or inaccurate
			information may be regarded as a breach of any subsequent contract of employment, resulting in disciplinary action and/or dismissal. </i></div>
                                            <!--     </div>
                                            </div> -->
                                            <hr>
                                            <h4 class="header-title mt-0 mb-3">Panel Agency Membership</h4> 

                                            <div class="row">    
                                                <p class="text-muted font-15">
                                                    If you like to work through our panel agencies in various locations please sign the declaration below. This will help you to work with different clients in various locations through other agencies who are our partners. The related staff pay and other benefits are availed through the panel agency members directly. Please tick the box below if youare interested. 
                                                </p>
                                                     <div class="form-check form-check-inline"><br/>
<!--                                                         <input type="radio" value="yes" id="agree" name="agree" class="form-check-input">
-->                                                          <input type="checkbox" class="required-equal" name="agree" id="agree" autocomplete=off>
                                                             <label class="form-check-label" for="agree"><b>I have no objections in working with the panel agencies through Excellent Care solutions</b></label>

                                                    </div>
                                            </div><br><br>
                                            
                                           <!--  <h4 class="header-title mt-0 mb-3">Notes</h4> 
                                            <div class="row"> 
                                                     <div class="col-md-4 mb-3">
                                                    <input class="form-control required-equal" type="text" id="notes" name="notes" placeholder="Enter The Additional Notes" required>
                                                </div> 
                                            </div> -->
                                            
                                            <div class="row">
                                                <div class="col-md-8">
                                                
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary toggle-disabled" type="button" id="equal-button" onclick="applicationEqualOpportunitySubmit()" disabled> Next </button>
                                                </div>
                                            </div> 
                                    </div>  <!-- Equal Opportunity Monitoring Form-Details end-->

                                    
                                     <!-- Declaration-Details-->
                                     <div id="declaration-details" class="declaration-details">
                                        <h4 class="header-title mt-0 mb-3">Declaration</h4>
                                        <hr>
                                            <div>
                                            <input type="checkbox" class="required-declaration" name="agree_submit" id="agree_submit" required autocomplete=off>
                                            <b>I confirm that the information given within this form is true and accurate. I hereby give consent for this information being used for personnel administration and business purposes.</b>
                                            </div><br>
                                            <div class="row">  
                                                <div class="col-md-3 mb-3">
                                                    <label for="name">Name </label></br>
                                                    <input class="form-control required-declaration" type="text" id="name" name="name" placeholder="Enter The Name"  onblur="createSign()" required autocomplete=off onkeypress="return (event.charCode > 64 && 
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32) || (event.charCode ==46)">
                                                </div> 
                                                <div class="col-md-1 mb-3">
                                                    
                                                    </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="signature">E-Signature </label></br>
                                                    <input class="form-control required-declaration signature" type="text" id="signature" name="signature"  readonly required autocomplete=off>
                                                </div>
                                                <div class="col-md-1 mb-3">
                                                    
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                     <label for="date">Date </label></br>
                                                     <input type="date" class="form-control date required-declaration" id="date" name="date"  required autocomplete=off>
                                                </div>
                                               
                                            </div><br/>
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                
                                                </div>
                                             <!--    <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary toggle-disabled" type="submit" onclick="applicationSubmit()" disabled> Submit </button>
                                                </div> -->
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary" type="submit">Submit </button>
                                                </div> 
                                         </div>
                                          
                                        <!-- </div>   -->                          
                                    </div>  <!-- Declaration-Details end-->
                                   
                                   
                                        </div>
                                    </div>
                                </div>
                                <!-- Application-Information -->

                                <!-- Toll free number box-->
                                <div class="card text-white bg-info overflow-hidden">
                                    <!-- <div class="card-body">
                                        <div class="toll-free-box text-center">
                                             <h4> <i class="mdi mdi-deskphone"></i> Toll Free : 1-234-567-8901</h4>
                                         </div>
                                    </div> --> <!-- end card-body-->
                                </div> <!-- end card-->
                                <!-- End Toll free number box-->

                                <!-- Messages-->
                              

                            </div> <!-- end col-->



                        </div>
                        <!-- end row -->
                        </form>
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
      

<!--         <div class="rightbar-overlay"></div>
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

<style>
@import url(https://fonts.googleapis.com/css?family=Cedarville+Cursive);  

.hide-text{
  display: none;
}
.context{
    width:65%;
}

.signature{
  font-family:"Cedarville Cursive";
}
</style>

<script>
      var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
      var i=1;
      var j=1;
        $( document ).ready(function() {
            document.getElementById('ni').style.display = "none"; 
            document.getElementById('ni_reference').style.display = "none"; 
            document.getElementById("education-button").style.display = "none"; 

            document.getElementById('personal-details').style.display = "block"; 
            //document.getElementById('health-details').style.display = "block"; 
            document.getElementById('passport-details').style.display = "none"; 
            document.getElementById('education-work-details').style.display = "none"; 
            document.getElementById('equal-opportunity-details').style.display = "none"; 
            document.getElementById('declaration-details').style.display = "none";
        }   );

       
        $('#have_ni').on('change', function () {

    if (this.value === 'yes'){
        $("#ni").show();
        $("#ni_reference").hide();
        $("#ni_number").attr("class","form-control required-personal");
        $("#ni_reference_number").attr("class","");
    } else {
        $("#ni_reference").show();
        $("#ni_reference_number").attr("class","form-control required-personal");
        $("#ni").hide();
        $("#ni_number").attr("class","");
    }
});
$('#have_mnc').on('change', function () {

if (this.value === 'yes'){
    $("#mnc").show();
    $("#mnc_pin").attr("class","form-control required-personal");
} else {
    $("#mnc").hide();
    $("#mnc_pin").attr("class","");
}
});
$('#have_sharecode').on('change', function () {

if (this.value === 'yes'){
    $("#employer_sharecode").show();
    $("#sharecode").attr("class","form-control required-passport");
    $("#sharecode_generator").hide();
} else {
    $("#employer_sharecode").show();
    $("#sharecode").attr("class","form-control required-passport");
    $("#sharecode_generator").show();
    //document.getElementById("sharecode_generator").style.color = "red";
}
});


$('#disable').on('change', function () {

if (this.value === 'yes'){
    $("#disability").show();
    $("#disability_note").attr("class","form-control required-equal");
} else {
    $("#disability").hide();
    $("#disability_note").attr("class","");
}
});

$('#service').on('change', function () {

if (this.value === 'yes'){
    $("#service_details").show();
    $("#service_note").attr("class","form-control required-equal");
} else {
    $("#service_details").hide();
    $("#service_note").attr("class","");
}
});
$('#offence').on('change', function () {

if (this.value === 'yes'){
    $("#offence_details").show();
    $("#offence_note").attr("class","form-control required-equal");
} else {
    $("#offence_details").hide();
    $("#offence_note").attr("class","");
}
});
$('#disciplinary_procedure').on('change', function () {

if (this.value === 'yes'){
    $("#disciplinary_details").show();
    $("#disciplinary_note").attr("class","form-control required-equal");
} else {
    $("#disciplinary_details").hide();
    $("#disciplinary_note").attr("class","");
}
});
$('#criminal_offence').on('change', function () {

if (this.value === 'yes'){
    $("#criminal_details").show();
    $("#criminal_note").attr("class","form-control required-equal");
} else {
    $("#criminal_details").hide();
    $("#criminal_note").attr("class","");
}
});

            
        function onlyNumberKeyContact(evt) {
          
          // Only ASCII character in that range allowed
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
              return false;
              
              var text = $('#relative_tel').val();

              if(text.length<9){
                    $("#less-digits").removeClass("hide-text");
                //return false;
              }else if(text.length==9){
                    $("#less-digits").addClass("hide-text");
              }else if(text.length>9){
                return false;
              }
    
    
    
          return true;
         
      }
       //backspace clear
      $('#relative_tel').keydown(function(e){
        if(e.keyCode == 8)
        $("#less-digits").removeClass("hide-text");
    })  

    function onlyNumberKeyMobile(evt) {
          
          // Only ASCII character in that range allowed
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
              return false;
              
              var text = $('#relative_mobile').val();

              if(text.length<9){
                    $("#mobile-digits").removeClass("hide-text");
                //return false;
              }else if(text.length==9){
                    $("#mobile-digits").addClass("hide-text");
              }else if(text.length>9){
                return false;
              }
    
    
    
          return true;
         
      }
 //backspace clear
      $('#relative_mobile').keydown(function(e){
        if(e.keyCode == 8)
        $("#mobile-digits").removeClass("hide-text");
    })
           
    $("#relative_email").keypress(function () {  
                $("#invalid-mail").addClass("hide-text");     
        var inputvalues = $(this).val();    
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;    
        if(!regex.test(inputvalues)){  
            //alert("hjh")  
        $("#invalid-mail").removeClass("hide-text");   
       // return regex.test(inputvalues);    
        }    
        });   

        //backspace clear
        $('#relative_email').keydown(function(e){
        if(e.keyCode == 8){
            var inputvalues = $(this).val();    
            //alert(inputvalues)
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;    
        if(!regex.test(inputvalues)){  
              
        $("#invalid-mail").removeClass("hide-text");   
       // return regex.test(inputvalues);    
        }    
    } 
    })
            // Show Details text field if yes
            $("input[type='radio']").change(function(){
            
            if($(this).val()=="yes")
            {
                //$("#depression_note").show();
            }
            else
            {
                   // $("#depression_note").hide(); 
            }
                
            });
            $("input[type='radio']").change(function(){
            
            if($(this).val()=="yes")
            {
               // $("#epilepsy_note").show();
            }
            else
            {
                  //  $("#epilepsy_note").hide(); 
            }
                
        });

        /* $("#relative_tel").on("blur", function(){
        var mobNum = $(this).val();
        var filter = /^\d*(?:\.\d{1,2})?$/;

          if (filter.test(mobNum)) {
            if(mobNum.length<10){
                $("#less-digits").removeClass("hide-text");
                $("#more-digits").addClass("hide-text");
            }else if(mobNum.length>10){
                $("#more-digits").removeClass("hide-text");
                $("#less-digits").addClass("hide-text");
            }
            else if(mobNum.length==10){
                $("#less-digits").addClass("hide-text");
                $("#more-digits").addClass("hide-text");
            }
        }
    
  }); */

//Check if personal-details filled
        $(document).on('change keyup', '.required-personal', function(e){
            let Disabled = true;
                $(".required-personal").each(function() {
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
//Check if health-details filled
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
//Check if passport-details filled
$(document).on('change keyup', '.required-passport', function(e){
                let Disabled = true;
                $(".required-passport").each(function() {
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
//Check if educational-details filled
$(document).on('change keyup', '.required-education', function(e){
                let Disabled = true;
                $(".required-education").each(function() {
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
                    $('.toggle-disabled-education').prop("disabled", true);
                }else{
                    $('.toggle-disabled-education').prop("disabled", false);
                }
            });
            //Check if educational-details filled
$(document).on('change keyup', '.required-work', function(e){
                let Disabled = true;
                $(".required-work").each(function() {
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
                    $('.toggle-disabled-work').prop("disabled", true);
                }else{
                    $('.toggle-disabled-work').prop("disabled", false);
                }
            });
//Check if equal-monitoring-details filled
$(document).on('change keyup', '.required-equal', function(e){
                let Disabled = true;
                $(".required-equal").each(function() {
                let value = this.value
                agree_checkBox1 = document.getElementById('agree_declaration');
                agree_checkBox2 = document.getElementById('agree');
                if ((value)&&(value.trim() !='')&&(agree_checkBox1.checked)&&(agree_checkBox2.checked))
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
//Check if declaration-details filled
$(document).on('change keyup', '.required-declaration', function(e){
                let Disabled = true;
                $(".required-declaration").each(function() {
                let value = this.value
                agree_submit = document.getElementById('agree_submit');
                if ((value)&&(value.trim() !='')&&(agree_submit.checked))
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
            $('#eduadd').click(function() {
                $("#tbl").append('<tr><td><input type="text" class="form-control mb-3" value="" placeholder="Enter your study place" required/>  </td><td><input type="text" class="form-control mb-3" value="" placeholder="Enter your qualification" required/></td><td><input type="date" class="form-control mb-3" value="" placeholder="Enter your qualified date" required/></td></tr>');
            });        
//Adding new Rows to the eduaction details          
        function addField( table ){
        i=i+1;
        var tableRef = document.getElementById(table);
        var newRow   = tableRef.insertRow(-1);
      
        var newCell  = newRow.insertCell(0);
        var newElem = document.createElement( 'input' );
        newElem.setAttribute("name", "id");
        newElem.setAttribute("value", i);
        newElem.setAttribute("disabled", true);
        newElem.setAttribute("type", "text");
        newElem.setAttribute("class", "form-control mb-3");
        newElem.setAttribute('required', '');
        newCell.appendChild(newElem);

        var newCell  = newRow.insertCell(1);
        var newElem = document.createElement( 'input' );
        newElem.setAttribute("name", "study_place");
        newElem.setAttribute("id", 'study_place'+i);
        newElem.setAttribute("type", "text");
        newElem.setAttribute('placeholder',"Enter your study place");
        newElem.setAttribute("class", "form-control mb-3");
        newElem.setAttribute('required', '');
        newCell.appendChild(newElem);

        newCell = newRow.insertCell(2);
        newElem = document.createElement( 'input' );
        newElem.setAttribute("name", "qualification");
        newElem.setAttribute("id", 'qualification'+i);
        newElem.setAttribute("type", "text");
        newElem.setAttribute('placeholder',"Enter your qualification");
        newElem.setAttribute("class", "form-control mb-3");
        newCell.appendChild(newElem);

        newCell = newRow.insertCell(3);
        newElem = document.createElement( 'input' );
        newElem.setAttribute("name", "qualified_date");
        newElem.setAttribute("id", 'qualified_date'+i);
        newElem.setAttribute("type", "date");
        newElem.setAttribute('placeholder',"Enter your qualified date");
        newElem.setAttribute("class", "form-control mb-3");
        newCell.appendChild(newElem);

        newCell  = newRow.insertCell(4);
        newElem = document.createElement( 'input' );
        newElem.setAttribute("name", 'docEducation'+i);
        newElem.setAttribute("id", 'docEducation'+i);
        newElem.setAttribute("type", "file");
        newElem.setAttribute("class", "form-control mb-3");
        newElem.setAttribute("onchange", "otherEducation(i)");
        newCell.appendChild(newElem);

        $('#education-button').prop( "disabled", true );
        //$('.toggle-disabled-education').prop( "disabled", true );

       /*  newCell = newRow.insertCell(3);
        newElem = document.createElement( 'input' );
        newElem.setAttribute("type", "button");
        newElem.setAttribute("value", "Delete Row");
        newElem.setAttribute("onclick", 'SomeDeleteRowFunction(this)')
        newCell.appendChild(newElem); */
        }


        window.SomeDeleteRowFunction = function SomeDeleteRowFunction(o) {
        var p=o.parentNode.parentNode;
        p.parentNode.removeChild(p);
        

        }

//Adding new Rows to the work details          
        function addWorkField( table ){
            j=j+1;
            var tableRef = document.getElementById(table);
            var newRow   = tableRef.insertRow(-1);
           
            var newCell  = newRow.insertCell(0);
            var newElem = document.createElement( 'input' );
            newElem.setAttribute("name", "id");
            newElem.setAttribute("value", j);
            newElem.setAttribute("disabled", true);
            newElem.setAttribute("type", "text");
            newElem.setAttribute("class", "form-control mb-3");
            newElem.setAttribute('required', '');
            newCell.appendChild(newElem);

            newCell = newRow.insertCell(1);
            newElem = document.createElement( 'input' );
            newElem.setAttribute("name", "from");
            newElem.setAttribute("id", 'from'+j);
            newElem.setAttribute("type", "date");
            newElem.setAttribute("class", "form-control mb-3");
            newCell.appendChild(newElem);

            newCell = newRow.insertCell(2);
            newElem = document.createElement( 'input' );
            newElem.setAttribute("name", "to");
            newElem.setAttribute("id", 'to'+j);
            newElem.setAttribute("type", "date");
            newElem.setAttribute("class", "form-control mb-3");
            newCell.appendChild(newElem);

            newCell = newRow.insertCell(3);
            newElem = document.createElement( 'input' );
            newElem.setAttribute("name", "employer_name");
            newElem.setAttribute("id", 'employer_name'+j);
            newElem.setAttribute("type", "text");
            newElem.setAttribute('placeholder',"Enter your employer name");
            newElem.setAttribute("class", "form-control mb-3");
            newCell.appendChild(newElem);

            newCell = newRow.insertCell(4);
            newElem = document.createElement( 'input' );
            newElem.setAttribute("name", "business_type");
            newElem.setAttribute("id", 'business_type'+j);
            newElem.setAttribute("type", "text");
            newElem.setAttribute('placeholder',"Enter your business type");
            newElem.setAttribute("class", "form-control mb-3");
            newCell.appendChild(newElem);

            newCell = newRow.insertCell(5);
            newElem = document.createElement( 'input' );
            newElem.setAttribute("name", "job_title");
            newElem.setAttribute("id", 'job_title'+j);
            newElem.setAttribute("type", "text");
            newElem.setAttribute('placeholder',"Enter your job title");
            newElem.setAttribute("class", "form-control mb-3");
            newCell.appendChild(newElem);

            newCell  = newRow.insertCell(6);
            newElem = document.createElement( 'input' );
            newElem.setAttribute("name", 'docWork'+j);
            newElem.setAttribute("id", 'docWork'+j);
            newElem.setAttribute("type", "file");
            newElem.setAttribute("class", "form-control mb-3");
            newElem.setAttribute("onchange", "otherWork(j)");
            newCell.appendChild(newElem);


            /*  newCell = newRow.insertCell(3);
            newElem = document.createElement( 'input' );
            newElem.setAttribute("type", "button");
            newElem.setAttribute("value", "Delete Row");
            newElem.setAttribute("onclick", 'SomeDeleteRowFunction(this)')
            newCell.appendChild(newElem); */
            }


            window.SomeDeleteRowFunction = function SomeDeleteRowFunction(o) {
            var p=o.parentNode.parentNode;
            p.parentNode.removeChild(p);
            }


//$('#passportSubmit').click(function(){
  function passportSubmit(){
    var employeeId= $("#loggedId").val()
    var passport_expiry_date= $("#expiry_date").val()
   // Get the selected file
   var files = $('#passportFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Passport');
      fd.append('file_type_additional','Passport');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',passport_expiry_date);


      // Hide alert 
      $('#responseMsg').hide();

      // AJAX request 
      $.ajax({
        url: "{{route('file.upload')}}",
        method: 'post',
        data: fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){

          // Hide error container
          $('#err_file').removeClass('d-block');
          $('#err_file').addClass('d-none');

          if(response.success == 1){ // Uploaded successfully

            // Response message
            $('#responseMsg').removeClass("alert-danger");
            $('#responseMsg').addClass("alert-success");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();

            // File preview
            $('#filepreview').show();
            $('#filepreview img,#filepreview a').hide();
            if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

               $('#filepreview img').attr('src',response.filepath);
               $('#filepreview img').show();
            }else{
               $('#filepreview a').attr('href',response.filepath).show();
               $('#filepreview a').show();
            }
          }else if(response.success == 2){ // File not uploaded

            // Response message
            $('#responseMsg').removeClass("alert-success");
            $('#responseMsg').addClass("alert-danger");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();
          }else{
            // Display Error
            $('#err_file').text(response.error);
            $('#err_file').removeClass('d-none');
            $('#err_file').addClass('d-block');
          } 
        },
        error: function(response){
           console.log("error : " + JSON.stringify(response) );
        }
      });
   }else{
      alert("Please select a file.");
   }
  }
 //});

 //$('#brpSubmit').click(function(){
   function brpSubmit(){
    var employeeId= $("#loggedId").val();
    var brp_expiry_date= $("#brp_expiry_date").val()

   // Get the selected file
   var files = $('#brpFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','BRP');
      fd.append('file_type_additional','BRP');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',brp_expiry_date);


      // Hide alert 
      $('#responseMsg').hide();

      // AJAX request 
      $.ajax({
        url: "{{route('file.upload')}}",
        method: 'post',
        data: fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){

          // Hide error container
          $('#err_file').removeClass('d-block');
          $('#err_file').addClass('d-none');

          if(response.success == 1){ // Uploaded successfully

            // Response message
            $('#responseMsg').removeClass("alert-danger");
            $('#responseMsg').addClass("alert-success");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();

            // File preview
            $('#filepreview').show();
            $('#filepreview img,#filepreview a').hide();
            if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

               $('#filepreview img').attr('src',response.filepath);
               $('#filepreview img').show();
            }else{
               $('#filepreview a').attr('href',response.filepath).show();
               $('#filepreview a').show();
            }
          }else if(response.success == 2){ // File not uploaded

            // Response message
            $('#responseMsg').removeClass("alert-success");
            $('#responseMsg').addClass("alert-danger");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();
          }else{
            // Display Error
            $('#err_file').text(response.error);
            $('#err_file').removeClass('d-none');
            $('#err_file').addClass('d-block');
          } 
        },
        error: function(response){
           console.log("error : " + JSON.stringify(response) );
        }
      });
   }else{
      alert("Please select a file.");
   }
   }
 //});

 //$('#rightSubmit').click(function(){
  function rightSubmit(){
    var employeeId= $("#loggedId").val()
   // Get the selected file
   var files = $('#rightFile')[0].files;
   console.log(files);

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','Right To Work');
      fd.append('file_type_additional','Right To Work');
      fd.append('employeeId',employeeId);


      // Hide alert 
      $('#responseMsg').hide();

      // AJAX request 
      $.ajax({
        url: "{{route('file.upload')}}",
        method: 'post',
        data: fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){

          // Hide error container
          $('#err_file').removeClass('d-block');
          $('#err_file').addClass('d-none');

          if(response.success == 1){ // Uploaded successfully

            // Response message
            $('#responseMsg').removeClass("alert-danger");
            $('#responseMsg').addClass("alert-success");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();

            // File preview
            $('#filepreview').show();
            $('#filepreview img,#filepreview a').hide();
            if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

               $('#filepreview img').attr('src',response.filepath);
               $('#filepreview img').show();
            }else{
               $('#filepreview a').attr('href',response.filepath).show();
               $('#filepreview a').show();
            }
          }else if(response.success == 2){ // File not uploaded

            // Response message
            $('#responseMsg').removeClass("alert-success");
            $('#responseMsg').addClass("alert-danger");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();
          }else{
            // Display Error
            $('#err_file').text(response.error);
            $('#err_file').removeClass('d-none');
            $('#err_file').addClass('d-block');
          } 
        },
        error: function(response){
           console.log("error : " + JSON.stringify(response) );
        }
      });
   }else{
      alert("Please select a file.");
   }
  }
 //});
 
 $('#educationSubmit').click(function(){
    //alert($('input[name=study_place]').val());
         var count = $('#tbl tr').length-1;
      //  alert(count);
        /*var study_place =  $("#study_place").val()
        alert(study_place);
        for (i = 0; i < count; i++) {
            $data = [
                'study_place' => $student_id[$i], */
        var itemlist = new Array;
       
        
        for (i = 0; i < count; i++) {
            itemlist[i] = {};
            itemlist[i].study_place = $("#study_place"+(i+1)).val();
            itemlist[i].qualification = $("#qualification"+(i+1)).val();
            itemlist[i].qualified_date = $("#qualified_date"+(i+1)).val();
        }
        console.log(itemlist);
    jQuery.ajax({
  
                  url: "{{ route('save.education') }}",
                  method: 'get',
                   data: {
                    itemlist: itemlist
                 }, 
                  success: function(result){
                     console.log(result);
                     successFunction();
                  }});
                  
                  //$('#education-button').prop( "disabled", false );
                  $('#work').show();
  });

  $('#workSubmit').click(function(){
         var count = $('#workTable tr').length-1;
        //alert(count);
        var itemlist = new Array;
  
        for (i = 0; i < count; i++) {
            itemlist[i] = {};
            itemlist[i].from = $("#from"+(i+1)).val();
            itemlist[i].to = $("#to"+(i+1)).val();
            itemlist[i].employer_name = $("#employer_name"+(i+1)).val();
            itemlist[i].business_type = $("#business_type"+(i+1)).val();
            itemlist[i].job_title = $("#job_title"+(i+1)).val();

        }
        console.log(itemlist);
    
        jQuery.ajax({
  
                  url: "{{ route('save.work') }}",
                  method: 'get',
                   data: {
                    itemlist: itemlist
                 }, 
                  success: function(result){
                     console.log(result);
                     workSuccessFunction();
                  }});
                  $('#education-button').prop( "disabled", false );

  });
        function applicationPersonalSubmit(){
            document.getElementById('personal-details').style.display = "none"; 
           // document.getElementById('health-details').style.display = "block"; 
            document.getElementById('passport-details').style.display = "block"; 
           // document.getElementById("health-button").disabled = true;
           //document.getElementById("passport-button").disabled = true;
        }
        function applicationHealthSubmit(){
            document.getElementById('health-details').style.display = "none"; 
            document.getElementById("passport-button").disabled = true;
            document.getElementById('passport-details').style.display = "block"; 
        }
        function applicationPassportSubmit(){
            document.getElementById('passport-details').style.display = "none"; 
            document.getElementById("education-button").disabled = true;
           // document.getElementById("equal-button").disabled = true;
            document.getElementById("education-work-details").style.display = "block"; 
            $('#eduId').val("1");
            $('#workId').val("1");
        }
        function applicationEducationSubmit(){
            document.getElementById('education-work-details').style.display = "none"; 
            document.getElementById("education-button").disabled = true;
            document.getElementById("equal-opportunity-details").style.display = "block"; 
        }
        function applicationEqualOpportunitySubmit(){
            document.getElementById('equal-opportunity-details').style.display = "none"; 
            document.getElementById("declaration-details").style.display = "block"; 
        }
        function successFunction(){
            document.getElementById('successMsg').style.display = "block";

        }
        function workSuccessFunction(){
            document.getElementById('workSuccessMsg').style.display = "block";

        }
        $('#visa_status').on('change', function () {
           /*  $('#application-form input[type="text"]').val('');
            $('#application-form input[type="date"]').val('');
            $('#application-form input[type="date"]').val(''); */
            if(this.value == "Other"){
                $('#other').show();
                $("#other_note").attr("class","form-control required-passport");
            }else{
                $('#other').hide();
                $("#other_note").attr("class","");
            }
         if (this.value == "Not Applicable"){
            $('#visa_details').show();
            $('#passport_details_section').show();
            $("#visa_expiry_date").attr("class","form-control");
            $("#issue_date").attr("class","form-control");
            $("#expiry_date").attr("class","form-control");
            $("#passport_no").attr("class","form-control");
            $("#place_of_issue").attr("class","form-control");
            $("#passportFile").attr("class","form-control");
            $( "#passport-button" ).prop( "disabled", true );
        }else if (this.value == "EU Settlement Scheme (EUSS)" || this.value == "Right of Abode" || this.value == "Start-up or Innovator Visa"){
            $('#visa_details').show();
            $('#passport_details_section').show();
            $("#visa_expiry_date").attr("class","form-control required-passport");
            $("#issue_date").attr("class","form-control");
            $("#expiry_date").attr("class","form-control");
            $("#passport_no").attr("class","form-control");
            $("#place_of_issue").attr("class","form-control");
            $("#passportFile").attr("class","form-control");
            $( "#passport-button" ).prop( "disabled", true );
        }else if (this.value == "Other"){
            $('#visa_details').show();
            $('#passport_details_section').show();
            $("#other_note").attr("class","form-control required-passport");
            $("#visa_expiry_date").attr("class","form-control");
            $("#issue_date").attr("class","form-control");
            $("#expiry_date").attr("class","form-control");
            $("#passport_no").attr("class","form-control");
            $("#place_of_issue").attr("class","form-control");
            $("#passportFile").attr("class","form-control");
            $( "#passport-button" ).prop( "disabled", true );
        } else {
            $('#visa_details').show();
            $('#passport_details_section').show();
            $("#visa_expiry_date").attr("class","form-control required-passport");
            $("#issue_date").attr("class","form-control required-passport");
            $("#expiry_date").attr("class","form-control required-passport");
            $("#passport_no").attr("class","form-control required-passport");
            $("#place_of_issue").attr("class","form-control required-passport");
            //$("#passportFile").attr("class","form-control required-passport");
            $( "#passport-button" ).prop( "disabled", true );

        }
    });

    function uploadEducationDoc(){
        var employeeId= $("#loggedId").val()
         // Get the selected file
   var files = $('#docEducation1')[0].files;
   console.log(files);
   var additional = $("#qualification1").val();
   var expiry_date="1900-01-01";
   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type',additional);
      fd.append('file_type_additional','Education 1');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',expiry_date);


      // Hide alert 
      $('#responseMsg').hide();

      // AJAX request 
      $.ajax({
        url: "{{route('file.upload')}}",
        method: 'post',
        data: fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){

          // Hide error container
          $('#err_file').removeClass('d-block');
          $('#err_file').addClass('d-none');

          if(response.success == 1){ // Uploaded successfully

            // Response message
            $('#responseMsg').removeClass("alert-danger");
            $('#responseMsg').addClass("alert-success");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();

            // File preview
            $('#filepreview').show();
            $('#filepreview img,#filepreview a').hide();
            if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

               $('#filepreview img').attr('src',response.filepath);
               $('#filepreview img').show();
            }else{
               $('#filepreview a').attr('href',response.filepath).show();
               $('#filepreview a').show();
            }
          }else if(response.success == 2){ // File not uploaded

            // Response message
            $('#responseMsg').removeClass("alert-success");
            $('#responseMsg').addClass("alert-danger");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();
          }else{
            // Display Error
            $('#err_file').text(response.error);
            $('#err_file').removeClass('d-none');
            $('#err_file').addClass('d-block');
          } 
        },
        error: function(response){
           console.log("error : " + JSON.stringify(response) );
        }
      });
   }else{
      alert("Please select a file.");
   }
    }
    function uploadWorkDoc(){
    var employeeId= $("#loggedId").val()
 // Get the selected file
 var files = $('#docWork1')[0].files;
   console.log(files);
   var additional = $("#job_title1").val();
   var expiry_date="1900-01-01";

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type',additional);
      fd.append('file_type_additional','Work 1');
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',expiry_date);

      // Hide alert 
      $('#responseMsg').hide();

      // AJAX request 
      $.ajax({
        url: "{{route('file.upload')}}",
        method: 'post',
        data: fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){

          // Hide error container
          $('#err_file').removeClass('d-block');
          $('#err_file').addClass('d-none');

          if(response.success == 1){ // Uploaded successfully

            // Response message
            $('#responseMsg').removeClass("alert-danger");
            $('#responseMsg').addClass("alert-success");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();

            // File preview
            $('#filepreview').show();
            $('#filepreview img,#filepreview a').hide();
            if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

               $('#filepreview img').attr('src',response.filepath);
               $('#filepreview img').show();
            }else{
               $('#filepreview a').attr('href',response.filepath).show();
               $('#filepreview a').show();
            }
          }else if(response.success == 2){ // File not uploaded

            // Response message
            $('#responseMsg').removeClass("alert-success");
            $('#responseMsg').addClass("alert-danger");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();
          }else{
            // Display Error
            $('#err_file').text(response.error);
            $('#err_file').removeClass('d-none');
            $('#err_file').addClass('d-block');
          } 
        },
        error: function(response){
           console.log("error : " + JSON.stringify(response) );
        }
      });
   }else{
      alert("Please select a file.");
   }   
 }

    function otherEducation(id){
    var employeeId= $("#loggedId").val()
   // Get the selected file
   var files = $('#docEducation'+id)[0].files;
   console.log(files);
   var additional = $("#qualification"+id).val();
   var expiry_date="1900-01-01";

   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type',additional);
      fd.append('file_type_additional','Education '+id);
      fd.append('employeeId',employeeId);
      fd.append('expiry_date',expiry_date);


      // Hide alert 
      $('#responseMsg').hide();

      // AJAX request 
      $.ajax({
        url: "{{route('file.upload')}}",
        method: 'post',
        data: fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){

          // Hide error container
          $('#err_file').removeClass('d-block');
          $('#err_file').addClass('d-none');

          if(response.success == 1){ // Uploaded successfully

            // Response message
            $('#responseMsg').removeClass("alert-danger");
            $('#responseMsg').addClass("alert-success");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();

            // File preview
            $('#filepreview').show();
            $('#filepreview img,#filepreview a').hide();
            if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

               $('#filepreview img').attr('src',response.filepath);
               $('#filepreview img').show();
            }else{
               $('#filepreview a').attr('href',response.filepath).show();
               $('#filepreview a').show();
            }
          }else if(response.success == 2){ // File not uploaded

            // Response message
            $('#responseMsg').removeClass("alert-success");
            $('#responseMsg').addClass("alert-danger");
            $('#responseMsg').html(response.message);
            $('#responseMsg').show();
          }else{
            // Display Error
            $('#err_file').text(response.error);
            $('#err_file').removeClass('d-none');
            $('#err_file').addClass('d-block');
          } 
        },
        error: function(response){
           console.log("error : " + JSON.stringify(response) );
        }
      });
   }else{
      alert("Please select a file.");
   }

 
}
function otherWork(id){
    var employeeId= $("#loggedId").val()
 // Get the selected file
 var files = $('#docWork'+id)[0].files;
 console.log(files);
 var additional = $("#job_title"+id).val();
 var expiry_date="1900-01-01";

 if(files.length > 0){
    var fd = new FormData();

    // Append data 
    fd.append('file',files[0]);
    fd.append('_token',CSRF_TOKEN);
    fd.append('file_type',additional);
    fd.append('file_type_additional','Work '+id);
    fd.append('employeeId',employeeId);
    fd.append('expiry_date',expiry_date);

    // Hide alert 
    $('#responseMsg').hide();

    // AJAX request 
    $.ajax({
      url: "{{route('file.upload')}}",
      method: 'post',
      data: fd,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response){

        // Hide error container
        $('#err_file').removeClass('d-block');
        $('#err_file').addClass('d-none');

        if(response.success == 1){ // Uploaded successfully

          // Response message
          $('#responseMsg').removeClass("alert-danger");
          $('#responseMsg').addClass("alert-success");
          $('#responseMsg').html(response.message);
          $('#responseMsg').show();

          // File preview
          $('#filepreview').show();
          $('#filepreview img,#filepreview a').hide();
          if(response.extension == 'jpg' || response.extension == 'jpeg' || response.extension == 'png'){

             $('#filepreview img').attr('src',response.filepath);
             $('#filepreview img').show();
          }else{
             $('#filepreview a').attr('href',response.filepath).show();
             $('#filepreview a').show();
          }
        }else if(response.success == 2){ // File not uploaded

          // Response message
          $('#responseMsg').removeClass("alert-success");
          $('#responseMsg').addClass("alert-danger");
          $('#responseMsg').html(response.message);
          $('#responseMsg').show();
        }else{
          // Display Error
          $('#err_file').text(response.error);
          $('#err_file').removeClass('d-none');
          $('#err_file').addClass('d-block');
        } 
      },
      error: function(response){
         console.log("error : " + JSON.stringify(response) );
      }
    });
 }else{
    alert("Please select a file.");
 }


}

var nameField = document.getElementById("name");
var sign = document.getElementById("signature");
 function createSign(){
    sign.value = nameField.value;
}

$('#have_work').on('change', function () {

if (this.value === 'yes'){
    $("#work_experience").show();
    $("#education-button").show();
    $('#education-button').prop( "disabled", true );
} else {
    $('#education-button').prop( "disabled", false );
    $("#education-button").show();
    $("#work_experience").hide();
}
});

function NINumCheck(evt) {
          
          // Only ASCII character in that range allowed
       
              
              var text = $('#ni_number').val();

              if(text.length<8){
                    $("#less-characters").removeClass("hide-text");
                //return false;
              }else if(text.length==8){
                    $("#less-characters").addClass("hide-text");
              }else if(text.length>8){
                $("#less-characters").addClass("hide-text");
                return false;
              }         
      }
       //backspace clear
       $('#ni_number').keydown(function(e){
        var text = $('#ni_number').val();
        if(text.length<=9){
        $("#less-characters").removeClass("hide-text");
        }
    })
    function NIReferenceNumCheck(evt) {
          
          // Only ASCII character in that range allowed
       
              
              var text = $('#ni_reference_number').val();

              if(text.length<7){
                    $("#less-reference-characters").removeClass("hide-text");
                //return false;
              }else if(text.length==7){
                    $("#less-reference-characters").addClass("hide-text");
              }else if(text.length>7){
                $("#less-reference-characters").addClass("hide-text");
                return false;
              }         
      }
       //backspace clear
       $('#ni_reference_number').keydown(function(e){
        var text = $('#ni_reference_number').val();
        if(text.length<=9){
        $("#less-reference-characters").removeClass("hide-text");
        }
    })
    function NMCNumCheck(evt) {
          
          // Only ASCII character in that range allowed
       
              
              var text = $('#mnc_pin').val();

              if(text.length<7){
                    $("#less-nmc-characters").removeClass("hide-text");
                //return false;
              }else if(text.length==7){
                    $("#less-nmc-characters").addClass("hide-text");
              }else if(text.length>7){
                $("#less-nmc-characters").addClass("hide-text");
                return false;
              }         
      }
       //backspace clear
       $('#mnc_pin').keydown(function(e){
        var text = $('#mnc_pin').val();
        if(text.length<=9){
        $("#less-nmc-characters").removeClass("hide-text");
        }
    })
</script>






