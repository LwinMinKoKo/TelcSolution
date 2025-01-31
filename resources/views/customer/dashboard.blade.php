@extends('layouts.app')
@section('title','Customer Dashboard')

@section('content')
<div class="container">
	@if(session('info'))
	<div class="alert alert-info">
		{{ session('info') }}
	</div>
	@endif
  @can('create-all')
  <a class="btn sm btn-primary" href="/customer/create" > + Add New Customer</a><br><br>
  @endcan
<table class="table">
<h3>Customer Lists</h3>
<br>
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
      <th scope="col">Status</th>
      <th scope="col">Address</th>
      @can('delete-all')
      <th scope="col" >Action</th>
      @endcan

    </tr>
  </thead>

  


     <tbody class="table-group-divider">

     @foreach($customers as $customer)
     
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
        @if ($customer->isActive == 0)
        Inactive
        @else($customer->isAcives == 1)
        Active

        @endif
      
      </td>

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
@can('update-all')
      <td>

        <a class="btn sm btn-primary" href="/customer/detail/{{$customer->id}}">Edit</a>
      </td> 
@endcan      
      
@can('delete-all')   
      <td>
        <a class="btn sm btn-danger" href="/customer/delete/{{$customer->id}}">Delete</a>     
      </td>
@endcan
    </tr>
    
  </tbody>

@endforeach
</table>
{{ $customers->links() }}
@endsection

