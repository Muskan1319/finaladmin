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
  <h2>Edit Contact </h2>
  @if(Session::has('error'))
  <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
  @endif
          
  <form action="/contactcontroller/update/{{$id}}" method="post" >
    @csrf
    @foreach($sel as $data)
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Name" value="{{$data->name}}" name="name">
    @if($errors->has('name'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('name')}}</label>
    @endif
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Email" value="{{$data->email_id}}" name="email_id">
      @if($errors->has('email_id'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('email_id')}}</label>
                    @endif
    </div>
    <div class="form-group">
    <label for="contact">Contact No.</label>
    <input type="number" class="form-control" id="number" placeholder="Name" value="{{$data->number}}" name="number">
    @if($errors->has('number'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('number')}}</label>
    @endif
    </div>

    <div class="form-group">
    <label for="message">Message</label>
    <input type="text" class="form-control" id="message" placeholder="Name" value="{{$data->message}}" name="message">
    @if($errors->has('message'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('message')}}</label>
    @endif
    </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
</body>
</html>
