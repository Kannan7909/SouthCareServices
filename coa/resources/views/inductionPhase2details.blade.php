<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>
@include('adminPanel')
    <!-- @foreach ($inductionUserDetails as $induction)
     <span>{{$induction->email}} </span>
@endforeach -->

<!-- {{$inductionUserDetails}} -->
<div class="container" style="font-size:20px">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
<table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Induction date <!-- <i class="fa fa-sort"> --></i></th>
                        <th>Induction Time</th>
                        <th>Status</th>
                        <th>ACTIONS</th>
                    </tr>   
                </thead>
                <tbody>
                    @foreach ($inductionUserDetails as $employee)
                    <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
            
                        <td>{{ $employee->firstname }}</td>
                        <td>{{ $employee->induction_date }}</td>
                        <td>{{ $employee->induction_time }}</td>
                        <td>@if($employee->induction_status == 'no')
                            <span>Pending</span>
                        @else
                            {{ $employee->induction_status }}@endif</td>
                        <td>
                        @if($employee->induction_status == 'no')
                        <a href="{{ route('confirm.inductionPhase2',encrypt($employee->induction_user_id)) }}" class="edit btn btn-primary" title="Confirm" data-toggle="tooltip"><i class="material-icons">&#xE254;</i>Confirm Session</a> 
                        @elseif ($employee->induction_status == 'Confirmed')
                        <a href="{{ route('attend.inductionPhase2',encrypt($employee->induction_user_id)) }}" class="edit btn btn-primary" title="Confirm" data-toggle="tooltip"><i class="material-icons">&#xE254;</i>Attended Session</a>
                        @else
                         Session Attended
                        @endif
                        
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
            </div>
    
    </div>
  </div>
  
</body>
</html>