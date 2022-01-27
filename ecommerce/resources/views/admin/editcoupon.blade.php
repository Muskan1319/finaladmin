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
  <h2>Edit Coupon Category </h2>
  @if(Session::has('error'))
  <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
  @endif
          
  <form action="/couponcontroller/update/{{$id}}" method="post" >
    @csrf
    @foreach($sel as $data)
   <div class="form-group">
    <label for="code">Title</label>
    <input type="text" class="form-control" id="coupon_code" placeholder="Coupon code" value="{{$data->coupon_code}}" name="coupon_code">
    @if($errors->has('coupon_code'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('coupon_code')}}</label>
    @endif
    </div>
    <div class="form-group">
      <label for="quantity">Quantity</label>
      <input type="number" class="form-control" id="quantity" placeholder="Quantity" value="{{$data->quantity}}" name="quantity">
      @if($errors->has('quantity'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('quantity')}}</label>
                    @endif
    </div>
    <div class="form-group">
    <label for="value">Coupon value</label>
    <input type="text" class="form-control" id="coupon_value" placeholder="Coupon Value" value="{{$data->coupon_value}}" name="coupon_value">
    @if($errors->has('coupon_value'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('coupon_value')}}</label>
    @endif
    </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
</body>
</html>