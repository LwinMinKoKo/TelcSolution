@extends('layouts.app')
@section('title','Product Dashboard')

@section('content')
<div class="container">

	


	<!-- @if(session('info'))
	<div class="alert alert-info">
		{{ session('info') }}
	</div>
	@endif -->
  <a class="btn sm btn-primary" href="/product/create" > +  Add New Product</a><br><br>
<table class="table table-bordered">

  <thead>
   
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Bandwidth : MBps</th>
      <th scope="col">Promotion</th>
      <th scope="col">Status</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>

    </tr>
  </thead>

  
@foreach ($products as $product )



     <tbody>
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->bandwidth}}</td>
      <td>{{$product->promotion}}</td>
      <td>{{$product->isActive}}</td>
      <td>{{$product->price}}</td>
   
     <td><a class="btn sm btn-primary" href="/product/detail/{{$product->id}}">Edit</a>
     <a class="btn sm btn-danger" href="/product/delete/{{$product->id}}">Delete</a> 
    
    </td>
    
    </tr>
    
  </tbody>
  @endforeach

</table>

@endsection

