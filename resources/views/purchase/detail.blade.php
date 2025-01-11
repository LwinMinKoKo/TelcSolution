@extends('layouts.app')
@section('title','purchase detail')
@section('content')


<form method="post" action="{{url('purchase/update/'.$purchases->id)}}">
@method('put')
@csrf




<div class="container">

@if($errors->any())

    <div class="alert alert-warning">
        <ol>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ol>
    </div>

@endif
    <br>
    <div class="row" >
        <div class="col">  
            <h1 >Purchase Edit</h1>
        </div>
        
    </div>
  
    <div class= "row" >

    
<div class="col-md-6">
    <lable class="form-label">Customer Name</lable>
    <input type="text">
    <select class="form form-select" name="customer_id" id="customer_id">
        @foreach ($customers as $customer )
        <option value="{{$customer->id}}">
            {{$customer->name}}
        </option>
        @endforeach
    </select>
</div>

<div class="col-md-6">
    <lable class="form-label">Product Name</lable>
    <select class="form form-select" name="product_id" id="product_id">
        @foreach ($products as $product )
        <option value="{{$product['id']}}">
            {{$product['name']}}
        </option>
        @endforeach
    </select>

</div>

<div class="col-md-6">
    <lable class="form-label">Start Date </lable>
    <input type="date" class="form-control" name="start_date">
</div>


<div class="col-md-6">
    <lable class="form-label">End Date </lable>
    <input type="date" class="form-control" name="end_date">
</div>

<div class="col-md-6">
    <lable class="form-label">Service Months</lable>
    <select class="form form-select" name="service_months" id="service_months">
        @foreach ($servicemonths as $servicemonth )
        <option value="{{$servicemonth['desc']}}">
        {{$servicemonth['desc']}}
        </option>
        @endforeach
    </select>
    
</div>

<div class="col-md-6">
    <lable class="form-label">Payment Method</lable>
    <select class="form form-select" name="payment_method" id="payment_method">
        @foreach ($paymentmethods as $paymentmethod )
        <option value="{{$paymentmethod['pay_id']}}">
        {{$paymentmethod['desc']}}
        </option>
        @endforeach
    </select>
    
</div>

<div class="col-md-6">
    <lable class="form-label">Payment Terms </lable>
    <select class="form-select" name="payment_term">
    @foreach($paymentterms as $paymentterm)
    <option value="{{ $paymentterm['desc'] }}">
        {{ $paymentterm['desc'] }}
    </option>
    @endforeach
</select>
</div>

<div class="col-md-6">
    <lable class="form-label">Status </lable>
    <!-- <input type="remark" class="form-control" name="isActive"> -->
     <select class="form form-select" name="isActive" id="isActive">
        <option value="1">
            Active
        </option>
        <option value="2">
            Inactive
        </option>
     </select>
</div>


<div class="col-md-6">
    <lable class="form-label">Terminate </lable>
    <select class="form form-select" name="isTerminate" id="isTerminate">
        <option value="0">
            No
        </option>
        <option value="1">
            Terminate
        </option>
     </select>
</div>

<div class="col-md-6">
    <lable class="form-label">Terminate </lable>
    <select class="form form-select" name="isSuspend" id="isSuspend">
        <option value="0">
            No
        </option>
        <option value="1">
            Suspend
        </option>
     </select>
</div>

<div class="col-md-6">
    <lable class="form-label">Suspend Days </lable>
    <input type="integer" name="suspend_days" class="form form-control" min="1">
</div>

<div class="col-md-6">
    <lable class="form-label">Remark </lable>
    <input type="remark" class="form-control" name="remark">
</div>

</div>  



    <div class="row justify-content-md-center ">
        <div class="col-md-3">
            
            <button class="btn btn-success" type="submit" > Update</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </div>
        
    </div>
    <div class="row justify-content-md-center ">
        
        <div class="col-md-2">
               
               <br>
        <a href="/staff/dashboard"><h6>Staff Lists</h6></a>
        </div>
        
    </div>
   
</div>
</form>


@endsection