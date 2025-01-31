@extends('layouts.app')
@section('title','Installment Dashboard')


@section('content')

<div class="container">

@if(session('info'))
    <div class="alert alert-info">
        {{session('info')}}
    </div>
@endif

<table class="table table-bordered">
<!-- <a href="/register" class="btn btn-primary"> + Add new installment</a><br><br> -->
  <h3>Installment Lists</h3><br>
  {{$installments->links()}}
    <thead>
        <tr>
            <th scope="col">Payment Status</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Installment ID</th>
            <th scope="col">Purchase ID</th>
            <th scope="col">Target Months</th>
            <th scope="col">Target Amount</th>
            <th scope="col">Installment Frequency</th>
        
            <th scope="col">Action</th>
        </tr>      
    </thead>

    <tbody class="table-group-divider">

    @foreach ($installments as $installment )
    
    <tr>
        <td>
            @foreach ($configs as $config)
            @if ($config->configkey == $installment->isPaid)
            {{$config->description}}
            @endif
            
            @endforeach
        </td>
        <td>
            @foreach ($customers as $customer )
            @if ($customer->id==$installment->customer_id)
            {{$customer->name}}
            
            @endif
            
            @endforeach
        </td>
        
        <td>{{$installment->id}}</td>
        <td>{{$installment->purchase_id}}</td>
        <td>{{$installment->target_collection_months}}</td>
        <td>{{$installment->amount_by_frequency}}</td>
        <td>{{$installment->installmentNo}}</td>
    

      
     
        
        
        <td>

            @can('update-all')
            <a class="btn btn-primary" href="/payment/create/{{$installment->id}}">Make Payment</a>
            @endcan

           
        </td>
      
    </tr> 
    @endforeach
    </tbody>
</table>

</div>
@endsection