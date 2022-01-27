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
  <h2>Edit Banner Category </h2>
  @if(Session::has('error'))
  <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
  @endif
          
  <form action="/bannercontroller/update/{{$id}}" method="post" >
    @csrf
    @foreach($sel as $data)
   <div class="form-group">
    <label for="caption">Caption</label>
    <input type="text" class="form-control" id="caption" placeholder="Enter Caption" value="{{$data->caption}}" name="caption">
    @if($errors->has('caption'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('caption')}}</label>
    @endif
    </div>
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" class="form-control" id="image" placeholder="Enter Image" value="{{$data->image}}" name="image">
      @if($errors->has('image'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('image')}}</label>
                    @endif
    </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
</body>
</html>
