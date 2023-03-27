<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Employee Contract</title>
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
            @if( $loggedUser->employee_contract == "Pending" )
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
                                    <h4 class="page-title">Employee Contract</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 
                        <div>
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                <h5 class="message"> {{ session()->get('success') }} </h5>
                                </div>
                            @endif
                        </div>
                        <div class="card">
                                    <div class="card-body">     
                                                        <!-- Toll free number box-->
                                <div class="card text-white bg-info overflow-hidden">
                                    
                                </div> <!-- end card-->
                                <!-- End Toll free number box-->

                                <!-- Messages-->
                              
                                <div id="content1">
                                Dear {{ $loggedUser->firstname }} {{ $loggedUser->surname }},</br></br>
                                <h4 class="header-title mt-0 mb-3 text-center">PRINCIPLE STATEMENT OF TERMS AND CONDITIONS</h4>
                                {!! html_entity_decode($content[0]->template) !!} 
                                1.The date of commencement of this contract is {{ $contract[0]->commencement_date }}.
                                <div>
                                {!! html_entity_decode($content[1]->template) !!} 
                                </div>
                               <b> Pay Rates & Other Charges</b></br>
                               <label>Main Post Rate</label></br>
                               @if($loggedUser->posts=="Nurse" || $loggedUser->posts=="Nurse" || $loggedUser->posts=="Care Assistant" || $loggedUser->posts=="Senior Care Assistant" || $loggedUser->posts=="Domiciliary Care")
                               <div> The pay rates confirmed for you will be a minimum of {{ $contract[0]->weekday_longday_type1 }} for weekday longday, {{ $contract[0]->weekday_night_type1 }} for weekday night, {{ $contract[0]->bank_holiday_type1 }} for bank holiday, {{ $contract[0]->weekend_longday_type1 }} for weekend longday {{ $contract[0]->weekend_night_type1 }} for weekend night. </div>
                               @elseif($loggedUser->posts=="Kitchen Assistant" || $loggedUser->posts=="Chef" || $loggedUser->posts=="Domestic Care")
                               <div> The pay rates confirmed for you will be a minimum of {{ $contract[0]->weekday_longday_type2 }} for weekday longday, {{ $contract[0]->bank_holiday_type2 }} for bank holiday, {{ $contract[0]->weekend_longday_type2 }} for weekend longday. </div>
                               @endif
                                </br>
                                @if($loggedUser->kitchen_assistant=="on")
                                <div class="row">
                                    <label>Sub Post Rate - Kitchen Assistant</label>
                                </div>
                                <div class="row">
                                <div> The pay rates confirmed for you will be a minimum of {{ $contract[0]->kitchen_weekday_longday }} for weekday longday, {{ $contract[0]->kitchen_weekday_night }} for weekday night, {{ $contract[0]->kitchen_bank_holiday }} for bank holiday, {{ $contract[0]->kitchen_weekend_longday }} for weekend longday {{ $contract[0]->kitchen_weekend_night }} for weekend night. </div>
                                </div></br>
                                @endif
                                @if($loggedUser->domestic_Care=="on")
                                <div class="row">
                                    <label>Sub Post Rate - Domestic Care</label>
                                </div>
                                <div class="row">
                                <div> The pay rates confirmed for you will be a minimum of {{ $contract[0]->domestic_weekday_longday }} for weekday longday, {{ $contract[0]->domestic_weekday_night }} for weekday night, {{ $contract[0]->domestic_bank_holiday }} for bank holiday, {{ $contract[0]->domestic_weekend_longday }} for weekend longday {{ $contract[0]->domestic_weekend_night }} for weekend night. </div>
                                </div></br>
                                @endif
                                @if($loggedUser->care_assistant=="on")
                                <div class="row">
                                    <label>Sub Post Rate - Care Assistant</label>
                                </div>
                                <div class="row">
                                <div> The pay rates confirmed for you will be a minimum of {{ $contract[0]->care_weekday_longday }} for weekday longday, {{ $contract[0]->care_weekday_night }} for weekday night, {{ $contract[0]->care_bank_holiday }} for bank holiday, {{ $contract[0]->care_weekend_longday }} for weekend longday {{ $contract[0]->care_weekend_night }} for weekend night. </div>
                                </div>
                                @endif
                                @if($loggedUser->living_Care=="on")
                                <div class="row">
                                    <label>Sub Post Rate - Living Care</label>
                                </div>
                                <div class="row">
                                <div> The pay rates confirmed for you will be a minimum of {{ $contract[0]->living_weekday_longday }} for weekday longday, {{ $contract[0]->living_weekday_night }} for weekday night, {{ $contract[0]->living_bank_holiday }} for bank holiday, {{ $contract[0]->living_weekend_longday }} for weekend longday {{ $contract[0]->living_weekend_night }} for weekend night. </div>
                                </div>
                                @endif
                                {!! html_entity_decode($content[2]->template) !!} 
                                <div class="row">
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-2 mb-0 d-grid text-center">
                                        <button class="btn btn-primary toggle-disabled" type="button" onclick="payRateSubmit()"> Next </button>
                                    </div>
                                </div>
                                </div>
                                <div id="content2">
                                <b> Probation Period</b></br>
                                {!! html_entity_decode($content[3]->template) !!} 
                                <b> Termination</b></br>
                                {!! html_entity_decode($content[4]->template) !!}                                 
                                </br>
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-2 mb-0 d-grid text-center">
                                        <button class="btn btn-primary toggle-disabled" type="button" onclick="trainingBack()"> Back </button>
                                    </div>
                                    <div class="col-md-2 mb-0 d-grid text-center">
                                        <button class="btn btn-primary toggle-disabled" type="button" onclick="trainingSubmit()"> Next </button>
                                    </div>
                                </div>
                                </div>
                                <div id="content3">
                                {!! html_entity_decode($content[5]->template) !!}  
                                {!! html_entity_decode($content[6]->template) !!}                                                                
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-2 mb-0 d-grid text-center">
                                        <button class="btn btn-primary toggle-disabled" type="button" onclick="endBack()"> Back </button>
                                    </div>
                                    <div class="col-md-2 mb-0 d-grid text-center">
                                        <button class="btn btn-primary toggle-disabled" type="button" onclick="endSubmit()"> Next </button>
                                    </div>
                                </div>
                                </div> 
                                <div id="content4">
                                <div class="card" id="commentHistory">
                                    <div class="card-body">
                                    <table  class="table table-striped dt-responsive nowrap w-100">
                                        <thead> 
                                            <tr>
                                            <th>#</th>
                                            <th>Comment</th>
                                            <th>Created By</th>
                                            <th>Created At</th>
                                            </tr> 
                                        </thead> 
                                        <tbody class="allData">
                                            @if(count($comments) == 0)
                                            <tr>
                                                <td align="center" colspan="10">No Data Found</td>
                                            </tr>
                                            @else

                                            @foreach ($comments as $comment)
                                            
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $comment->comment}}</td>
                                            <td>{{ $comment->created_by}}</td>
                                            <td>{{ $comment->created_at}}</td>
                                            </tr> 
                                            @endforeach
                                            @endif
                                        </tbody>      
                                     </table>
                                    </div>
                                </div> 
                                <div class="row">   
                                    <div class="col-md-4 mb-3">
                                        <label for="contract" class="form-label">Do you have any comments to add?</label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <select name="contract" id="contract" class="form-control select2 form-select required-dbs" required autocomplete=off>
                                            <option value="" disabled selected hidden>Choose One</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="declaration-section" class="declaration-section">
                                    <div class="row">
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-2 mb-0 d-grid text-center">
                                            <button class="btn btn-primary toggle-disabled" type="button" onclick="declarationSectionBack()"> Back </button>
                                        </div>
                                        <div class="col-md-2 mb-0 d-grid text-center">
                                            <button class="btn btn-primary toggle-disabled" type="button" onclick="declarationSectionSubmit()"> Next </button>
                                        </div>
                                    </div>
                                </div>
                                </div> 
                                <div id="declaration-details" class="declaration-details">
                                <h4 class="header-title mt-0 mb-3">Declaration</h4>
                                <hr> 
                                <input type="checkbox" name="agree_submit" id="agree_submit" autocomplete=off>
                                I accept this appointment on the terms and conditions stated above. </br></br>
                                <div class="row">  
                                <div class="col-md-3 mb-3">
                                    <label for="name">Name </label></br>
                                    <input class="" type="text" id="name" name="name" placeholder="Enter The Name"  onblur="createSign()"  autocomplete=off onkeypress="return (event.charCode > 64 && 
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32) || (event.charCode ==46)">
                                </div> 
                                <div class="col-md-1 mb-3">
                                    
                                    </div>
                                <div class="col-md-3 mb-3">
                                    <label for="signature">E-Signature </label></br>
                                    <input class="" type="text" id="signature" name="signature"  readonly autocomplete=off>
                                </div>
                                <div class="col-md-1 mb-3">
                                    
                                </div>
                                <div class="col-md-3 mb-3">
                                        <label for="date">Date </label></br>
                                        <input type="date" class="" id="date" name="date"  autocomplete=off>
                                </div>
                            </div><br/>


                            
                        <div class="row">
