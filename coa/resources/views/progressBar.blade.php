<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Step Progress Bar</title>

    <link href="css/css-theme/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/css-theme/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>

    <!-- UniIcon CDN Link  -->

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body>

    <div class="main">


       <!--  <div class="head">

            <p class="head_1">Animated Step <span>Progress Bar</span></p>

            <p class="head_2">Using Html, Css & JavaScript</p>

        </div> -->


        <ul class="progress-ul">

            <li>

<!--                 <i class="icon uil  uil-file-plus-alt "></i>
 -->
                <div class="progress one" id="application-progress">

                    <p class="progress-step"> <i class="uil-file-plus-alt "></i></p>

                    <i class="uil uil-check"></i>

                </div>

                <p class="text"> <a class="text" id="application-text" href="{{ route('application.form') }}" class="text-muted ms-1">1.Application</a></p>

            </li>

            <div class="responsive-spacing"></div>
            <li>

<!--                 <i class="icon uil uil-books "></i>
 -->
                <div class="progress two" id="training-progress">

                    <p class="progress-step"><i class="uil-books "></i></p>

                    <i class="uil uil-check"></i>

                </div>

                <p class="text"><a class="text" id="training-text" href="{{ route('training.form') }}" class="text-muted ms-1">2.Training</a></p>

            </li>
            <div class="responsive-spacing"></div>

            <li>

<!--                 <i class="icon uil  uil-file-bookmark-alt "></i>
 -->
                <div class="progress three" id="dbs-progress">

                    <p class="progress-step"><i class="uil-file-bookmark-alt "></i></p>

                    <i class="uil uil-check"></i>

                </div>

                <p class="text"><a class="text" id="dbs-text" href="{{ route('dbs.check') }}" class="text-muted ms-1">3.DBS</a></p>

            </li>
            <div class="responsive-spacing"></div>

            <li>

<!--                 <i class="icon uil uil-users-alt "></i>
 -->
                <div class="progress four" id="reference-progress">

                    <p class="progress-step"><i class="uil-users-alt "></i></p>

                    <i class="uil uil-check"></i>

                </div>

                <p class="text"><a class="text" id="reference-text" href="{{ route('reference.form') }}" class="text-muted ms-1">4.Reference</a></p>

            </li>
            <div class="responsive-spacing"></div>

            <li>

<!--                 <i class="icon uil uil-medical-square"></i>
 -->
                <div class="progress five" id="health-progress">

                    <p class="progress-step"><i class="uil-medical-square"></i></p>

                    <i class="uil uil-check"></i>

                </div>

                <p class="text"><a class="text" id="health-text" href="{{ route('show.health') }}" class="text-muted ms-1">5.Health</a></p>

            </li>
            <div class="responsive-spacing"></div>

            <li>

