@extends('layouts.app')

@section('title','product purchase')

@section('content')
<div class="container">
{{ $purchases->links() }}
	@if(session('info'))
	<div class="alert alert-info">
		{{ session('info') }}
	</div>
	@endif
  <a class="btn sm btn-primary" href="/purchase/create" > + Add New Purchase</a><br><br>
  <!-- <div style="overflow-x:auto;"> -->
<table class="table table-bordered">

  <thead>
   
    <tr>
      <th scope="col">No</th>
      <th scope="col">Customer ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Product Name</th>
      <th scope="col">Service Activated at</th>
      <th scope="col">Service End at</th>
      <th scope="col">Total Service Month</th>
      <th scope="col">Payment Methods</th>
      <th scope="col">Payment Frequent</th>
      <th scope="col">isActive</th>
      <th scope="col">isSuspended</th>
      <th scope="col">Total Suspended Duation</th>
      <th scope="col">Remark</th>
      <th scope="col" colspan="2" >Action</th>
      
      

    </tr>
  </thead>

  @foreach($purchases as $purchase)


     <tbody>
    <tr>
      <th scope="row">{{$purchase->id}}</th>
      <td>{{$purchase->Customer->customer_id}}</td>
      <td>{{$purchase->Customer->name}}</td>
      <td>{{$purchase->Product->name}}</td>
      <td>{{$purchase->start_date}}</td>
      <td>{{$purchase->end_date}}</td>
      <td>{{$purchase->service_months}}</td>

      <td>
        @foreach ($paymentmethods as $paymentmethod )
        
        
        @if ($purchase->payment_method == $paymentmethod['pay_id'])
        {{$paymentmethod['desc']}}
        @endif
        @endforeach
        
      </td>
      <td>{{$purchase->payment_term}}</td>
      
       
      
      
      
      <td>
          @if ($purchase->isActive == 1)
          Active
          @else($purchase->isActive == 0)
          Inactive
          @endif
      </td>

      <td>
          @if($purchase->isSuspend == null)

          @elseif ($purchase->isSuspend == 1)
          Suspended
          @else($purchase->isActive == 0)
          No
          @endif
      </td>

      <td>{{$purchase->suspend_days}}</td>
      <td>{{$purchase->remark}}</td>

      <td >
        <a class="badge text-bg-success"href="/purchase/suspend/{{$purchase->id}}">Suspend</a>
       
     
      
        <a class="badge text-bg-danger" href="/purchase/ternimate/{{$purchase->id}}">Ternimate</a>     
       </td>
       <td>
        <a class="badge text-bg-primary" href="/collection/edit/">Collection</a>     
      
        <a class="badge text-bg-info" href="/purchase/detail/{{$purchase->id}}">Edit</a>     
      
      </td>

    </tr>
    
  </tbody>

@endforeach
</table>
</div>


@endsection