<!--                             <div class="col-md-6 mb-3" style="margin-left:-40px;">
-->                          <div class="col-md-6">    
                             </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                        <button class="btn btn-primary" type="button" onclick="declarationBack()"> Back </button>
                                    </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                <button class="btn btn-primary toggle-disabled" type="submit" id="contractSubmit" disabled> Submit</button>
                            </div>
                        </div>
                        </div>
                        <div id="comment-section" class="comment-section">
                        <div class="row">   
                        <div class="col-md-8">    
                            <textarea  class="form-control" id="contract_comment" name="contract_comment"  rows="3"  placeholder="Enter Your Comment"  ></textarea>
                        </div>
                        </div><br/><br/>
                        <div class="row">
<!--                             <div class="col-md-6 mb-3" style="margin-left:-40px;">
-->                          <div class="col-md-6">    
                             </div>
                             <input class="form-control" type="hidden" id="created_by" name="created_by" value="{{ $loggedUser->firstname }} {{ $loggedUser->surname }}">
                            <div class="col-md-2 mb-0 d-grid text-center">
                                        <button class="btn btn-primary" type="button" onclick="declarationBack()"> Back </button>
                                    </div>
                            <div class="col-md-2 mb-0 d-grid text-center">
                                <button class="btn btn-primary toggle-disabled" type="submit" id="commentSubmit"> Submit</button>
                            </div>
                        </div>
                        </div>
                    </div> <!-- container -->
                    <h4 id="mailSend" class="mailSend text-center">Please Wait, Submitting...</h3>

                </div> <!-- content -->
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