<!--             <i class="icon uil uil-calendar-alt"></i>
 -->
                <div class="progress six" id="bank-progress">

                    <p class="progress-step"><i class="uil-moneybag"></i></p>

                    <i class="uil uil-check"></i>

                </div>

                <p class="text"><a class="text" id="bank-text" href="{{ route('bank.details') }}" class="text-muted ms-1">6.Bank</a></p>

            </li>
               </ul>
 
        <ul class="progress-ul" style="margin-top:10px;margin-left:-750px">
        
            <li>


                <div class="progress seven" id="starter-progress">

                    <p class="progress-step"><i class="uil-check-circle"></i></p>

                    <i class="uil uil-check"></i>

                </div>

                <p class="text"><a class="text" id="starter-text" href="{{ route('starter.checklist') }}" class="text-muted ms-1">7.Starter</a></p>

            </li>
            
        <li>


                <div class="progress eight" id="induction-progress">

                    <p class="progress-step"><i class="uil-calendar-alt"></i></p>

                    <i class="uil uil-check"></i>

                </div>

                <p class="text"><a class="text" id="induction-text" href="{{ route('induction.employee') }}" class="text-muted ms-1">8.Induction</a></p>

            </li>
        </ul> 

    </div>
    <div class="row">
        <div class="col-md-2 mb-3">
            <input class="form-control" type="hidden" id="application_status" name="application_status" value="{{ $employee->application_status }}">
        </div>
        <div class="col-md-2 mb-3">
            <input class="form-control" type="hidden" id="training_status" name="training_status" value="{{ $employee->training_status }}">
        </div>
        <div class="col-md-2 mb-3">
            <input class="form-control" type="hidden" id="dbs_status" name="dbs_status" value="{{ $employee->dbs_status }}">
        </div>
        <div class="col-md-2 mb-3">
            <input class="form-control" type="hidden" id="reference_status" name="reference_status" value="{{ $employee->reference_status }}">
        </div>
        <div class="col-md-2 mb-3">
            <input class="form-control" type="hidden" id="health_status" name="health_status" value="{{ $employee->health_status }}">
        </div>
        <div class="col-md-2 mb-3">
            <input class="form-control" type="hidden" id="bank_status" name="bank_status" value="{{ $employee->bank_status }}">
        </div>
        <div class="col-md-2 mb-3">
            <input class="form-control" type="hidden" id="starter_status" name="starter_status" value="{{ $employee->starter_status }}">
        </div>
        @if(count($inductionStatus) == 0)
        <div class="col-md-2 mb-3">
            <input class="form-control" type="hidden" id="induction_status" name="induction_status" value="No Data">
        </div>
        @else
        <div class="col-md-2 mb-3">
            <input class="form-control" type="hidden" id="induction_status" name="induction_status" value="{{ $inductionStatus[0]->status }}">
        </div>
        @endif
    </div>
    <script src="js/js-theme/vendor.min.js"></script>
        <script src="js/js-theme/app.min.js"></script>

        <!-- third party js -->
        <script src="js/js-theme/vendor/chart.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="js/js-theme/pages/demo.profile.js"></script>

</body>

</html>






<style>


*{

    margin: 0;

    padding: 0;

    box-sizing: border-box;

}

@font-face {

    font-family: Nunito,sans-serif;

    src: url(./Fonts/Poppins-Medium.ttf);

}


.main{

    width: 100%;

/*     height: 100vh;
 */

    margin-top:225px;

    display: flex;

    justify-content: center;

    align-items: center;

    font-family:  Nunito,sans-serif;

    flex-direction: column;

}

.head{

    text-align: center;

}

.head_1{

    font-size: 30px;

    font-weight: 600;

    color: #333;

}

.head_1 span{

    color: #ff4732;

}

.head_2{

    font-size: 16px;

    font-weight: 600;

    color: #333;

    margin-top: 3px;

}

.progress-ul{

    display: flex;

    margin-top: 80px;

}

.progress-ul li{

    list-style: none;

    display: flex;

    flex-direction: column;

    align-items: center;

    margin-left:35px;
    margin-right:65px;

}

.progress-ul li .icon{

    font-size: 35px;

    color: #ff4732;

    margin: 0 60px;

}

.progress-ul li .text{

    font-size: 14px;

    font-weight: 600;

/*     color: #ff4732;
 */
}



/* Progress Div Css  */


.progress-ul li .progress{

    width: 90px;

    height: 90px;

    border-radius: 50%;

/*     background-color: rgba(68, 68, 68, 0.781);
 */
    margin: 14px 0;

    display: grid;

    place-items: center;

    color: #fff;

    position: relative;

    /* cursor: pointer; */

}

.progress-step{
    margin-top:18px;
}

.progress::after{

    content: " ";

    position: absolute;

    width: 125px;

    height: 5px;

/*     background-color: rgba(68, 68, 68, 0.781);
 */
    right: 30px;

}

.one::after{

    width: 0;

    height: 0;

}

.progress-ul li .progress .uil{

    display: none;

}

.progress-ul li .progress p{

/*     font-size: 13px;
 */
    font-size: 28px;
}


/* Active Css  */


.progress-ul li .active{

    background-color: #ff4732;

    display: grid;

    place-items: center;

}

.progress-ul li .active::after{

    background-color: #ff4732;

}

.progress-ul li .active p{

    display: none;

}

.progress-ul li .active .uil{

    font-size: 20px;

    display: flex;

}


/* Responsive Css  */


/* @media (max-width: 980px) {
 */
