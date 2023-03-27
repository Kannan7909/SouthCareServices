<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Pay Rate Template</title>
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
                                    <h4 class="page-title">Employee Pay Rate</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 
                        <div class="alert alert-success successMsg" id="successMsg"role="alert" style="display:none">
                                    Saved Successfully!
                                </div>
                        <form>
                        @csrf 
                <div class="card">
                    <div class="card-body">      
                        <div class="row">   
                            <div class="col-md-3 mb-3">
                                <label for="user" class="form-label">Select User Name</label>
                                <select name="user" id="user" class="form-control select2 form-select" required>
                                <option value="" disabled selected hidden>Choose a user</option>
                                @foreach ($users as $user)               
                                    <option value="{{ $user->id }}">{{ $user->login_id }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3" id="fullName">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" id="name" name="name" disabled required>
                            </div>
                            <div class="col-md-3 mb-3" id="mainPost">
                                <label for="posts" class="form-label">Main Post</label>
                                <input class="form-control" type="text" id="posts" name="posts" disabled required>
                            </div>
                            <div class="col-md-3 mb-3" id="subPost">
                                <label for="posts" class="form-label">Sub Posts</label>
                                <input class="form-control" type="text" id="subposts" name="subposts" disabled required>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-3 mb-3" id="commencement">
                                    <label for="date">Date </label></br>
                                    <input type="date" class="form-control date required-input" id="commencement_date" name="commencement_date"  required autocomplete=off>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="mainPostType1">
                    <div class="card-body">    
                        <b><div class="mb-3">Main Post Pay Rate </div></b>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="alcohol">Weekday Longday </label></br>
                                <input class="" type="text" id="weekday_longday_type1" name="weekday_longday_type1" placeholder="Enter weekday longday rate" autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekday Night </label></br>
                                <input class="" type="text" id="weekday_night_type1" name="weekday_night_type1" placeholder="Enter weekday night rate" autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Bank Holiday </label></br>
                                <input class="" type="text" id="bank_holiday_type1" name="bank_holiday_type1" placeholder="Enter bank holiday rate" autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekend Longday </label></br>
                                <input class="" type="text" id="weekend_longday_type1" name="weekend_longday_type1" placeholder="Enter weekend longday rate" autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekend Night </label></br>
                                <input class="" type="text" id="weekend_night_type1" name="weekend_night_type1" placeholder="Enter weekend night rate" autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="mainPostType2">
                    <div class="card-body">    
                        <b><div class="mb-3">Main Post Pay Rate</div></b>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="alcohol">Weekday Longday </label></br>
                                <input class="form-control" type="text" id="weekday_longday_type2" name="weekday_longday_type2" placeholder="Enter weekday longday rate" autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekend Longday </label></br>
                                <input class="form-control required-health" type="text" id="weekend_longday_type2" name="weekend_longday_type2" placeholder="Enter weekend longday rate" autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Bank Holiday </label></br>
                                <input class="form-control required-health" type="text" id="bank_holiday_type2" name="bank_holiday_type2" placeholder="Enter bank holiday rate" autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="kitchenRate">
                    <div class="card-body">   
                        <b><div class="mb-3">Sub Posts Pay Rate - Kitchen Assistant</div></b>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="alcohol">Weekday Longday </label></br>
                                <input class="form-control" type="text" id="kitchen_weekday_longday" name="kitchen_weekday_longday" placeholder="Enter weekday longday rate" autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekday Night </label></br>
                                <input class="form-control required-health" type="text" id="kitchen_weekday_night" name="kitchen_weekday_night" placeholder="Enter weekday night rate" autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Bank Holiday </label></br>
                                <input class="form-control required-health" type="text" id="kitchen_bank_holiday" name="kitchen_bank_holiday" placeholder="Enter bank holiday rate" autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekend Longday </label></br>
                                <input class="form-control required-health" type="text" id="kitchen_weekend_longday" name="kitchen_weekend_longday" placeholder="Enter weekend longday rate" autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekend Night </label></br>
                                <input class="form-control required-health" type="text" id="kitchen_weekend_night" name="kitchen_weekend_night" placeholder="Enter weekend night rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="domesticRate">
                    <div class="card-body">   
                        <b><div class="mb-3">Sub Posts Pay Rate - Domestic care</div></b>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="alcohol">Weekday Longday </label></br>
                                <input class="form-control" type="text" id="domestic_weekday_longday" name="domestic_weekday_longday" placeholder="Enter weekday longday rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekday Night </label></br>
                                <input class="form-control required-health" type="text" id="domestic_weekday_night" name="domestic_weekday_night" placeholder="Enter weekday night rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Bank Holiday </label></br>
                                <input class="form-control required-health" type="text" id="domestic_bank_holiday" name="domestic_bank_holiday" placeholder="Enter bank holiday rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekend Longday </label></br>
                                <input class="form-control required-health" type="text" id="domestic_weekend_longday" name="domestic_weekend_longday" placeholder="Enter weekend longday rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekend Night </label></br>
                                <input class="form-control required-health" type="text" id="domestic_weekend_night" name="domestic_weekend_night" placeholder="Enter weekend night rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="careRate">
                    <div class="card-body">   
                        <b><div class="mb-3">Sub Posts Pay Rate - Care Assistant</div></b>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="alcohol">Weekday Longday </label></br>
                                <input class="form-control" type="text" id="care_weekday_longday" name="care_weekday_longday" placeholder="Enter weekday longday rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekday Night </label></br>
                                <input class="form-control required-health" type="text" id="care_weekday_night" name="care_weekday_night" placeholder="Enter weekday night rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Bank Holiday </label></br>
                                <input class="form-control required-health" type="text" id="care_bank_holiday" name="care_bank_holiday" placeholder="Enter bank holiday rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekend Longday </label></br>
                                <input class="form-control required-health" type="text" id="care_weekend_longday" name="care_weekend_longday" placeholder="Enter weekend longday rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekend Night </label></br>
                                <input class="form-control required-health" type="text" id="care_weekend_night" name="care_weekend_night" placeholder="Enter weekend night rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="livingRate">
                    <div class="card-body">   
                        <b><div class="mb-3">Sub Posts Pay Rate - Living Care</div></b>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="alcohol">Weekday Longday </label></br>
                                <input class="form-control" type="text" id="living_weekday_longday" name="living_weekday_longday" placeholder="Enter weekday longday rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekday Night </label></br>
                                <input class="form-control required-health" type="text" id="living_weekday_night" name="living_weekday_night" placeholder="Enter weekday night rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Bank Holiday </label></br>
                                <input class="form-control required-health" type="text" id="living_bank_holiday" name="living_bank_holiday" placeholder="Enter bank holiday rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekend Longday </label></br>
                                <input class="form-control required-health" type="text" id="living_weekend_longday" name="living_weekend_longday" placeholder="Enter weekend longday rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tobacco">Weekend Night </label></br>
                                <input class="form-control required-health" type="text" id="living_weekend_night" name="living_weekend_night" placeholder="Enter weekend night rate"  autocomplete=off onkeypress="return onlyNumberKey(event)">
                            </div>
                        </div>
                    </div>
                </div>
                      <div class="row">
                            <div class="col-xl-12">
                                <div>
                                    
                                    
                                </div>
                           
                                <!-- Toll free number box-->
                                <div class="card text-white bg-info overflow-hidden">
                                    
                                </div> <!-- end card-->
                                <!-- End Toll free number box-->

                                <!-- Messages-->
                              

                            </div> <!-- end col-->



                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-5 mb-3" style="margin-left:-40px;">
                            </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                <button class="btn btn-primary toggle-disabled" type="submit" id="submit" disabled> Submit</button>
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
    $( document ).ready(function() {
    $("#fullName").hide();
    $("#mainPost").hide();
    $("#subPost").hide();
    $("#commencement").hide();
    $("#mainPostType1").hide();
    $("#mainPostType2").hide();
    $("#kitchenRate").hide();
    $("#domesticRate").hide();
    $("#careRate").hide();
    $("#livingRate").hide();
 });


$('#submit').click(function(){
     var user = $('#user').val();
     var commencement_date = $('#commencement_date').val();
     var weekday_longday_type1 = $('#weekday_longday_type1').val();
     var weekday_night_type1 = $('#weekday_night_type1').val();
     var bank_holiday_type1 = $('#bank_holiday_type1').val();
     var weekend_longday_type1 = $('#weekend_longday_type1').val();
     var weekend_night_type1 = $('#weekend_night_type1').val();
     var weekday_longday_type2 = $('#weekday_longday_type2').val();
     var weekend_longday_type2 = $('#weekend_longday_type2').val();
     var bank_holiday_type2 = $('#bank_holiday_type2').val();
     var kitchen_weekday_longday = $('#kitchen_weekday_longday').val();
     var kitchen_weekday_night = $('#kitchen_weekday_night').val();
     var kitchen_bank_holiday = $('#kitchen_bank_holiday').val();
     var kitchen_weekend_longday = $('#kitchen_weekend_longday').val();
     var kitchen_weekend_night = $('#kitchen_weekend_night').val();
     var domestic_weekday_longday = $('#domestic_weekday_longday').val();
     var domestic_weekday_night = $('#domestic_weekday_night').val();
     var domestic_bank_holiday = $('#domestic_bank_holiday').val();
     var domestic_weekend_longday = $('#domestic_weekend_longday').val();
     var domestic_weekend_night = $('#domestic_weekend_night').val();
     var care_weekday_longday = $('#care_weekday_longday').val();
     var care_weekday_night = $('#care_weekday_night').val();
     var care_bank_holiday = $('#care_bank_holiday').val();
     var care_weekend_longday = $('#care_weekend_longday').val();
     var care_weekend_night = $('#care_weekend_night').val();
     var living_weekday_longday = $('#living_weekday_longday').val();
     var living_weekday_night = $('#living_weekday_night').val();
     var living_bank_holiday = $('#living_bank_holiday').val();
     var living_weekend_longday = $('#living_weekend_longday').val();
     var living_weekend_night = $('#living_weekend_night').val();
    jQuery.ajax({
  
  url: "{{ route('save.payRate') }}",
  method: 'get',
  data: {
    user: user,
    commencement_date: commencement_date,
    weekday_longday_type1 : weekday_longday_type1,
    weekday_night_type1 : weekday_night_type1,
    bank_holiday_type1 : bank_holiday_type1,
    weekend_longday_type1 : weekend_longday_type1,
    weekend_night_type1 : weekend_night_type1,
    weekday_longday_type2 : weekday_longday_type2,
    weekend_longday_type2 : weekend_longday_type2,
    bank_holiday_type2 : bank_holiday_type2,
    kitchen_weekday_longday :  kitchen_weekday_longday,
    kitchen_weekday_night : kitchen_weekday_night,
    kitchen_bank_holiday : kitchen_bank_holiday,
    kitchen_weekend_longday : kitchen_weekend_longday,
    kitchen_weekend_night : kitchen_weekend_night,
    domestic_weekday_longday : domestic_weekday_longday,
    domestic_weekday_night : domestic_weekday_night,
    domestic_bank_holiday : domestic_bank_holiday,
    domestic_weekend_longday : domestic_weekend_longday,
    domestic_weekend_night : domestic_weekend_night,
    care_weekday_longday : care_weekday_longday,
    care_weekday_night : care_weekday_night,
    care_bank_holiday : care_bank_holiday,
    care_weekend_longday : care_weekend_longday,
    care_weekend_night : care_weekend_night,
    living_weekday_longday : living_weekday_longday,
    living_weekday_night : living_weekday_night,
    living_bank_holiday : living_bank_holiday,
    living_weekend_longday : living_weekend_longday,
    living_weekend_night : living_weekend_night
 }, 
  success: function(result){
     console.log(result);
     successFunction();

  }}); 
});
function successFunction(result){
    document.getElementById('successMsg').style.display = "block";
}
function showFunction(result){
    $('#weekday').val(result['weekday_rate'])
    $('#weekend').val(result['weekend_rate'])
}

$('#user').on('change', function () {
     var user = $('#user').val();
     $("#mainPostType1").hide();
     $("#mainPostType2").hide();
     $("#subPost").hide();
     $("#kitchenRate").hide();
     $("#domesticRate").hide();
     $("#careRate").hide();
     $("#livingRate").hide();
     jQuery.ajax({
        data: {
    user: user
 }, 
  url: "{{ route('get.posts') }}",
  method: 'get',

  success: function(result){
     console.log(result);
     showPost(result);

  }});      
});
function showPost(result){
    $("#fullName").show();
    $("#mainPost").show();
    $('#name').val(result['firstname']+" "+result['surname'])
    $('#posts').val(result['posts'])
    if(result['posts']=="Nurse" || result['posts']=="Nurse" || result['posts']=="Care Assistant" || result['posts']=="Senior Care Assistant" || result['posts']=="Domiciliary Care"){
        $("#mainPostType1").show();
        $("#commencement").show();
        $("#weekday_longday_type1").attr("class","form-control required-input");
        $("#weekday_night_type1").attr("class","form-control required-input");
        $("#bank_holiday_type1").attr("class","form-control required-input");
        $("#weekend_longday_type1").attr("class","form-control required-input");
        $("#weekend_night_type1").attr("class","form-control required-input");
        $('#commencement_date').val(result['commencement_date']);
        $('#weekday_longday_type1').val(result['weekday_longday_type1']);
        $('#weekday_night_type1').val(result['weekday_night_type1']);
        $('#bank_holiday_type1').val(result['bank_holiday_type1']);
        $('#weekend_longday_type1').val(result['weekend_longday_type1']);
        $('#weekend_night_type1').val(result['weekend_night_type1']);
    }
    if(result['posts']=="Kitchen Assistant" || result['posts']=="Chef" || result['posts']=="Domestic Care"){
        $("#mainPostType2").show();
        $("#weekday_longday_type2").attr("class","form-control required-input");
        $("#bank_holiday_type2").attr("class","form-control required-input");
        $("#weekend_longday_type2").attr("class","form-control required-input");
        $('#commencement_date').val(result['commencement_date']);
        $('#weekday_longday_type2').val(result['weekday_longday_type2']);
        $('#bank_holiday_type2').val(result['bank_holiday_type2']);
        $('#weekend_longday_type2').val(result['weekend_longday_type2']);

    }
    if(result['kitchen_assistant']=="on"){
    $("#subPost").show();
    $('#subposts').val("Kitchen Assistant");
    $("#commencement").show();

    $("#kitchenRate").show();
    $("#kitchen_weekday_longday").attr("class","form-control required-input");
    $("#kitchen_weekday_night").attr("class","form-control required-input");
    $("#kitchen_bank_holiday").attr("class","form-control required-input");
    $("#kitchen_weekend_longday").attr("class","form-control required-input");
    $("#kitchen_weekend_night").attr("class","form-control required-input");
    $('#kitchen_weekday_longday').val(result['kitchen_weekday_longday']);
    $('#kitchen_weekday_night').val(result['kitchen_weekday_night']);
    $('#kitchen_bank_holiday').val(result['kitchen_bank_holiday']);
    $('#kitchen_weekend_longday').val(result['kitchen_weekend_longday']);
    $('#kitchen_weekend_night').val(result['kitchen_weekend_night']);
    $("#domesticRate").hide();
    $("#careRate").hide();
    $("#livingRate").hide();
    }
    if(result['domestic_Care']=="on"){
    $("#subPost").show();
    $('#subposts').val("Domestic Care");
    $("#commencement").show();
    $("#domesticRate").show();
    $("#domestic_weekday_longday").attr("class","form-control required-input");
    $("#domestic_weekday_night").attr("class","form-control required-input");
    $("#domestic_bank_holiday").attr("class","form-control required-input");
    $("#domestic_weekend_longday").attr("class","form-control required-input");
    $("#domestic_weekend_night").attr("class","form-control required-input");
    $('#domestic_weekday_longday').val(result['domestic_weekday_longday']);
    $('#domestic_weekday_night').val(result['domestic_weekday_night']);
    $('#domestic_bank_holiday').val(result['domestic_bank_holiday']);
    $('#domestic_weekend_longday').val(result['domestic_weekend_longday']);
    $('#domestic_weekend_night').val(result['domestic_weekend_night']);
    }
    if(result['kitchen_assistant']=="on" && result['domestic_Care']=="on"){
    $("#subPost").show();
    $('#subposts').val("Kitchen Assistant,Domestic Care");
    $("#commencement").show();
    $("#kitchenRate").show();
    $("#domesticRate").show();
    $("#kitchen_weekday_longday").attr("class","form-control required-input");
    $("#kitchen_weekday_night").attr("class","form-control required-input");
    $("#kitchen_bank_holiday").attr("class","form-control required-input");
    $("#kitchen_weekend_longday").attr("class","form-control required-input");
    $("#kitchen_weekend_night").attr("class","form-control required-input");
    $('#kitchen_weekday_longday').val(result['kitchen_weekday_longday']);
    $('#kitchen_weekday_night').val(result['kitchen_weekday_night']);
    $('#kitchen_bank_holiday').val(result['kitchen_bank_holiday']);
    $('#kitchen_weekend_longday').val(result['kitchen_weekend_longday']);
    $('#kitchen_weekend_night').val(result['kitchen_weekend_night']);

    $("#domestic_weekday_longday").attr("class","form-control required-input");
    $("#domestic_weekday_night").attr("class","form-control required-input");
    $("#domestic_bank_holiday").attr("class","form-control required-input");
    $("#domestic_weekend_longday").attr("class","form-control required-input");
    $("#domestic_weekend_night").attr("class","form-control required-input");
    $('#domestic_weekday_longday').val(result['domestic_weekday_longday']);
    $('#domestic_weekday_night').val(result['domestic_weekday_night']);
    $('#domestic_bank_holiday').val(result['domestic_bank_holiday']);
    $('#domestic_weekend_longday').val(result['domestic_weekend_longday']);
    $('#domestic_weekend_night').val(result['domestic_weekend_night']);
    }
    if(result['care_assistant']=="on"){
    $("#subPost").show();
    $('#subposts').val("Care Assistant");
    $("#commencement").show();
    $("#careRate").show();
    $("#care_weekday_longday").attr("class","form-control required-input");
    $("#care_weekday_night").attr("class","form-control required-input");
    $("#care_bank_holiday").attr("class","form-control required-input");
    $("#care_weekend_longday").attr("class","form-control required-input");
    $("#care_weekend_night").attr("class","form-control required-input");
    $('#care_weekday_longday').val(result['care_weekday_longday']);
    $('#care_weekday_night').val(result['care_weekday_night']);
    $('#care_bank_holiday').val(result['care_bank_holiday']);
    $('#care_weekend_longday').val(result['care_weekend_longday']);
    $('#care_weekend_night').val(result['care_weekend_night']);
    }
    if(result['living_Care']=="on"){
        $("#subPost").show();
        $('#subposts').val("Living Care");
        $("#commencement").show();
        $("#livingRate").show();
        $("#living_weekday_longday").attr("class","form-control required-input");
        $("#living_weekday_night").attr("class","form-control required-input");
        $("#living_bank_holiday").attr("class","form-control required-input");
        $("#living_weekend_longday").attr("class","form-control required-input");
        $("#living_weekend_night").attr("class","form-control required-input");
        $('#living_weekday_longday').val(result['living_weekday_longday']);
        $('#living_weekday_night').val(result['living_weekday_night']);
        $('#living_bank_holiday').val(result['living_bank_holiday']);
        $('#living_weekend_longday').val(result['living_weekend_longday']);
        $('#living_weekend_night').val(result['living_weekend_night']);
    }
}

$(document).on('change keyup', '.required-input', function(e){
            let Disabled = true;
                $(".required-input").each(function() {
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