@extends('layouts.app')
@section('title','purchase detail')
@section('content')


<form method="post" >

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

<div class="row">

<div class="col-md-6">
    <lable class="form-label">Customer ID & name</lable>
    <input class="form-control" type="integer" name="customer_id" value="{{$purchases->customer_id}}" hidden>
    <input class="form-control" type="integer" value="{{$purchases->customer->customer_id}} : {{ $purchases->customer->name}}" readonly>
</div>




<div class="col-md-6">
    <lable class="form-label">Purchase ID</lable>
    <input class="form-control" type="integer" name="id" value="{{$purchases->id}}" readonly>
</div>


<div class="col-md-6">
<lable class="form-label">isSuspend</lable>
    <select class="form form-select" name="isSuspend" id="isSuspend">

       <option value="{{$purchases->isSuspend}}">
            @if ($purchases->isSuspend == 0)
                No:Suspend
            @elseif ($purchases->isSuspend == 1)
                Suspend
            @else
                value null or Something Wrong !
            @endif
       </option>
       <hr>

       

        @foreach ($configs as $config )

            @if($config['name']=="isSuspend")

            <option value="{{$config['configkey']}}">

                {{$config['description']}}
        
            </option>

        @endif

        @endforeach
        
        
    </select>
    
</div>

<div class="col-md-6">
    <lable class="form-label">Total Suspend Days</lable>
    <input type="integer" class="form-control" name="suspend_days" min="0" max="30"
    value="{{$purchases->suspend_days}}">
</div>


<div class="col-md-6">
    
<lable class="form-label">isTerminate</lable>
    <select class="form form-select" name="isTerminated" id="isTerminated" value="{{$purchases->isTerminated}}">

        <option value="{{$purchases->isTerminated}}">

            @if($purchases->isTerminated==0)
                No: Terminate
            @elseif($purchases->isTerminated==1)
                Terminate
            @else
                null Value or Something Wrong !
            @endif
            </option>
            <hr>

        @foreach ($configs as $config )

        @if($config['name']=="isTerminate")

            <option value="{{$config['configkey']}}">
            
                {{$config['description']}}

            </option>
        @endif
        
        @endforeach
    </select>
    
</div>


<div class="col-md-6">
    <lable class="form-label">Remark </lable>
    <input type="remark" class="form-control" name="remark" value="{{$purchases->remark}}">
</div>

</div><!-- end of  input row -->
<br>
<div class="row">
<div class="row justify-content-md-center ">
        <div class="col-md-3">
            <button class="btn btn-success" type="submit" > Update</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </div>  
</div>

<div class="row justify-content-md-center ">
        <div class="col-md-2">
            <br>
            <a href="/purchase/dashboard"><h6>Purchase Lists</h6></a>

        </div>
        
 </div>
</div><!-- end of button row -->

</div><!-- end of div -->

</form>

@endsection