@media (max-width: 1325px) {

    .progress-ul{

        flex-direction: column;

    }

    .progress-ul li{

/*         flex-direction: row;
 */
        flex-direction: column;
    }

    .progress-ul li .progress{

        margin: 0 30px;

    }

    .progress::after{

        width: 5px;

        height: 55px;

        bottom: 30px;

        left: 50%;

        transform: translateX(-50%);

        z-index: -1;

    }

    .one::after{

        height: 0;

    }

    .progress-ul li .icon{

        margin: 15px 0;

    }

    /* .responsive-spacing{

        margin-top: 10px;

        } */

}


@media (max-width:600px) {

    .head .head_1{

        font-size: 24px;

    }

    .head .head_2{

        font-size: 16px;

    }

}

</style>




<script>

/* const one = document.querySelector(".one");

const two = document.querySelector(".two");

const three = document.querySelector(".three");

const four = document.querySelector(".four");

const five = document.querySelector(".five");


one.onclick = function() {

    one.classList.add("active");

    two.classList.remove("active");

    three.classList.remove("active");

    four.classList.remove("active");

    five.classList.remove("active");

}


two.onclick = function() {

    one.classList.add("active");

    two.classList.add("active");

    three.classList.remove("active");

    four.classList.remove("active");

    five.classList.remove("active");

}

three.onclick = function() {

    one.classList.add("active");

    two.classList.add("active");

    three.classList.add("active");

    four.classList.remove("active");

    five.classList.remove("active");

}

four.onclick = function() {

    one.classList.add("active");

    two.classList.add("active");

    three.classList.add("active");

    four.classList.add("active");

    five.classList.remove("active");

}

five.onclick = function() {

    one.classList.add("active");

    two.classList.add("active");

    three.classList.add("active");

    four.classList.add("active");

    five.classList.add("active");

}
 */

