@extends('layouts.app')

@section('title','Collection Dashboard')

@section('content')


<div class="container">

@if(session('info'))
	<div class="alert alert-info">
		{{ session('info') }}
	</div>
@endif
  <a class="btn sm btn-primary" href="/collection/create" > + Add New Collection</a><br><br>



  <table class="table  table-responsive">

  <thead>
   
    <a>
      <th scope="col">No</th>
      <th scope="col">Customer</th>
      <th scope="col">Terget Collection Months</th>
      <th scope="col">Target Collection Amount</th>
      <th scope="col">Collected Months</th>
      <th scope="col">Collected Amount</th>
      <th scope="col">Outstanding Balance</th>
      <th scope="col">Collected Status</th>
      <th scope="col">Collected Date</th>
      <th scope="col">isActive ?</th>
     
      <th scope="col">Action</th>
    </tr>
  </thead>

  


     <tbody class="table-group-divider">

     @foreach($collections as $collection)
     
    <tr>
      <th scope="row">{{$collection->id}}</th>
   <td> <a href="/customer/dashboard/">{{$collection->customer_id}}</a></td>
      <td>{{$collection->installment  ->target_collection_months}}</td>
      <td>{{$collection->target_collection_amount}}</td> 
      <td>{{$collection->collected_month}}</td>
      <td>{{$collection->collected_amount}}</td>
      <td>{{$collection->active_balance}}</td>
      
      
      @if ($collection->collected_status == 1)
        <td>No</td> 
      @elseif($collection->collected_status == 2)
        <td>Collected</td>
      @else($collection->collected_status >2 )
        <td>Partial Payment</td>
      @endif
      <td>{{$collection->collected_date}}</td>
      <td>{{$collection->isActive}}</td>
     
      
     <td>

      <a class="btn  btn-primary" href="/collection/add-collection/{{$collection->id}}" style="border-radius:20px;">collect</a>
      <!-- <a class="btn  btn-danger" href="/collection/delete">Detail</a>  -->
    
    </td>
    
    </tr>
    
  </tbody>

@endforeach

</table>
{{ $collections->links() }}
@endsection

