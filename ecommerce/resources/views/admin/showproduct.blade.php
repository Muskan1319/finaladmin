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
    <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                <td colspan="9" class="text-right">
                    <a href="{{url('addproduct')}}" class="btn btn-primary">Add Another</a>
                </td>
            </tr>
                  <tr>
                    <th>S. no.</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Brand</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Category Id</th>
                    <th>Image</th>
                    <th>Action</th>
                    </tr>
                  </thead>
<tbody>
                @php
                $sn=1;
                @endphp
                @foreach ($sel as $item)
        <tr>
          <td>{{$sn++}}</td>
          <td>{{$item->productname}}</td>
          <td>{{$item->desc}}</td>
          <td>{{$item->brand}}</td>
          <td>{{$item->quantity1}}</td>
          <td>{{$item->price}}</td>
          <td>{{$item->category_id}}</td>
         <td>
             <img src="{{('/uploads/'.$item->image1)}}" alt="" height="50" width="50">
         </td>
        <td>
            <a href="/productcontroller/delete/{{$item->id}}" class="btn-sm btn-danger">Delete</a>
            <a href="/productcontroller/edit/{{$item->id}}" class="btn-sm btn-primary">Edit</a>
        </td>
    </tr>
@endforeach
</tbody>
                    
                </table>
              </div>
              
            </div>
    @endsection
</body>
</html>