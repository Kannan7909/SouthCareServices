<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Edit User</title>
</head>
<body>
<form method="post" action="{{ route('update.user') }}">
   @csrf
<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-5">
   <div class="card">
     <h2 class="card-title text-center">Edit User Details</h2>
      <div class="card-body py-md-4">
       <form _lpchecked="1">
          <div class="form-group">
             <input type="hidden"  name="user_id" id="user_id" value="{{ encrypt($user->id) }})">
             <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" placeholder="Name">
        </div>
        <div class="form-group">
             <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" placeholder="Email">
                            </div>
                            
                          
  <!--  <div class="form-group">
     <input type="password" class="form-control" id="password" value="{{ $user->password }}" placeholder="Password">
   </div>
 -->
   <div class="d-flex flex-row align-items-center justify-content-between">
      <a href="#"></a>
                                <button class="btn btn-primary">Update</button>
          </div>
       </form>
     </div>
  </div>
</div>
</div>
</div>
<form>
</body>
</html>