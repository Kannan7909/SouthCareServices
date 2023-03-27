<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>User Details</title>
</head>
<body>
<h1 style="text-align:center">User Detalis</h1>
<form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
<!--           <a href="{{ route('edit.user',['uId'=>$user->id]) }}" class="btn btn-primary">Edit</a>
 -->                    <a href="{{ route('edit.user',encrypt($user->id)) }}" class="btn btn-primary">Edit</a>

          <a href="{{ route('delete.user',encrypt($user->id)) }}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</form>
</body>
</html>