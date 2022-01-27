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
  <h2>Product Management</h2>
  @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif
          
  <form action="sendproduct" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="productname">Product Name</label>
    <input type="text" class="form-control" id="productname" placeholder=" Enter Product Name" name="productname">
    @if($errors->has('productname'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('productname')}}</label>
    @endif
    </div>
    <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="desc" placeholder=" Enter Description" name="desc">
    @if($errors->has('desc'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('desc')}}</label>
    @endif
    </div>

    <div class="form-group">
    <label for="brand">Brand</label>
    <input type="text" class="form-control" id="brand" placeholder=" Enter Brand" name="brand">
    @if($errors->has('brand'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('brand')}}</label>
    @endif
    </div>

    <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="number" class="form-control" id="quantity1" placeholder=" Quantity" name="quantity1">
    @if($errors->has('quantity1'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('quantity1')}}</label>
    @endif
    </div>

    <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" id="price" placeholder="Price" name="price">
    @if($errors->has('price'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('price')}}</label>
    @endif
    </div>
    
    <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" id="image1"  name="image1">
    @if($errors->has('image1'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('image1')}}</label>
    @endif
    </div>

    <div>
    <label for="category_id">Category Id</label>
    <select id="category_id" name="category_id">
    @foreach($sel as $data)
    <option value="{{$data->id}}">{{$data->title}}</option>
    @endforeach
    </select>
    @if($errors->has('category_id'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('category_id')}}</label>
    @endif
    </div>

    <button type="submit" class="btn btn-info">Submit</button>
</form>
</body>
</html>
@endsection
