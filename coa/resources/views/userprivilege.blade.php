<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User View</title>
</head>
<body>
    <form method="post" action="{{ route('save.privilege') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <h1>Login Success</h1>
        <label><strong>Select Module Privileges :</strong></label><br>
        <label><input type="checkbox" name="privilege[]" value="1"><span>Page-1</span></label>
        <label><input type="checkbox" name="privilege[]" value="2"><span>Page-2</span></label>
        <label><input type="checkbox" name="privilege[]" value="3"><span>Page-3</span></label>
        </div>  
        <div class="form-group text-center">
        <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
        </form>
</body>
</html>