<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Induction Checklist</title>
<!--         <meta name="viewport" content="width=device-width, initial-scale=1.0">
 -->    <meta name="csrf-token" content="{{ csrf_token() }}">   
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/images-theme/favicon.ico">

        <!-- App css -->
        <link href="../css/css-theme/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/css-theme/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
        <!-- Begin page -->
        <div class="wrapper">
        @include('adminNavigation')
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
                                        <img src="../images/user.png" alt="user-image" class="rounded-circle">
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
                                    
                                    <h4 class="page-title">Induction Checklist</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 


                        


                        <div class="row">
                            <div class="col-xl-12">
                                <!-- training-Information -->
                                 <!-- Personal-Information -->
                                 <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">User Information</h4>
                                        <p class="text-muted font-13">
                                        </p>

                                        <hr>

                                    <div class="text-start">
                                        <div class="row">
                                            <div class="col-md-4">
                                                 <p class="text-muted"><strong>Surname :</strong> <span class="ms-2">{{ $user->surname }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                 <p class="text-muted"><strong>First Name :</strong> <span class="ms-2">{{ $user->firstname }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Post Applied For :</strong><span class="ms-2">{{ $user->posts }}</span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Address-1 :</strong> <span class="ms-2">{{ $user->address1 }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Address-2 :</strong> <span class="ms-2">{{ $user->address2 }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Address-3 :</strong>
                                                <span class="ms-2"> {{ $user->address3 }} </span>
                                            </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="text-muted"><strong>Post Town:</strong> <span class="ms-2">{{ $user->postTown }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Postcode :</strong>
                                                <span class="ms-2"> {{ $user->postcode }} </span>
                                            </p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>User Name :</strong><span class="ms-2">{{ $user->login_id }}</span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Mobile No. :</strong> <span class="ms-2">{{ $user->contact_no }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Whatsapp No. :</strong><span class="ms-2">{{ $user->uk_contact_no }}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>Email :</strong> <span class="ms-2">{{ $user->email }}</span></p>
                                            <input class="form-control" type="hidden" id="userEmail" name="userEmail" value= "{{ $user->email }}" required>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-md-4">
                                            <p class="text-muted"><strong>T&C Status :</strong> 
                                                @if( $user->policy_agree =="yes")
                                                <span class="ms-2">
                                                    Agreed
                                                </span>
                                                @else
                                                <span class="ms-2">
                                                    Pending
                                                </span>
                                                @endif
                                            </p>
                                            </div>
                                         </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Personal-Information -->

                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Induction Checklist</h4>
                                        <p class="text-muted font-13">
                                        </p>

                                        <hr>
                                    </br>
                                        <table class="table table-striped dt-responsive nowrap w-100">
                                              <thead>        
                                                <tr>
                                                    <th>#</th>
                                                    <th>Question</th>
                                                    <th>Answer</th>
                                                 </tr>  
                                                </thead>             
                                                 <tbody class="allData">
                                                <tr>
                                                    <td>1</td>
                                                    <td>History and Culture of Organisation </td>
                                                    <td>{{ $checklistEmployee[0]->history }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>2</td>
                                                    <td>Philosophy and Principles of Care</td>
                                                    <td>{{ $checklistEmployee[0]->philosophy }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>3</td>
                                                    <td>Introduction to Main Personalities </td>
                                                    <td>{{ $checklistEmployee[0]->personality }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>4</td>
                                                    <td>Organisation Structure</td>
                                                    <td>{{ $checklistEmployee[0]->organisation }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>5</td>
                                                    <td>Staff Handbook and Employment Agreement</td>
                                                    <td>{{ $checklistEmployee[0]->handbook }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>6</td>
                                                    <td>Emergency and other telephone contacts (official administrators, essential services)</td>
                                                    <td>{{ $checklistEmployee[0]->contacts }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>7</td>
                                                    <td>Policy on Gifts, Wills and Bequests</td>
                                                    <td>{{ $checklistEmployee[0]->policy }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>8</td>
                                                    <td>Equal Opportunities Policy</td>
                                                    <td>{{ $checklistEmployee[0]->opportunity }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>9</td>
                                                    <td>Introduction to Workplace </td>
                                                    <td>{{ $checklistEmployee[0]->workplace }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>10</td>
                                                    <td>Statement of Main Terms and Conditions</td>
                                                    <td>{{ $checklistEmployee[0]->statement }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>11</td>
                                                    <td>Salary and Payment Mode </td>
                                                    <td>{{ $checklistEmployee[0]->salary }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>12</td>
                                                    <td>Absenteeism/ sickness</td>
                                                    <td>{{ $checklistEmployee[0]->sick }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>13</td>
                                                    <td>Duty Rotas</td>
                                                    <td>{{ $checklistEmployee[0]->duty }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>14</td>
                                                    <td>Uniform Policy</td>
                                                    <td>{{ $checklistEmployee[0]->uniform }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>15</td>
                                                    <td>Staff Availability Policy</td>
                                                    <td>{{ $checklistEmployee[0]->availability }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>16</td>
                                                    <td>Time Sheet Policy</td>
                                                    <td>{{ $checklistEmployee[0]->time }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>17</td>
                                                    <td>Transportation Policy </td>
                                                    <td>{{ $checklistEmployee[0]->transportation }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>18</td>
                                                    <td>Mobile Phone Policy</td>
                                                    <td>{{ $checklistEmployee[0]->mobile }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>19</td>
                                                    <td>General Data Protection Policy</td>
                                                    <td>{{ $checklistEmployee[0]->protection }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>20</td>
                                                    <td>Disciplinary, Grievance and Complaints Procedure</td>
                                                    <td>{{ $checklistEmployee[0]->complaints }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>21</td>
                                                    <td>Mandatory Trainings</td>
                                                    <td>{{ $checklistEmployee[0]->trainings }}</td>
                                                </tr> 
                                                <tr>
                                                    <td>22</td>
                                                    <td>Personal Hygiene</td>
                                                    <td>{{ $checklistEmployee[0]->hygiene }}</td>
                                                </tr> 

                                               
                                                </tbody>
                                                <tbody id="content" class="searchData"></tbody>

                                                </table>
                                    </div>
                                </div>
                    
                        <div class="card">
                                    <div class="card-body">
                                    </br>
                                            <div class="row">   
                                                <div class="col-md-12 mb-3">
                                                <p class="text-muted"><strong>Current status of the user :</strong><span class="ms-2">{{ $checklistEmployee[0]->induction_checklist }}</span></p>
                                                <input class="form-control" type="hidden" id="created_by" name="created_by" value="{{ $loggedUser->firstname }} {{ $loggedUser->surname }}">
                                                </div>
                                            </div>
                                            <div id="comment_history"><h4 class="header-title mt-0 mb-3">Comment History</h4></div>
                                                    <p class="text-muted font-13">
                                                    </p>

                                            <div class="text-start">
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
                                      <!--      <div class="col-md-8">
                                                    <textarea  class="form-control required-personal" id="checklist_comment" name="checklist_comment"  rows="3"  placeholder="Enter Your Comment"  ></textarea>
                                            </div> </br>
                                            <div class="row">   
                                                <div class="col-md-3 mb-3">
                                                    <label for="status" class="form-label">Change the status of the user </label>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <select name="changeStatus" id="changeStatus" class="form-control select2 form-select" required>
                                                        <option value="" disabled selected hidden>Choose One</option>
                                                        <option value="Reviewed">Under Review</option>
                                                       <option value="Approved">Approve</option>
                                                    </select>
                                                </div>
                                             </div>
                                              --> 
                                             <div class="row">
                                                <div class="col-md-5 mb-3" style="width: 38%">
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary" type="submit" id="reviewButton"> </button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 mb-3" style="width: 38%">
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary" type="submit" id="approveButton"> </button>
                                                </div>
                                            </div>
                                            <h4 id="mailSend" class="mailSend text-center">Please Wait, Email Sending...</h3>

                                        </div>
                                    </div>
                        <!-- end row -->
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Declaration</h4>
                                            <p class="text-muted font-13">
                                            </p>
                                            <hr>

                                            <div class="text-start">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p class="text-muted"><strong>Name :</strong> <span class="ms-2">{{ $employee->name }}</span></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p class="text-muted"><strong>Signature :</strong><span class="ms-2 signature">{{ $employee->signature }}</span></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p class="text-muted"><strong>Date :</strong> <span class="ms-2">{{ $employee->date }}</span></p>
                                                    </div>
                                                </div>
                                                </div><br/>
                                            </div>
                                        </div>
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
        <script src="../js/js-theme/vendor.min.js"></script>
        <script src="../js/js-theme/app.min.js"></script>

        <!-- third party js -->
        <script src="../js/js-theme/vendor/chart.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="../js/js-theme/pages/demo.profile.js"></script>
        <!-- end demo js-->
    </body>

</html>
<style>
     @import url(https://fonts.googleapis.com/css?family=Cedarville+Cursive);  
    .signature{
    font-family:"Cedarville Cursive";
    }
</style>
<script>
     $( document ).ready(function() {
        $("#reviewButton").hide();
        $("#approveButton").hide(); 
        $("#mailSend").hide();   
    });
    $('#changeStatus').on('change', function () {
    // if (this.value == '1'); { No semicolon and I used === instead of ==

    if (this.value === 'Reviewed'){
        $("#approveButton").hide();
        $("#reviewButton").show();
        $("#reviewButton").text("Review");
    } else {
        $("#approveButton").show();
        $("#approveButton").text("Approve");
        $("#approveButton").css('background-color','#727cf5');
        $("#reviewButton").hide();

    }
});
$('#approveButton').click(function(){
    $("#approveButton").hide();
    $("#mailSend").show();
    $("#mailSend").css('color','#727cf5');
    var email=$("#userEmail").val();
    var comment_section = "InductionChecklist";
    var comment=$("#checklist_comment").val();
    if(comment==""){
        comment="Nil";
    }
    var created_by=$("#created_by").val();
    jQuery.ajax({
  
  url: "{{ route('approve.checklist') }}",
  method: 'get',
  data: {
    email :  email,
    comment: comment,
    comment_section: comment_section,
    created_by: created_by
 }, 
  success: function(result){
     console.log(result);
    // successFunction();
    window.location.href = "{{ route('checklist.list') }}"

  }});
});
function successFunction(result){
    $("#approveButton").css('background-color','green');
    $("#approveButton").text("Approved");

}
/* $('#reviewButton').click(function(){
    $("#reviewButton").hide();
    $("#mailSend").show();
    $("#mailSend").css('color','#727cf5');
    var email=$("#userEmail").val();
    var comment_section = "InductionChecklist";
    var comment=$("#checklist_comment").val();
    if(comment==""){
        comment="Nil";
    }
    var created_by=$("#created_by").val();
    jQuery.ajax({
  
  url: "{{ route('review.health') }}",
  method: 'get',
    data: {
    email :  email,
    comment: comment,
    comment_section: comment_section,
    created_by: created_by
 },  
  success: function(result){
     console.log(result);
    window.location.href = "{{ route('health.list') }}"

  }});
});
 */
</script>