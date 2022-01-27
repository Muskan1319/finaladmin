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
  <h2>Coupon Management</h2>
  @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif
          
  <form action="sendcoupon" method="post">
    @csrf
   <div class="form-group">
    <label for="code">Title</label>
    <input type="text" class="form-control" id="title" placeholder="Coupon code" name="coupon_code">
    @if($errors->has('coupon_code'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('coupon_code')}}</label>
                    @endif
    </div>
    <div class="form-group">
      <label for="quantity">Description</label>
      <input type="number" class="form-control" id="quantity" placeholder="Quantity" name="quantity">
      @if($errors->has('quantity'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('quantity')}}</label>
                    @endif
    </div>
    <div class="form-group">
      <label for="value">Coupon Value</label>
      <input type="text" class="form-control" id="value" placeholder="Coupon Value" name="coupon_value">
      @if($errors->has('coupon_value'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('coupon_value')}}</label>
                    @endif
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
</form>
</body>
</html>
@endsection