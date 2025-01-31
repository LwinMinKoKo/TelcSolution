@extends('layouts.app')
@section('title','Payment Dashboard')


@section('content')
<div class="container">

@if(session('info'))
<div class="alert alert-info">
  {{session('info')}}
</div>


@endif


<h3>Payment Lists </h3><br>

{{$payments->links()}}

<table class="table table-bordered">

  <thead>
   
    <tr>
      <th scope="col">No</th>
      <th scope="col">Customer ID & Name</th>
      <th scope="col">Installment ID</th>
      <th scope="col">Purchase ID</th>  
      <th scope="col">Collected Months</th> 
      <th scope="col">Target Collection Amount</th>
      <th scope="col">Collected Amount</th> 
      <th scope="col">Active Balance </th>
      <!-- <th scope="col">Collected Status</th>   -->
    

    </tr>
  </thead>

  


  <tbody class="table-group-divider">
@foreach ($payments as $payment )


    <tr>
        <td>{{$payment->id}}</td>
        <td>
          @foreach ($customers as $customer )
          @if ($payment->customer_id == $customer->id)
          {{$customer->name}} : {{$customer->customer_id}}
          @endif
          @endforeach
          
        </td>
        <td>{{$payment->purchase_id}}</td>   
        <td>{{$payment->installment_id}}</td>
        <td>{{$payment->collected_months}}</td>
        <td>{{$payment->target_collection_amount}}</td>  
        <td>{{$payment->collected_amount}}</td>
        
        <td>{{$payment->active_balance}}</td>
        <!-- <td>{{$payment->collected_status}}</td> -->
      
        
    
   

        <!-- <td>
            <a class="btn sm btn-primary" href="/product/detail">Edit</a>

            <a class="btn sm btn-danger" href="/product/delete">Delete</a> 

        </td> -->
    
    </tr>

  </tbody>

  @endforeach
</table>

@endsection

