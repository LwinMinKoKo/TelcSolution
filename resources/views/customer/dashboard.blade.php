@extends('layouts.app')
@section('title','Customer Dashboard')

@section('content')
<div class="container">
	@if(session('info'))
	<div class="alert alert-info">
		{{ session('info') }}
	</div>
	@endif
  <a class="btn sm btn-primary" href="/customer/create" > + Add New Customer</a><br><br>

<table class="table  table-responsive">

  <thead>
   
    <tr>
      <th scope="col">No</th>
      <th scope="col">Customer ID</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Service Staff</th>

      <th scope="col">Product</th>
     
      <th scope="col">Bandwidth : MBps</th>
      <th scope="col">Price</th>
      <th scope="col">Map</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
      <th scope="col"></th>

    </tr>
  </thead>

  @foreach($customers as $customer)


     <tbody>
    <tr>
      <th scope="row">{{$customer->id}}</th>
      <td>{{$customer->customer_id}}</td>
      <td>{{$customer->name}}</td>
      <td>{{$customer->phone}}</td>
      <td>{{$customer->Staff->name}}</td>
      <td>{{$customer->product->name}}</td>
      <td>{{$customer->Product->bandwidth}}</td>
      <td>{{$customer->Product->price}}</td>  
      <td>{{$customer->geo_location}}</td>

      <td>
        No : {{$customer->house_no}}, {{$customer->street}} Road, {{$customer->ward}} Ward,
        {{$customer->township}} Township, {{$customer->city}} City, {{$customer->village_ward}} Village Ward, 
        {{$customer->config->name}} Village
      </td>
      
      <!-- <td>
        No : {{$customer->house_no}}, {{$customer->street}} Road, {{$customer->ward}} Ward,
        {{$customer->township}} Township,{{$customer->city}} City, {{$customer->village_ward}} Village Ward, 
        {{$customer->Config->description}} Village
      </td> -->

      <td>
        <a class="btn sm btn-primary" href="/customer/detail/{{$customer->id}}">Edit</a>
      </td>  
     
      <td>
        <a class="btn sm btn-danger" href="/customer/delete/{{$customer->id}}">Delete</a>     
      </td>

    </tr>
    
  </tbody>

@endforeach
</table>
{{ $customers->links() }}
@endsection

