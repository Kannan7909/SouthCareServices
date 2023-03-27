<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" />
   
    

    <style>
  * {
  font-size: 14px;
}

body {
  background-color: #eee;
  margin-top: 50px;
  font-family: Verdana;
}

div.card {
  margin: auto;
  width: 400px;
  height: 350px;
  background-color: white;
  border-radius: 2px;
  box-shadow: 0px 3px 3px silver;
  padding: 25px;
  h1 {
    margin: 0 0 20px 0; 
    font-weight: normal;
    color: #03a9f4;
    font-size: 30px;
  }
  
  label {
    float: left;
    padding: 10px 10px 14px 0;
    width: 175px;
    margin-top: 10px;
    clear: left;
  }
  
  input {
    float: right;
    border: 2px solid silver;
    padding: 8px 0;
    border-width: 0 0 2px 0;
    width: 200px;
    margin-top: 15px;
    transition: border-color .3s;
    &:focus, &:hover {
      border-color: #03a9f4;
      outline: 0;
    }
    &.warning {
      border-color: #ff9800;
    }
    
    &.error {
      border-color: #f44336;
    }
    
    &.valid {
      border-color: #4caf50;
    }
    
    &[type=submit] {
      border: 0;
      background-color: white;
      color: #03a9f4;
      text-transform: uppercase;
      width: auto;
      cursor: pointer;
    }
  }
}
  </style>
</head>
<body>
<div class="card">
          <h1>Induction Phase2</h1>
          <div id="successPhase2">
        
            Choose induction date: <input type='text' id='datepicker2' name="date" onchange = "dateChangePhase2(this.value)"/><br><br>
            <div id="containerPhase2"></div><br><br>
            <input type="submit" value="Submit" class="" name="Phase2" id="Phase2" onclick="submitDatPahase2()" style="display:none"/>
        </div>
        
        <div  id="infoPhase2" style="display:none">
            
        </div>
        
      </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">


var userPhase2; 
$( document ).ready(function() {
  
  //get induction phase1 details
  jQuery.ajax({  
url: 'induction-phase2',  
type: 'GET',  
  success: function(data) { 
  
    userPhase2 = data;
   // console.log(userPhase2['flag']);
    if(userPhase2['flag'] == 1){
   
    //get available dates from the ojbect
    availableDatesPhase2 = [];

      for (var key in data) {
        if (data.hasOwnProperty(key)) {
        //  console.log(data[key]['induction_date'])
        // if(users[key]['total'] == 'no'){
          var date  = dateFormat(data[key]['induction_date']);

          availableDatesPhase2.push(date);
          //}
          
        }
      }
      // console.log(availableDatesPhase2);
    //   var availableDates = ["2-7-2022","3-7-2022","4-7-2022"];

        $(function()
        {
            $('#datepicker2').datepicker({ beforeShowDay:
              function(dt)
              { 
                return [available(dt), "" ];
              }
          , changeMonth: true, changeYear: false});
        });
}else{
    document.getElementById('successPhase2').style.display = "none";
      document.getElementById('infoPhase2').style.display = "block";
      document.getElementById("infoPhase2").innerHTML = userPhase2['result'];
}
        function available(date) {
 

      dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
      if ($.inArray(dmy, availableDatesPhase2) != -1) {
        return true;
      } else {
        return false;
      }
      }

      function dateFormat(inputDate) {
  const date = new Date(inputDate);
  const day = date.getDate();
  const month = date.getMonth() + 1;
  const year = date.getFullYear();   
  var format = day+"-"+month+"-"+year;
 // console.log(format);
  return format;
}


  }  
});



});





// availableDates = [];

// console.log(users);
// for (var key in users) {
//   if (users.hasOwnProperty(key)) {
//     //console.log(users[key]['induction_date'])
//    // if(users[key]['total'] == 'no'){
//       var data  = dateFormat(users[key]['induction_date']);
//       availableDates.push(data);
//     //}
    
//   }
// }
// //console.log(availableDates);

// //var availableDates = ["2-7-2022","3-7-2022","4-7-2022"];

// $(function()
// {
//     $('#datepicker').datepicker({ beforeShowDay:
//       function(dt)
//       { 
//         return [available(dt), "" ];
//       }
//    , changeMonth: true, changeYear: false});
// });

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


// function available(date) {
 
  

//   dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
//   if ($.inArray(dmy, availableDates) != -1) {
//     return true;
//   } else {
//     return false;
//   }
// }

function dateChangePhase2(dateValue){
  const myTimeout = setTimeout(myDate, 1);

function myDate() {
  document.getElementById("containerPhase2").innerHTML = "";
  valuesPhase2 = [];
  dateFormatPhase2 = dateFormat1(dateValue);
  for (var key in userPhase2) {
  if (userPhase2.hasOwnProperty(key)) {
    if(dateFormatPhase2 == userPhase2[key]['induction_date'] ){
     // console.log(userPhase2[key]['induction_time']);

     // var values = ["dog", "cat", "parrot", "rabbit"];
     valuesPhase2.push(userPhase2[key]['induction_time']);
 
        var select = document.createElement("select");
        select.name = "timePhase2";
        select.id = "timePhase2"

        

    }else{
    }
  }
  }
  for (const valPhase2 of valuesPhase2)
        {
            var option1 = document.createElement("option");
            option1.value = valPhase2;
            option1.text = valPhase2.charAt(0).toUpperCase() + valPhase2.slice(1);
            select.appendChild(option1);
        }

        var label = document.createElement("label");
        label.innerHTML = "Choose your time: "
        label.htmlFor = "time";

        document.getElementById("containerPhase2").appendChild(label).appendChild(select);
        document.getElementById('Phase2').style.display = "block";
}
}

function submitDatPahase2(){
    var timePhase2 = document.getElementById('timePhase2').value;
    var datePhase2 = document.getElementById('datepicker2').value;
    jQuery.ajax({  
        url: 'save-induction-phase2',  
        type: 'GET', 
        data:{time:timePhase2,date:datePhase2},
          success: function(data) {  
            if(data['flag'] == 1){
                document.getElementById('successPhase2').style.display = "none";
                  document.getElementById('infoPhase2').style.display = "block";
                  document.getElementById("infoPhase2").innerHTML = data['result'];
            }else{
                document.getElementById('successPhase2').style.display = "block";
                  document.getElementById('infoPhase2').style.display = "block";
                  document.getElementById("infoPhase2").innerHTML = data['result'];
            }
          }  
        }); 
}
    </script>