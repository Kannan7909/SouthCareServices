<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:06:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Induction</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/images-theme/favicon.ico">

        <!-- App css -->
        <link href="css/css-theme/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/css-theme/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" />
	
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                                    @if(count($profile) == 0)
                                        <img src="images/user.png" alt="" class="rounded-circle img-thumbnail">
                                    @else
                                        <img src="{{ $profile[0]->file_path}}" alt="" class="rounded-circle img-thumbnail">
                                    @endif
                                    </span>
                                    <span>
                                    <span class="account-user-name"><strong> {{ $employee->firstname }} {{ $employee->surname }}</strong></span>
                                     <span class="account-position">{{ $employee->login_id }}</span> 
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
                                    <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">Profile 2</li>
                                        </ol>
                                    </div> -->
                                    <h4 class="page-title"> Office Induction </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 


                        
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Personal-Information -->
                                <div class="card">
                                    <div class="card-body">
                                    <label for="msg" class="form-label"> <p id="induction_info">
                                        </p> </label> 

                                    <div class="text-start" id="formInfo">
                                        <div class="row">
                                            
                                            
                                            <div class="col-md-3">
                                                 <form  method="POST" action="{{ route('save.induction1') }}" >
                                                     {{ csrf_field() }}
                                                    Choose induction date: <input type='text' id='datepicker'class="form-control required-personal" name="date" onchange = "dateChange(this.value)"/><br><br>
                                                    <div id="container"></div><br>
                                                    <input type="submit" value="Submit" class="btn btn-primary toggle-disabled" name="submit" id="submit" style="display:none"/>
                                                </form> 
                                            </div>
                                           
                                        </div>
                                       
                                        </div>
                                    </div>
                                </div>
                                <!-- Personal-Information -->

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


      
        <!-- end demo js-->
        <script type="text/javascript">

$(".notification-list").on('click', function(event){
    $(".dropdown-menu").show();
});
availableDates = [];
var users = {!! json_encode($inductionData->toArray()) !!};
console.log(users);
          
          if(users['flag'] == '0'){
              
             document.getElementById("formInfo").style.display = "none";
             document.getElementById('induction_info').innerHTML = users['result'];
            
          }
          //new else if for induction checklist status
          else if(users['flag'] == '2'){
              document.getElementById("formInfo").style.display = "none";
              let text = " Please fill out the induction checklist form.";
              let string = " Click here";
              let click = string.fontcolor("red");
              let path = "{{ route('induction.checklist') }}"
              let result = click.link(path);
              document.getElementById('induction_info').innerHTML = users['result']+text+result;
             
           }else  if(users['flag'] == '3'){
              document.getElementById("formInfo").style.display = "none";
              document.getElementById('induction_info').innerHTML = users['result'];
             
           }
          //end new else if for induction checklist status
          else{
              
               for (var key in users) {
              if (users.hasOwnProperty(key)) {
                //console.log(users[key]['induction_date'])
                if(users[key]['total'] == 'no'){
                  var data  = dateFormat(users[key]['induction_date']);
                  availableDates.push(data);
                }
                
              }
            }
            
          }
            
//console.log(availableDates);

//var availableDates = ["2-7-2022","3-7-2022","4-7-2022"];

$(function()
{
    $('#datepicker').datepicker({ beforeShowDay:
      function(dt)
      { 
        return [available(dt), "" ];
      }
   , changeMonth: true, changeYear: false});
});

function dateFormat(inputDate) {
  const date = new Date(inputDate);
  const day = date.getDate();
  const month = date.getMonth() + 1;
  const year = date.getFullYear();   
  var format = day+"-"+month+"-"+year;
 // console.log(format);
  return format;
}

function dateFormat1(inputDate) {
  const date = new Date(inputDate);
  const day = date.getDate();
  const month = (date.getMonth() + 1).toString().padStart(2, "0");
  const year = date.getFullYear();   
  var format = year+"-"+month+"-"+day;
 // console.log(format);
  return format;
}


function available(date) {
 
  

  dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
  if ($.inArray(dmy, availableDates) != -1) {
    return true;
  } else {
    return false;
  }
}

function dateChange(dateValue){
  const myTimeout = setTimeout(myDate, 1);

function myDate() {
  document.getElementById("container").innerHTML = "";
  values = [];
  dateFormat = dateFormat1(dateValue);
  for (var key in users) {
  if (users.hasOwnProperty(key)) {
    if(dateFormat == users[key]['induction_date'] ){
      console.log(users[key]['induction_time']);

     // var values = ["dog", "cat", "parrot", "rabbit"];
     values.push(users[key]['induction_time']);
 
        var select = document.createElement("select");
        select.name = "time";
        select.id = "time";
        select.classList.add("form-control");

        

    }else{
    }
  }
  }
  for (const val of values)
        {
            var option = document.createElement("option");
            option.value = val;
            option.text = val.charAt(0).toUpperCase() + val.slice(1);
            select.appendChild(option);
        }

        var label = document.createElement("label");
        label.innerHTML = "Choose your time: "
        label.htmlFor = "time";

        document.getElementById("container").appendChild(label).appendChild(select);
        document.getElementById('submit').style.display = "block";
}
}
    </script>
    
        <script src="js/js-theme/app.min.js"></script>

        <!-- third party js -->
        <script src="js/js-theme/vendor/chart.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="js/js-theme/pages/demo.profile.js"></script>
    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 09:07:07 GMT -->
</html>
