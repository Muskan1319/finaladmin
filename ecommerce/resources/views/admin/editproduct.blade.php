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
  <h2>Edit Product Category </h2>
  @if(Session::has('error'))
  <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
  @endif
          
  <form action="/productcontroller/update/{{$id}}" method="post" >
    @csrf
    @foreach($sel as $data)
   <div class="form-group">
    <label for="name">Product Name</label>
    <input type="text" class="form-control" id="productname" placeholder="Enter Product Name" value="{{$data->productname}}" name="productname">
    @if($errors->has('productname'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('productname')}}</label>
    @endif
    </div>
    <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="desc" placeholder="Enter Description" value="{{$data->desc}}" name="desc">
    @if($errors->has('desc'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('desc')}}</label>
    @endif
    </div>
    <div class="form-group">
    <label for="brand">Brand</label>
    <input type="text" class="form-control" id="brand" placeholder="Enter Brand" value="{{$data->brand}}" name="brand">
    @if($errors->has('brand'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('brand')}}</label>
    @endif
    </div>
    <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="number" class="form-control" id="quantity1" placeholder="Enter Quantity" value="{{$data->quantity1}}" name="quantity1">
    @if($errors->has('quantity1'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('quantity1')}}</label>
    @endif
    </div>
    <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" id="number" placeholder="Enter Price" value="{{$data->price}}" name="price">
    @if($errors->has('price'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('price')}}</label>
    @endif
    </div>
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" class="form-control" id="image1" placeholder="Enter Image" value="{{$data->image1}}" name="image1">
      @if($errors->has('image1'))
      <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('image1')}}</label>
      @endif
    </div>
    <div >
    <label for="category_id">Category Id</label>
    <select id="category_id" name="category_id">
    
    @foreach($cat as $data)
    <option value="{{$data->id}}">{{$data->title}}</option>
    @endforeach
    </select>
    
    @if($errors->has('category_id'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('category_id')}}</label>
   
    @endif
    </div>
    </br>
    
    @endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
</body>
</html>
