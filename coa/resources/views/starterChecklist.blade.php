<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Starter Checklist</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
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
                                    
                                    <h4 class="page-title">Starter Checklist</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 
                       
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- training-Information -->
                                <div class="card" id="have_p45Doc">
                                    <div class="card-body">
                                    <input class="form-control  mb-3" type="hidden" id="loggedId" name="loggedId"  value="{{ $employee->id }}" autocomplete=off> 
                                    <form method="POST" action="{{ route('save.starter') }}" class="starter-form" id="starter-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="mnc" class="form-label">Do you have P45? </label>
                                            <select name="have_p45" id="have_p45" class="form-control select2 form-select" autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="yes">Yes</option>
                                                <option value="generated">No</option>
                                            </select> 
                                        </div>
                                        <div class="col-md-1 mb-3">
                                        </div>
                                        <div class="col-md-3 mb-3" id="upload">
                                            <label for="p45_file" class="form-label">Choose P45</label>
                                            <input class="form-control" type="file" id="p45_file" name="p45_file" onchange="p45Upload()">
                                        </div>    
                                                                
                                    </div>
                                    
                                    <div class="row" id="uploadButton">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-2 mb-0 d-grid text-center">
                                            <button class="btn btn-primary" id="submit" type="submit" disabled>Submit </button>
                                        </div> 
                                    </div>
                                </form>  
                                    </div>
                                </div>

                                <div class="card" id="instruction-details">
                                    <div class="card-body">
                                    <form method="POST" action="{{ route('save.starterForm') }}" class="starterChecklist-form" id="starterChecklist-form">
                                    @csrf
                                        <div class="row">
                                            <h2 class="header-title mt-0 mb-3 info-align">Instructions for employers</h2>
                                                <div>This Starter Checklist can be used to gather information about your new employee. You can use this information
                                                    to help fill in your first Full Payment Submission (FPS) for this employee. You need to keep the information
                                                    recorded on the Starter Checklist record for the current and previous 3 tax years. Do not send this form to
                                                    HM Revenue and Customs (HMRC).
                                                </div>  
                                            </div> </br>
                                            <div class="row">
                                            <h2 class="header-title mt-0 mb-3 info-align">Instructions for employees</h2>
                                                <div>As a new employee your employer needs the information on this form before your first payday to tell HMRC about you
                                                    and help them use the correct tax code. Fill in this form then give it to your employer. Do not send this form to HMRC.
                                                    It’s important that you choose the correct statement. If you do not choose the correct statement you may pay too much
                                                    or too little tax. For help filling in this form watch our short youtube video, go to <a href="https://www.youtube.com/hmrcgovuk" target="_blank"><b style="color:red;">Click here</b></a>
                                                </div>
                                            </div> </br>
                                            <div class="row">
                                                <div class="col-md-8">
                                                
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary toggle-disabled" type="button" onclick="starterInstructionSubmit()"> Next </button>
                                                </div>
                                            </div>
                                            </div>
                                            </div>

                                            <div class="card" id="personl-details">
                                            <div class="card-body">
                                            <h2 class="header-title mt-0 mb-3 info-align">Employee's Personal Details</h2></br>
                                            <hr>
                                            <div class="row">   
                                                <div class="col-md-4 mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <select name="title" id="title" class="form-control select2 required-personal form-select" disabled required>
                                                        <option value="{{ $employee->title }}" disabled selected hidden>{{ $employee->title }}</option>                                                             
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
                                                    <label for="postTown" class="form-label">Post Town</label>
                                                    <input class="form-control" type="text" id="postTown" name="postTown" placeholder="Enter Your Post Town" value="{{ $employee->postTown }}" disabled>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="password" class="form-label">Postcode</label>
                                                    <input class="form-control" type="text" id="postCode" name="postCode" placeholder="Enter Your Postcode" value="{{ $employee->postcode }}" disabled>
                                                </div>
                                                @if($application)
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Date Of Birth</label>
                                                    <input type="date" class="form-control date required-personal" id="birthday" name="birthday" value="{{ $application->date_of_birth }}"  disabled autocomplete=off>
                                                </div>
                                                @else
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Date Of Birth</label>
                                                    <input type="text" class="form-control date required-personal" id="birthday" name="birthday"  value="Not Available" disabled autocomplete=off>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="row">   
                                            @if($application)
                                                <div class="col-md-4 mb-3">
                                                    <label for="gender" class="form-label">Gender</label>
                                                    <input class="form-control" type="text" id="gender" name="gender" value="{{ $application->gender }}"  disabled>
                                                </div>
                                             @else
                                                <div class="col-md-4 mb-3">
                                                    <label for="gender" class="form-label">Gender</label>
                                                    <input class="form-control" type="text" id="gender" name="gender" value="Not Available"  disabled>
                                                </div>
                                            @endif
                                                <div class="col-md-4 mb-3">
                                                    <label for="insurance" class="form-label">National Insurance Number</label>
                                                    <input class="form-control required-personal" type="text" id="insurance" name="insurance" placeholder="Enter Your Insurance Number" onkeypress="return insuranceNumCheck(event)">
                                                    <span id="less-characters" class="hide-text" style="color:red;">
                                                    Should enter 9 characters
                                                    </span>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Employment Start Date</label>
                                                    <input type="date" class="form-control date required-personal" id="start_date" name="start_date" autocomplete=off>
                                                </div>
                                            </div>
                                             </br>
                                            <div class="row">
                                                <div class="col-md-8">
                                                
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary toggle-disabled" type="button" onclick="starterPersonalSubmit()" disabled> Next </button>
                                                </div>
                                            </div>
                                         </div>
                                    </div>

                                    <div class="card" id="statement-details">
                                            <div class="card-body">
                                            <h2 class="header-title mt-0 mb-3 info-align">Employee Statement</h2></br>
                                            <hr>
                                            <p>Choose the statement that applies to you, either A, B or C, and tick the appropriate box.</p>
                                    <table class="table table-bordered table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Statement A</th>
                                                <th>Statement B</th>
                                                <th>Statement C</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <p>Do not choose this statement if you’re in receipt of a State, Works or Private Pension.</p>
                                                <p>Choose this statement if the following applies.</p>
                                                <p>This is my first job since 6 April and since the 6 April I’ve not received payments from any of the following:</p>
                                                <div class="col-md-12">
                                                <ul>
                                                    <li>Jobseeker’s Allowance</li>
                                                    <li>Employment and Support Allowance</li>
                                                    <li>Incapacity Benefit</li>
                                                </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <p>Do not choose this statement if you’re in receipt of a State, Works or Private Pension</p>
                                                <p>Choose this statement if the following applies.</p>
                                                <p>Since 6 April I have had another job but I do not have a P45. And/or since the 6 April I have receive payments from any of the following:</p>
                                                <div class="col-md-12">
                                                <ul>
                                                    <li>Jobseeker’s Allowance</li>
                                                    <li>Employment and Support Allowance</li>
                                                    <li>Incapacity Benefit</li>
                                                </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <p>Choose this statement if:</p>
                                                <div class="col-md-12">
                                                <ul>
                                                    <li>you have another job and/or</li>
                                                    <li>you’re in receipt of a State, Works or Private Pension</li>
                                                </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="form-check-label" for="agree"><b>Statement A applies to me</b></label>
                                                <input type="checkbox" class="required-statementA" id="statementA" name="statementA" value="a" autocomplete=off>
                                            </td>
                                            <td>
                                                <label class="form-check-label" for="agree"><b>Statement B applies to me</b></label>
                                                <input type="checkbox" class="required-statementB" id="statementB" name="statementB" value="b" autocomplete=off>
                                            </td>
                                            <td>
                                                <label class="form-check-label" for="agree"><b>Statement C applies to me</b></label>
                                                <input type="checkbox" class="required-statementC" id="statementC" name="statementC" value="c" autocomplete=off>
                                            </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    </br>
                                            <div class="row">
                                                <div class="col-md-8">
                                                
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary toggle-disabled" type="button" id="statementSubmit" onclick="starterStatementSubmit()" disabled> Next </button>
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                    <div class="card" id="loan-details">
                                     <div class="card-body">
                                        <div class="row">
                                        <div class="col-md-6">
                                            <h2 class="header-title mt-0 mb-3 info-align">Student Loan</h2></br>
                                            <hr>
                                            <b>For more guidance about repaying, go to</b>
                                               <a href="https://www.gov.uk/repaying-your-student-loan" target="_blank"><b style="color:red;">Click here</b></a>
                                        </div>
                                        </div></br>
                                        <div class="row">   
                                            <div class="col-md-7 mb-3 ">
                                                <label for="loan" class="form-label">1) Do you have one of the Student Loan Plans described below which is not fully repaid?</label>
                                            </div>  
                                            <div class="col-md-2 mb-3">
                                                <select name="loan" id="loan" class="form-control select2 form-select" required autocomplete=off>
                                                    <option value="" disabled selected hidden>Choose One</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="row" id="completedQuestion">   
                                            <div class="col-md-7 mb-3 ">
                                                <label for="loan" class="form-label">2) Did you complete or leave your studies before 6th April?</label>
                                            </div>   
                                            <div class="col-md-2 mb-3">
                                                <select name="completed" id="completed" class="form-control select2 form-select" autocomplete=off>
                                                    <option value="" disabled selected hidden>Choose One</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="row" id="debitQuestion">   
                                            <div class="col-md-7 mb-3 ">
                                                <label for="debit" class="form-label">3) Are you repaying your Student Loan directly to the Student Loans Company by direct debit?</label>
                                            </div>  
                                            <div class="col-md-2 mb-3">
                                                <select name="debit" id="debit" class="form-control select2 form-select" autocomplete=off>
                                                    <option value="" disabled selected hidden>Choose One</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="row" id="planQuestion">   
                                            <div class="col-md-7 mb-3 ">
                                                <label for="loan_plan" class="form-label">4) What type of Student Loan do you have?</label>
                                            </div>   
                                            <div class="col-md-2 mb-3">
                                                <select name="loan_plan" id="loan_plan" class="form-control select2 form-select" autocomplete=off>
                                                    <option value="" disabled selected hidden>Choose One</option>
                                                    <option value="Plan 1">Plan 1</option>
                                                    <option value="Plan 2">Plan 2</option>
                                                    <option value="Both">Both</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <b><p> Student Loan Plans</p></b>
                                            <div class="row">
                                                <div class="col-md-12">
                                                You’ll have a Plan 1 Student Loan if:
                                                    <ul>
                                                        <li>you lived in Scotland or Northern Ireland when you started your course (undergraduate or postgraduate)</li>
                                                        <li>you lived in England or Wales and started your undergraduate course before 1 September 2012</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                You’ll have a Plan 2 Student Loan if:
                                                    <ul>
                                                        <li> you lived in England or Wales and started your undergraduate course on or after 1 September 2012</li>
                                                        <li>your loan is a Part Time Maintenance Loan</li>
                                                        <li>your loan is an Advanced Learner Loan</li>
                                                        <li>your loan is a Postgraduate Healthcare Loan</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <div class="row" id="postgraduateLoan">
                                        <div class="col-md-6">
                                            <h2 class="header-title mt-0 mb-3 info-align">Postgraduate Loan</h2></br>
                                            <hr>
                                            <b>For more guidance about funding and repaying, go to</b>
                                            <a href="https://www.gov.uk/funding-for-postgraduate-study" target="_blank"><b style="color:red;">Click here</b></a></br>
                                            <b>For more guidance for employers, go to</b>
                                            <a href="https://www.gov.uk/guidance/special-rules-for-student-loans" target="_blank"><b style="color:red;">Click here</b></a>
                                        </div>
                                        </div></br>
                                        <div class="row" id="pgLoanQuestion">   
                                            <div class="col-md-7 mb-3 ">
                                                <label for="pg_loan" class="form-label">1) Do you have a Postgraduate Loan which is not fully repaid?</label>
                                            </div>   
                                            <div class="col-md-2 mb-3">
                                                <select name="pg_loan" id="pg_loan" class="form-control select2 form-select" required autocomplete=off>
                                                    <option value="" disabled selected hidden>Choose One</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="row" id="loanNote">
                                        <p> You’ll have a Postgraduate Loan if:</p>
                                            <div class="col-md-12">
                                                <ul>
                                                    <li>you lived in England and started your Postgraduate Master’s course on or after 1 August 2016</li>
                                                    <li>you lived in Wales and started your Postgraduate Master’s course on or after 1 August 2017</li>
                                                    <li>you lived in England or Wales and started your Postgraduate Doctoral course on or after 1 August 2018</li>
                                                </ul>
                                            </div>
                                        </div> 
                                        <div class="row" id="pgCompleteQuestion">   
                                            <div class="col-md-7 mb-3 ">
                                                <label for="pg_complete" class="form-label">2) Did you complete or leave your Postgraduate studies before 6th April?</label>
                                            </div>   
                                            <div class="col-md-2 mb-3">
                                                <select name="pg_complete" id="pg_complete" class="form-control select2 form-select" autocomplete=off>
                                                    <option value="" disabled selected hidden>Choose One</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="row" id="pgDebitQuestion">   
                                            <div class="col-md-7 mb-3 ">
                                                <label for="pg_debit" class="form-label">3) Are you repaying your Postgraduate Loan direct to the Student Loans Company by direct debit?</label>
                                            </div>   
                                            <div class="col-md-2 mb-3">
                                                <select name="pg_debit" id="pg_debit" class="form-control select2 form-select" autocomplete=off>
                                                    <option value="" disabled selected hidden>Choose One</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="row" id="loanSubmit">
                                                <div class="col-md-8">
                                                
                                                </div>
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary toggle-disabled" type="button" id="loanSubmit" onclick="starterLoanSubmit()"> Next </button>
                                                </div>
                                            </div>
                                                </div>
                                            </div>
                                        <div class="card" id="declaration-details" class="declaration-details">
                                        <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Declaration</h4>
                                        <hr>
                                            <div>
                                            <input type="checkbox" class="required-declaration" name="agree_submit" id="agree_submit" required autocomplete=off>
                                            <b>I confirm that the information given within this form is true and accurate. I hereby give consent for this information being used for personnel administration and business purposes.</b>
                                            </div><br>
                                            <div class="row">  
                                                <div class="col-md-3 mb-3">
                                                    <label for="name">Name </label></br>
                                                    <input class="form-control required-declaration" type="text" id="full_name" name="full_name" placeholder="Enter The Name"  onblur="createSign()" required autocomplete=off onkeypress="return (event.charCode > 64 && 
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
                                                </form>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                <!-- training-Information -->


                                <!-- Messages-->
                              

                             <!-- end col-->



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
@import url(https://fonts.googleapis.com/css?family=Cedarville+Cursive);  
.hide-text{
  display: none;
}
.signature{
  font-family:"Cedarville Cursive";
}
</style>

<script>

    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

 $( document ).ready(function() {
    $("#upload").hide();
    $("#uploadButton").hide();
    $("#instruction-details").hide();
    $("#personl-details").hide();
    $("#statement-details").hide();
    $("#loan-details").hide();
    $("#declaration-details").hide();
    $("#completedQuestion").hide();
    $("#debitQuestion").hide();
    $("#planQuestion").hide();
    $("#postgraduateLoan").hide();
    $("#pgLoanQuestion").hide();
    $("#pgCompleteQuestion").hide();
    $("#pgDebitQuestion").hide();
    $("#loanSubmit").hide();
    $("#loanNote").hide();
 });
 var nameField = document.getElementById("full_name");
var sign = document.getElementById("signature");
 function createSign(){
    sign.value = nameField.value;
}
 function starterInstructionSubmit(){
    $("#personl-details").show();
    $("#instruction-details").hide();
    $("#have_p45Doc").hide();
    }
function starterPersonalSubmit(){
    $("#statement-details").show();
    $('#statementSubmit').prop("disabled", true);
    $("#personl-details").hide();
    $("#have_p45Doc").hide();
    }
    function starterStatementSubmit(){
    $("#loan-details").show();
    $("#statement-details").hide();
    $("#have_p45Doc").hide();
    }
    function starterLoanSubmit(){
    $("#declaration-details").show();
    $("#loan-details").hide();
    $("#statement-details").hide();
    $("#have_p45Doc").hide();
    }
    
    $('#loan').on('change', function () {
        if (this.value === 'Yes'){
            $("#completedQuestion").show();
            $("#postgraduateLoan").show();
            $("#pgLoanQuestion").show();
        } else {
            $("#completedQuestion").hide();
            $("#debitQuestion").hide();
            $("#planQuestion").hide();
            $("#postgraduateLoan").show();
            $("#pgLoanQuestion").show();
            $('#completed').val("");
            $('#debit').val("");
            $('#loan_plan').val("");
        }
     });
     $('#completed').on('change', function () {
        if (this.value === 'Yes'){
            $("#debitQuestion").show();
            $("#postgraduateLoan").show();
            $("#pgLoanQuestion").show();
        } else {
            $("#debitQuestion").hide();
            $("#postgraduateLoan").show();
            $("#pgLoanQuestion").show();
            $('#debit').val("");
            $('#loan_plan').val("");
            $("#planQuestion").hide();
        }
     });
     $('#debit').on('change', function () {
        if (this.value === 'Yes'){
            $("#planQuestion").show();
            $("#postgraduateLoan").show();
            $("#pgLoanQuestion").show();
        } else {
            $("#planQuestion").hide();
            $("#postgraduateLoan").show();
            $("#pgLoanQuestion").show();
            $('#loan_plan').val("");
        }
     });
     $('#loan_plan').on('change', function () {
        if (this.value){
            $("#postgraduateLoan").show();
            $("#pgLoanQuestion").show();
        }
     });
     $('#pg_loan').on('change', function () {
        if (this.value === 'Yes'){  
            $("#loanNote").show();
            $("#pgCompleteQuestion").show();
            $("#loanSubmit").hide();
            $('#pg_complete').val("");
        } else {
            $("#loanSubmit").show();
            $("#loanNote").hide();
            $("#pgCompleteQuestion").hide();
            $("#pgDebitQuestion").hide();
        }
     });
     $('#pg_complete').on('change', function () {
        if (this.value === 'Yes'){  
            $("#pgDebitQuestion").show();
            $("#loanSubmit").hide();
            $('#pg_debit').val("");
        } else {
            $("#loanSubmit").show();
            $("#pgDebitQuestion").hide();
        }
     });
     $('#pg_debit').on('change', function () {
        if (this.value === 'Yes'){  
            $("#loanSubmit").show();
        } else {
            $("#loanSubmit").show();
        }
     });
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

            $(document).on('change keyup', '.required-statementA', function(e){
            let Disabled = true;
                $(".required-statementA").each(function() {
                let value = this.value
                statementA = document.getElementById('statementA');
                statementB = document.getElementById('statementB');
                statementC = document.getElementById('statementC');

                if ((value)&&(value.trim() !='')&&(statementA.checked)||(statementB.checked)||(statementC.checked))
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
            $(document).on('change keyup', '.required-statementB', function(e){
            let Disabled = true;
                $(".required-statementB").each(function() {
                let value = this.value
                statementA = document.getElementById('statementA');
                statementB = document.getElementById('statementB');
                statementC = document.getElementById('statementC');
                if ((value)&&(value.trim() !='')&&(statementB.checked)||(statementA.checked)||(statementC.checked))
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
            $(document).on('change keyup', '.required-statementC', function(e){
            let Disabled = true;
                $(".required-statementC").each(function() {
                let value = this.value
                statementA = document.getElementById('statementA');
                statementB = document.getElementById('statementB');
                statementC = document.getElementById('statementC');
                if ((value)&&(value.trim() !='')&&(statementC.checked)||(statementA.checked)||(statementB.checked))
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
          

 $('#have_p45').on('change', function () {

if (this.value === 'yes'){
    $("#upload").show();
    $("#uploadButton").show();
    $("#instruction-details").hide();
} else {
    $("#instruction-details").show();
    $("#upload").hide();
    $("#uploadButton").hide();
}
});
function p45Upload(){
        var employeeId= $("#loggedId").val()
         // Get the selected file
   var files = $('#p45_file')[0].files;
   console.log(files);
   var expiry_date="1900-01-01";
   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','P45');
      fd.append('file_type_additional','P45');
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
          $("#submit").prop("disabled", false);
        },
        error: function(response){
           console.log("error : " + JSON.stringify(response) );
        }
      });
   }else{
      alert("Please select a file.");
   }
    }
    function generatedp45Upload(){
        var employeeId= $("#loggedId").val()
         // Get the selected file
   var files = $('#p45_file_generated')[0].files;
   console.log(files);
   var expiry_date="1900-01-01";
   if(files.length > 0){
      var fd = new FormData();

      // Append data 
      fd.append('file',files[0]);
      fd.append('_token',CSRF_TOKEN);
      fd.append('file_type','P45');
      fd.append('file_type_additional','Generated P45');
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
          $("#submit").show();
        },
        error: function(response){
           console.log("error : " + JSON.stringify(response) );
        }
      });
   }else{
      alert("Please select a file.");
   }
    }

    function insuranceNumCheck(evt) {
          
          // Only ASCII character in that range allowed
       
              
              var text = $('#insurance').val();

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
       $('#insurance').keydown(function(e){
        var text = $('#insurance').val();
        if(text.length<=9){
        $("#less-characters").removeClass("hide-text");
        }
    })
</script>