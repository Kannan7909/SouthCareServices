<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Details</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    @include('adminPanel')
<div class="container">
<div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><!-- <h2>Employee <b>Details</b></h2> --></div>
                    <div class="col-sm-4">
                         <div class="search-box">
<!--                             <i class="material-icons">&#xE8B6;</i>
 -->                            <input type="search" name="search" id="search" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
    <table class="table-sm table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>SURNAME</th>
                        <th>FIRST NAME <!-- <i class="fa fa-sort"> --></i></th>
                        <th>DATE SUBMITTED</th>
                        <th>LOGIN ID</th>
                        <th>EMAIL</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>   
                </thead>
                <tbody class="allData">
                @foreach ($employees as $employee)
                    <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
            
                        <td>{{ $employee->surname }}</td>
                        <td>{{ $employee->firstname }}</td>
                        <td>{{ $employee->created_at }}</td>
                        <td>{{ $employee->login_id }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>
                        @if($employee->bank == 'processing')
                             <a href="{{ route('approve.bank',encrypt($employee->id)) }}" class="edit btn btn-primary" title="Confirm" data-toggle="tooltip"><i class="material-icons">&#xE254;</i>Appove Bank Details</a> 
                         @elseif($employee->bank == 'approved')
                             Bank Details Approved
                             @else
                             Pending
                        @endif
                            </td>
                        <td>
                            <a href="#" class="view" title="View" data-toggle="tooltip"><!-- <i class="material-icons">&#xE417;</i> --></a>
                            <a href="{{ route('edit.bank',encrypt($employee->id)) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
<!--                             <a href="{{ route('delete.employee',encrypt($employee->id)) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
 -->                        </td>
                    </tr> 
                    @endforeach
                </tbody>
                <tbody id="content" class="searchData"></tbody>
            </table>
    </div>
    
  </div>
</div>
</body>
</html>

<script>
$(document).ready(function(){
  $('#search').keyup(function(){
    $value=$(this).val();
    if($value){
        $('.allData').hide();
        $('.searchData').show();
    }
    else{
        $('.allData').show();
        $('.searchData').hide();
    }
    $.ajax({
        type:'get',
        url: '{{ route('search.bankDetails') }}',
        data:{'search':$value},

        success:function(data){
            console.log(data);
            $('#content').html(data);
        }
    })
  });
});
</script>