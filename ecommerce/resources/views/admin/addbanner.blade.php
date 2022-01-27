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
  <h2>Banner Management</h2>
  @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif
          
  <form action="sendbanner" method="post" enctype="multipart/form-data">
    @csrf
   <div class="form-group">
    <label for="caption">Caption</label>
    <input type="text" class="form-control" id="caption" placeholder=" Enter Caption" name="caption">
    @if($errors->has('caption'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('caption')}}</label>
                    @endif
    </div>
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" class="form-control" id="image" placeholder="Enter Image" name="image">
      @if($errors->has('image'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('image')}}</label>
                    @endif
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
</form>
</body>
</html>
@endsection