$( document ).ready(function() {
    var application_status = $('#application_status').val();
    if(application_status == 'Pending'){
        $( '#application-progress' ).css( "background", "#808080" );
        $( '#application-text' ).css( "color", "#808080" );
    }
    if(application_status == 'Submitted'){
        $( '#application-progress' ).css( "background", "#2196f3" );
        $( '#application-text' ).css( "color", "#2196f3" );
    }
    if(application_status == 'Under Review'){
        $( '#application-progress' ).css( "background", "#fec107" );
        $( '#application-text' ).css( "color", "#fec107" );
    }
    if(application_status == 'Approved'){
        $( '#application-progress' ).css( "background", " #31c337" );
        $( '#application-text' ).css( "color", "#31c337" );
    }

    var training_status = $('#training_status').val();
    if(training_status == 'Pending'){
        $( '#training-progress' ).css( "background", "#808080" );
        $( '#training-text' ).css( "color", "#808080" );
    }
    if(training_status == 'Submitted'){
        $( '#training-progress' ).css( "background", "#2196f3" );
        $( '#training-text' ).css( "color", "#2196f3" );
    }
    if(training_status == 'Requested'){
        $( '#training-progress' ).css( "background", "#2196f3" );
        $( '#training-text' ).css( "color", "#2196f3" );
    }
    if(training_status == 'Under Review'){
        $( '#training-progress' ).css( "background", "#fec107" );
        $( '#training-text' ).css( "color", "#fec107" );
    }
    if(training_status == 'Approved'){
        $( '#training-progress' ).css( "background", " #31c337" );
        $( '#training-text' ).css( "color", "#31c337" );
    }

    var dbs_status = $('#dbs_status').val();
    if(dbs_status == 'Pending'){
        $( '#dbs-progress' ).css( "background", "#808080" );
        $( '#dbs-text' ).css( "color", "#808080" );
    }
    if(dbs_status == 'Submitted'){
        $( '#dbs-progress' ).css( "background", "#2196f3" );
        $( '#dbs-text' ).css( "color", "#2196f3" );
    }
    if(dbs_status == 'Requested'){
        $( '#dbs-progress' ).css( "background", "#2196f3" );
        $( '#dbs-text' ).css( "color", "#2196f3" );
    }
    if(dbs_status == 'Under Review'){
        $( '#dbs-progress' ).css( "background", "#fec107" );
        $( '#dbs-text' ).css( "color", "#fec107" );
    }
    if(dbs_status == 'Approved'){
        $( '#dbs-progress' ).css( "background", " #31c337" );
        $( '#dbs-text' ).css( "color", "#31c337" );
    }

    var reference_status = $('#reference_status').val();
    if(reference_status == 'Pending'){
        $( '#reference-progress' ).css( "background", "#808080" );
        $( '#reference-text' ).css( "color", "#808080" );
    }
    if(reference_status == 'Submitted'){
        $( '#reference-progress' ).css( "background", "#2196f3" );
        $( '#reference-text' ).css( "color", "#2196f3" );
    }
    if(reference_status == 'Under Review'){
        $( '#reference-progress' ).css( "background", "#fec107" );
        $( '#reference-text' ).css( "color", "#fec107" );
    }
    if(reference_status == 'Approved'){
        $( '#reference-progress' ).css( "background", " #31c337" );
        $( '#reference-text' ).css( "color", "#31c337" );
    }

    var health_status = $('#health_status').val();
    if(health_status == 'Pending'){
        $( '#health-progress' ).css( "background", "#808080" );
        $( '#health-text' ).css( "color", "#808080" );
    }
    if(health_status == 'Submitted'){
        $( '#health-progress' ).css( "background", "#2196f3" );
        $( '#health-text' ).css( "color", "#2196f3" );
    }
    if(health_status == 'Under Review'){
        $( '#health-progress' ).css( "background", "#fec107" );
        $( '#health-text' ).css( "color", "#fec107" );
    }
    if(health_status == 'Approved'){
        $( '#health-progress' ).css( "background", " #31c337" );
        $( '#health-text' ).css( "color", "#31c337" );
    } 

    var bank_status = $('#bank_status').val();
    if(bank_status == 'Pending'){
        $( '#bank-progress' ).css( "background", "#808080" );
        $( '#bank-text' ).css( "color", "#808080" );
    }
    if(bank_status == 'Submitted'){
        $( '#bank-progress' ).css( "background", "#2196f3" );
        $( '#bank-text' ).css( "color", "#2196f3" );
    }
    if(bank_status == 'Under Review'){
        $( '#bank-progress' ).css( "background", "#fec107" );
        $( '#bank-text' ).css( "color", "#fec107" );
    }
    if(bank_status == 'Approved'){
        $( '#bank-progress' ).css( "background", " #31c337" );
        $( '#bank-text' ).css( "color", "#31c337" );
    }

    var starter_status = $('#starter_status').val();
    if(starter_status == 'Pending'){
        $( '#starter-progress' ).css( "background", "#808080" );
        $( '#starter-text' ).css( "color", "#808080" );
    }
    if(starter_status == 'Submitted'){
        $( '#starter-progress' ).css( "background", "#2196f3" );
        $( '#starter-text' ).css( "color", "#2196f3" );
    }
    if(starter_status == 'Under Review'){
        $( '#starter-progress' ).css( "background", "#fec107" );
        $( '#starter-text' ).css( "color", "#fec107" );
    }
    if(starter_status == 'Approved'){
        $( '#starter-progress' ).css( "background", " #31c337" );
        $( '#starter-text' ).css( "color", "#31c337" );
    }
    
    var induction_status = $('#induction_status').val();
    //induction_status == 'no' means booked
    if(induction_status == 'Confirmed'){
        $( '#induction-progress' ).css( "background", "#fec107" );
        $( '#induction-text' ).css( "color", "#fec107" );
    }else if(induction_status == 'Attended'){
        $( '#induction-progress' ).css( "background", "#31c337" );
        $( '#induction-text' ).css( "color", "#31c337" );
    }
    else if(induction_status == 'cancelled'){
        $( '#induction-progress' ).css( "background", "red" );
        $( '#induction-text' ).css( "color", "red" );
    }else if(induction_status == 'no'){
        $( '#induction-progress' ).css( "background", "#2196f3" );
        $( '#induction-text' ).css( "color", "#2196f3" );
    }else if(induction_status == 'No Data'){
        $( '#induction-progress' ).css( "background", "#808080" );
        $( '#induction-text' ).css( "color", "#808080" );
    }
    }   );
</script>
