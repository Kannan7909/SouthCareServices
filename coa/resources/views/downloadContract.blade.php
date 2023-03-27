<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Employee Contract</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="images/images-theme/favicon.ico">

    <!-- App css -->
    <link href="css/css-theme/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/css-theme/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
</head>
<body>
    <div class="row">
        <div class="col-md-3">
            <div id="editor"></div>
            <button  id="cmd" type="button" class="btn btn-info"><i class="uil-file-download-alt"></i> <span>Download Contract</span> </button>
        </div> 
    </div>  
    <div style="display:none">
        <div id="download-employee-contract" class="col-md-9"> 
            <h4 class="header-title mt-0 mb-3">JobsPlus Employee Contract</h4>
        </div>
        <div id="content1">
            Dear {{ $employee->firstname }} {{ $employee->surname }},</br></br>
        </div>
        <div id="content2">
             <h4 class="header-title mt-0 mb-3 text-center">PRINCIPLE STATEMENT OF TERMS AND CONDITIONS</h4>
        </div>
        <div id="content3">
            {!! html_entity_decode($content[0]->template) !!} 
            1.The date of commencement of this contract is {{ $contract[0]->commencement_date }}.
        </div>
         <div id="content4">
            {!! html_entity_decode($content[1]->template) !!} 
        </div>
         <div id="content5">
            <b> Pay Rates & Other Charges</b></br>
            <div class="row">
            <label>Main Post Rate</label>
        </div></br>
        <div class="row">
            @if($employee->posts=="Nurse" || $employee->posts=="Nurse" || $employee->posts=="Care Assistant" || $employee->posts=="Senior Care Assistant" || $employee->posts=="Domiciliary Care")
            <div> The pay rates confirmed for you will be a minimum of {{ $contract[0]->weekday_longday_type1 }} for weekday longday, {{ $contract[0]->weekday_night_type1 }} for weekday night, {{ $contract[0]->bank_holiday_type1 }} for bank holiday, {{ $contract[0]->weekend_longday_type1 }} for weekend longday {{ $contract[0]->weekend_night_type1 }} for weekend night. </div>
            @elseif($employee->posts=="Kitchen Assistant" || $employee->posts=="Chef" || $employee->posts=="Domestic Care")
            <div> The pay rates confirmed for you will be a minimum of {{ $contract[0]->weekday_longday_type2 }} for weekday longday, {{ $contract[0]->bank_holiday_type2 }} for bank holiday, {{ $contract[0]->weekend_longday_type2 }} for weekend longday. </div>
            @endif
            </br>
        </div>
        @if($employee->kitchen_assistant=="on")
            <div class="row">
                <label>Sub Post Rate - Kitchen Assistant</label>
            </div>
            <div class="row">
            <div> The pay rates confirmed for you will be a minimum of {{ $contract[0]->kitchen_weekday_longday }} for weekday longday, {{ $contract[0]->kitchen_weekday_night }} for weekday night, {{ $contract[0]->kitchen_bank_holiday }} for bank holiday, {{ $contract[0]->kitchen_weekend_longday }} for weekend longday {{ $contract[0]->kitchen_weekend_night }} for weekend night. </div>
            </div></br>
            @endif
            @if($employee->domestic_Care=="on")
            <div class="row">
                <label>Sub Post Rate - Domestic Care</label>
            </div>
            <div class="row">
            <div> The pay rates confirmed for you will be a minimum of {{ $contract[0]->domestic_weekday_longday }} for weekday longday, {{ $contract[0]->domestic_weekday_night }} for weekday night, {{ $contract[0]->domestic_bank_holiday }} for bank holiday, {{ $contract[0]->domestic_weekend_longday }} for weekend longday {{ $contract[0]->domestic_weekend_night }} for weekend night. </div>
            </div></br>
            @endif
            @if($employee->care_assistant=="on")
            <div class="row">
                <label>Sub Post Rate - Care Assistant</label>
            </div>
            <div class="row">
            <div> The pay rates confirmed for you will be a minimum of {{ $contract[0]->care_weekday_longday }} for weekday longday, {{ $contract[0]->care_weekday_night }} for weekday night, {{ $contract[0]->care_bank_holiday }} for bank holiday, {{ $contract[0]->care_weekend_longday }} for weekend longday {{ $contract[0]->care_weekend_night }} for weekend night. </div>
            </div>
            @endif
            @if($employee->living_Care=="on")
            <div class="row">
                <label>Sub Post Rate - Living Care</label>
            </div>
            <div class="row">
            <div> The pay rates confirmed for you will be a minimum of {{ $contract[0]->living_weekday_longday }} for weekday longday, {{ $contract[0]->living_weekday_night }} for weekday night, {{ $contract[0]->living_bank_holiday }} for bank holiday, {{ $contract[0]->living_weekend_longday }} for weekend longday {{ $contract[0]->living_weekend_night }} for weekend night. </div>
            </div>
            @endif
        </div>
       <div id="content6">
            {!! html_entity_decode($content[2]->template) !!} 
        </div>
       <div id="content7">
        <b> Trainings</b>
        </div>
       <div id="content8">
        {!! html_entity_decode($content[3]->template) !!}   
        </div>
       <div id="content9">
        <b> Termination</b>
        </div>
        <div id="content10">
        {!! html_entity_decode($content[4]->template) !!}                      
        </div>
       <div id="content11">
        {!! html_entity_decode($content[5]->template) !!}                      
        </div>
      <div id="content12">
        {!! html_entity_decode($content[6]->template) !!}                      
        </div>
         <div id="declaration-heading" class="declaration-heading">
            <h4 class="header-title mt-0 mb-3">Declaration</h4>
        </div>
       <div id="declaration-details">  
            <div class="col-md-3 mb-3">
                <div>Name : {{ $user_contract[0]->name }}</div>
            </div> 
            <div class="col-md-3 mb-3">
             Signature : <span class="signature">{{ $user_contract[0]->signature }}</span>
            </div>
            <div class="col-md-3 mb-3">
                <div>Date : {{ $user_contract[0]->date }}</div></br>
            </div>
        </div> 
    </div>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

 <script>
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#download-employee-contract').html(), 85, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.fromHTML($('#content1').html(), 15, 25, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
     doc.fromHTML($('#content2').html(), 50, 35, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    }); 
    doc.fromHTML($('#content3').html(), 15, 45, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    }); 
    doc.fromHTML($('#content4').html(), 15, 60, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    }); 
    doc.fromHTML($('#content5').html(), 15, 135, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    }); 
    doc.fromHTML($('#content6').html(), 15, 155, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    }); 
    doc.fromHTML($('#content7').html(), 15, 40, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    }); 
    doc.fromHTML($('#content8').html(), 15, 35, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    }); 
    doc.fromHTML($('#content9').html(), 15, 165, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    }); 
    doc.fromHTML($('#content10').html(), 15, 140, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.fromHTML($('#content11').html(), 15, 125, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.fromHTML($('#content12').html(), 15, 80, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.fromHTML($('#declaration-heading').html(), 15, 120, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });  
    doc.fromHTML($('#declaration-details').html(), 15, 130, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    }); 
    doc.save('Employee Contract.pdf');    
});
</script>