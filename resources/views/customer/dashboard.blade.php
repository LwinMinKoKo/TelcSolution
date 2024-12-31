@extends('layouts.app')
@section('title','Customer Dashboard')

@section('content')
<div class="container">

	


	<!-- @if(session('info'))
	<div class="alert alert-info">
		{{ session('info') }}
	</div>
	@endif -->
  <a class="btn sm btn-primary" href="/customer/create" >Add New Customer  +</a><br><br>

  <table class="table  table-responsive">

  <thead>
   
    <tr>
      <th scope="col">No</th>
      <th scope="col">Customer ID</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Service Staff</th>
      <th scope="col">Product</th>
      <th scope="col">Map</th>
      <th scope="col">Bandwidth</th>
      <th scope="col">Price</th>
      <!-- <th scope="col">Active Month</th>
      <th scope="col">Collection status</th>
      <th scope="col">Collection Months</th>
      <th scope="col">Target Collecttion Amount</th>
      <th scope="col">Collected Amount</th>
      <th scope="col">Balance Amount</th> -->
      <th scope="col">Address</th>
      <th scope="col">Action</th>

    </tr>
  </thead>

  @foreach($customers as $customer)


     <tbody>
    <tr>
      <th scope="row">{{$customer->id}}</th>
      <td>{{$customer->customer_id}}</td>
      <td>{{$customer->name}}</td>
      <td>{{$customer->Staff->name}}</td>
      <td>{{$customer->Staff->name}}</td><!-- product Nmae -->
      <td>{{$customer->geo_location}}</td>
      <td>{{$customer->phone}}</td>
      <td>{{$customer->phone}}</td>
      <!--<td>{{$customer->geo_location}}</td>Bandwidth
      <td>{{$customer->geo_location}}</td> Active Months  
      <td>{{$customer->Staff->name}}</td>Collection status  
      <td>{{$customer->customer_id}}</td>Collecton Months  
      <td>{{$customer->customer_id}}</td> Target Collection Amount 
      <td>{{$customer->customer_id}}</td>Collected Admount 
      <td>{{$customer->phone}}</td> Balance  -->
      <td>{{$customer->phone}}</td>
    
      <td>No : {{$customer->house_no}}, {{$customer->street}} Road, {{$customer->ward}} Ward, {{$customer->township}} Township,
          {{$customer->city}} City, {{$customer->village_ward}} Village Ward,  {{$customer->village}} Village
      </td>
     <td>
      
     
    
     
      <a class="btn  btn-primary" href="/customer/detail">Edit</a>
      <a class="btn  btn-danger" href="/customer/delete">Delete</a> 
    
    </td>
    
    </tr>
    
  </tbody>

@endforeach
</table>

@endsection

