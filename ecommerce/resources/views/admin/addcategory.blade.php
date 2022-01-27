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
  <h2>Category Management</h2>
  @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif
          
  <form action="senddata" method="post">
    @csrf
   <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="Title" name="title">
    @if($errors->has('title'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('title')}}</label>
                    @endif
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description">
      @if($errors->has('description'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('description')}}</label>
                    @endif
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
</form>
</body>
</html>
@endsection