<style>
@import url(https://fonts.googleapis.com/css?family=Cedarville+Cursive);  

.signature{
  font-family:"Cedarville Cursive";
}
</style>

<script>
    $( document ).ready(function() {
    $("#content1").show();
    $("#content2").hide();
    $("#content3").hide();
    $("#content4").hide();
    $("#declaration-details").hide();
    $("#comment-section").hide();
    $("#declaration-section").hide();
    $("#mailSend").hide();   
 });
 $('#contract').on('change', function () {
        if (this.value === 'yes'){
        $("#comment-section").show();
        $("#declaration-details").hide();
        $("#declaration-section").hide();
    } else {
        $("#declaration-section").show();
        $("#agree_submit").attr("class","required-input date");
        $("#name").attr("class","form-control required-input");
        $("#signature").attr("class","form-control signature");
        $("#date").attr("class","form-control required-input date");
        $("#comment-section").hide();
    }
});
var nameField = document.getElementById("name");
var sign = document.getElementById("signature");
 function createSign(){
    sign.value = nameField.value;
}
function payRateSubmit(){
    $("#content2").show();
    $("#content1").hide();
    $("#content3").hide();
    $("#content4").hide();
}
function trainingSubmit(){
    $("#content3").show();
    $("#content1").hide();
    $("#content2").hide();
    $("#content4").hide();
}
function trainingBack(){
    $("#content1").show();
    $("#content2").hide();
    $("#content3").hide();
    $("#content4").hide();
}
function endBack(){
    $("#content2").show();
    $("#content1").hide();
    $("#content3").hide();
    $("#content4").hide();
}
function endSubmit(){
    $("#content4").show();
    $("#content1").hide();
    $("#content2").hide();
    $("#content3").hide();
    $("#declaration-details").hide();
}
function declarationSectionBack(){
    $("#content3").show();
    $("#content1").hide();
    $("#content2").hide();
    $("#content4").hide();
    $("#declaration-section").hide();
    $("#declaration-details").hide();
}
function declarationSectionSubmit(){
    $("#declaration-details").show();
    $("#content1").hide();
    $("#content2").hide();
    $("#content3").hide();
    $("#content4").hide();
}
function declarationBack(){
    $("#content3").show();
    $("#content1").hide();
    $("#content2").hide();
    $("#content4").hide();
    $("#declaration-section").hide();
    $("#declaration-details").hide();
    $("#comment-section").hide();
}
$('#commentSubmit').click(function(){
    $("#mailSend").show();
    $("#mailSend").css('color','#727cf5');
    var comment_section = "ContractUser";
    var comment=$("#contract_comment").val();
    if(comment==""){
        comment="Nil";
    }
    var created_by=$("#created_by").val();
    jQuery.ajax({
  
  url: "{{ route('comment.contractUser') }}",
  method: 'get',
  data: {
    comment: comment,
    comment_section: comment_section,
    created_by: created_by
 }, 
  success: function(result){
     console.log(result);
    // successFunction();
    window.location.href = "{{ route('after.commentContract') }}"
  }});
});
$('#contractSubmit').click(function(){
    $("#mailSend").show();
    $("#mailSend").css('color','#727cf5');
    var name=$("#name").val();
    var signature=$("#signature").val();
    var date=$("#date").val();
    jQuery.ajax({
  
  url: "{{ route('submit.contractUser') }}",
  method: 'get',
  data: {
    name: name,
    signature: signature,
    date: date
 }, 
  success: function(result){
     console.log(result);
    // successFunction();
    window.location.href = "{{ route('after.submitContract') }}"
  }});
});
$(document).on('change keyup', '.required-input', function(e){
        let Disabled = true;
        $(".required-input").each(function() {
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
</script>