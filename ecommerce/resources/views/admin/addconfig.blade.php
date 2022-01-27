@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   @section('Muskan') 
    <div class="container">
  <h2>Configuration Management</h2>
  @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif
          
  <form action="sendconfig" method="post">
    @csrf
   <div class="form-group">
    <label for="email">Title</label>
    <input type="email" class="form-control" id="emailid" placeholder="Email" name="emailid">
    @if($errors->has('emailid'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('emailid')}}</label>
                    @endif
    </div>
    
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
@endsection