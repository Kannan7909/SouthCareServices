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
                                    
                        <h4 class="page-title">Induction Checklist</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 


                        


                        <div class="row">
                            <div class="col-xl-12">
                                <!-- training-Information -->
                                <div class="card">
                                    <div class="card-body">
                                    <form method="POST" action="{{ route('save.induction') }}" class="health-form" id="health-form">
                                    @csrf
                    
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="history" class="form-label">1. History and Culture of Organisation</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="history" id="history" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="philosophy" class="form-label">2. Philosophy and Principles of Care</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="philosophy" id="philosophy" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="personality" class="form-label">3. Introduction to Main Personalities</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="personality" id="personality" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="organisation" class="form-label">4. Organisation Structure</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="organisation" id="organisation" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-4 mb-3">
                                            <label for="handbook" class="form-label">5. Staff Handbook and Employment Agreement</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="handbook" id="handbook" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-6 mb-3">
                                            <label for="contacts" class="form-label">6. Emergency and other telephone contacts (official administrators, essential services)</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="contacts" id="contacts" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="policy" class="form-label">7. Policy on Gifts, Wills and Bequests</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="policy" id="policy" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="opportunity" class="form-label">8. Equal Opportunities Policy</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="opportunity" id="opportunity" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="workplace" class="form-label">9. Introduction to Workplace</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="workplace" id="workplace" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-4 mb-3">
                                            <label for="statement" class="form-label">10. Statement of Main Terms and Conditions</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="statement" id="statement" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="salary" class="form-label">11. Salary and Payment Mode</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="salary" id="salary" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="sick" class="form-label">12. Absenteeism/ sickness</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="sick" id="sick" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="duty" class="form-label">13. Duty Rotas</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="duty" id="duty" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="uniform" class="form-label">14. Uniform Policy</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="uniform" id="uniform" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="availability" class="form-label">15. Staff Availability Policy</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="availability" id="availability" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="time" class="form-label">16. Time Sheet Policy</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="time" id="time" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="transportation" class="form-label">17. Transportation Policy</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="transportation" id="transportation" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="mobile" class="form-label">18. Mobile Phone Policy</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="mobile" id="mobile" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="protection" class="form-label">19. General Data Protection Policy</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="protection" id="protection" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-4 mb-3">
                                            <label for="complaints" class="form-label">20. Disciplinary, Grievance and Complaints Procedure</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="complaints" id="complaints" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="trainings" class="form-label">21. Mandatory Trainings</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="trainings" id="trainings" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-3 mb-3">
                                            <label for="hygiene" class="form-label">22. Personal Hygiene</label>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <select name="hygiene" id="hygiene" class="form-control select2 form-select required-health" required autocomplete=off>
                                                <option value="" disabled selected hidden>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">   
                                            <div class="col-md-8">
                                                <textarea  class="form-control required-input" id="induction_checklist_comments" name="induction_checklist_comments"  rows="3"  placeholder="Enter Your Comment"  autocomplete=off></textarea>
                                            </div> 
                                        </div></br></br></br>
                                        <div id="declaration-details" class="declaration-details">
                                        <h4 class="header-title mt-0 mb-3">Declaration</h4>
                                        <hr>
                                            <div>
                                            <input type="checkbox" class="required-declaration" name="agree_submit" id="agree_submit" required autocomplete=off>
                                            <b>I confirm that all the information stated above have been read and understood clearly. My signature in this form indicates that I am willing to abide by the Excellent Care Ltd. policies and procedures.</b>
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
                        
                                                <div class="col-md-2 mb-0 d-grid text-center">
                                                    <button class="btn btn-primary" type="submit">Submit </button>
                                                </div> 
                                         </div>
                                     </div>
                                 </div>
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
@import url(https://fonts.googleapis.com/css?family=Cedarville+Cursive);  

.signature{
  font-family:"Cedarville Cursive";
}
</style>

<script>
    $( document ).ready(function() {
    
    });
    var nameField = document.getElementById("name");
    var sign = document.getElementById("signature");
    function createSign(){
    sign.value = nameField.value;
    }
</script>