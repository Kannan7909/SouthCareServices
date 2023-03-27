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
          <h1>Induction Phase1</h1>
          <div id="success">
                    Choose induction date: <input type='text' id='datepicker' name="date" onchange = "dateChange(this.value)"/><br><br>
                    <div id="container"></div><br><br>
                    <input type="submit" value="Submit" class="" name="submit" id="submit" onclick="submitData()" style="display:none"/>
        </div>
        <div  id="info" style="display:none">
            
        </div>
      </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">


var user; 
$( document ).ready(function() {
  
  //get induction phase1 details
  jQuery.ajax({  
url: 'induction',  
type: 'GET',  
  success: function(data) { 
      
      user = data;
      //console.log(user['flag']);
    //get available dates from the ojbect
    
    if(user['flag'] == 1){
    availableDates = [];

      for (var key in data) {
        if (data.hasOwnProperty(key)) {
        //  console.log(data[key]['induction_date'])
        // if(users[key]['total'] == 'no'){
          var date  = dateFormat(data[key]['induction_date']);

            availableDates.push(date);
          //}
          
        }
      }
      //  var availableDates = ["2-7-2022","3-7-2022","4-7-2022"];

        $(function()
        {
            $('#datepicker').datepicker({ beforeShowDay:
              function(dt)
              { 
                return [available(dt), "" ];
              }
          , changeMonth: true, changeYear: false});
        });

        function available(date) {
 

      dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
      if ($.inArray(dmy, availableDates) != -1) {
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
  }  else{
      document.getElementById('success').style.display = "none";
      document.getElementById('info').style.display = "block";
      document.getElementById("info").innerHTML = user['result'];
  }
  
  }
  
  
});



});

function dateFormat1(inputDate) {
  const date = new Date(inputDate);
  const day = date.getDate();
  const month = (date.getMonth() + 1).toString().padStart(2, "0");
  const year = date.getFullYear();   
  var format = year+"-"+month+"-"+day;
 // console.log(format);
  return format;
}
function dateChange(dateValue){
  const myTimeout = setTimeout(myDate, 1);

function myDate() {
  //console.log(user);
  document.getElementById("container").innerHTML = "";
  values = [];
  dateFormat = dateFormat1(dateValue);
  for (var key in user) {
  if (user.hasOwnProperty(key)) {
    if(dateFormat == user[key]['induction_date'] ){
      //console.log(user[key]['induction_time']);

     // var values = ["dog", "cat", "parrot", "rabbit"];
     values.push(user[key]['induction_time']);
 
        var select = document.createElement("select");
        select.name = "time";
        select.id = "time"

        

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

function submitData(){
    var time = document.getElementById('time').value;
    var date = document.getElementById('datepicker').value;
    jQuery.ajax({  
        url: 'save-induction-initial',  
        type: 'GET', 
        data:{time:time,date:date},
          success: function(data) {  
            if(data['flag'] == 1){
                document.getElementById('success').style.display = "none";
                  document.getElementById('info').style.display = "block";
                  document.getElementById("info").innerHTML = data['result'];
            }else{
                document.getElementById('success').style.display = "block";
                  document.getElementById('info').style.display = "block";
                  document.getElementById("info").innerHTML = data['result'];
            }
          }  
        }); 
}



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

// function dateFormat(inputDate) {
//   const date = new Date(inputDate);
//   const day = date.getDate();
//   const month = date.getMonth() + 1;
//   const year = date.getFullYear();   
//   var format = day+"-"+month+"-"+year;
//  // console.log(format);
//   return format;
// }

// function dateFormat1(inputDate) {
//   const date = new Date(inputDate);
//   const day = date.getDate();
//   const month = (date.getMonth() + 1).toString().padStart(2, "0");
//   const year = date.getFullYear();   
//   var format = year+"-"+month+"-"+day;
//  // console.log(format);
//   return format;
// }


// function available(date) {
 
  

//   dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
//   if ($.inArray(dmy, availableDates) != -1) {
//     return true;
//   } else {
//     return false;
//   }
// }

// function dateChange(dateValue){
//   const myTimeout = setTimeout(myDate, 1);

// function myDate() {
//   document.getElementById("container").innerHTML = "";
//   values = [];
//   dateFormat = dateFormat1(dateValue);
//   for (var key in users) {
//   if (users.hasOwnProperty(key)) {
//     if(dateFormat == users[key]['induction_date'] ){
//       console.log(users[key]['induction_time']);

//      // var values = ["dog", "cat", "parrot", "rabbit"];
//      values.push(users[key]['induction_time']);
 
//         var select = document.createElement("select");
//         select.name = "time";
//         select.id = "time"

        

//     }else{
//     }
//   }
//   }
//   for (const val of values)
//         {
//             var option = document.createElement("option");
//             option.value = val;
//             option.text = val.charAt(0).toUpperCase() + val.slice(1);
//             select.appendChild(option);
//         }

//         var label = document.createElement("label");
//         label.innerHTML = "Choose your time: "
//         label.htmlFor = "time";

//         document.getElementById("container").appendChild(label).appendChild(select);
//         document.getElementById('submit').style.display = "block";
// }
// }
    </script>