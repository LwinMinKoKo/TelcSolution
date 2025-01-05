@extends('layouts.app')

@section('title','Add Collection')

@section('content')

<div class="container">

<form method="post" >
@csrf
@if(session('info'))
	<div class="alert alert-info">
		{{ session('info') }}
	</div>
@endif
@if($errors->any())
		<div class="alert alert-warning">
			
			<ol>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ol>

		</div>
		@endif
<div class="container">
    <br>
    <div class="row" >
        <div class="col">
            
        
            <h1 >Add Collection</h1>
        </div>
        
    </div>

        <div class= "row" >

    
            <div class="col-md-6">
                <lable class="form-label">Customer ID</lable>
                <input type="text" class="form-control" name="customer_id" value="{{$collections->customer_id}}" readonly>
            </div>

            <div class="col-md-6">
                <lable class="form-label">Terget Collection Months</lable>
                <input type="name" class="form-control" name="target_collection_month"
                value="{{$collections->target_collection_month}}" readonly>
            </div>
            <div class="col-md-6">
                <lable class="form-label">Target Collection Amount</lable>
                <input type="text" class="form-control" name="target_collection_amount"
                value="{{$collections->target_collection_amount}}" readonly>
            </div>
            <div class="col-md-6">
                <lable class="form-label">Collected Month</lable>
                <input type="text" class="form-control" name="collected_month"
                value="{{$collections->collected_month}}" readonly>
            </div>

          
            <div class="col-md-6">
                <lable class="form-label">Collected Amount : Add Collect amount only</lable>
                <input type="number" class="form-control" name="collected_amount" 
                value="{{$collections->collected_amount}}" >
            </div>
          
            <div class="col-md-6">
                <lable class="form-label">Outstanding Balance</lable>
                <input type="text" class="form-control" name="active_balance"
                value="{{$collections->active_balance}}" readonly>
            </div>

            <div class="col-md-6">
                <lable class="form-label">Collected Date : Add date Only</lable>

                <input type="number" class="form-control" name="collected_date"  id='collected_date'
                 min="1" and max="31" value="{{$collections->collected_date}}">
            </div>
            
            <div class="col-md-6">
            <lable class="form-label">Collected Status</lable>
            <select class="form-select" name="collected_status"  id="collected_status" value="{{$collections->collected_status}}" >
                <!-- @foreach($colstatuss as $colstatus)
				<option value="{{$colstatus['colstaid']}}" >
				@if ($colstatus['colstaid'] > $collections->collected_status)
                {{$colstatus['desc']}}
                @endif
                 
               
				</option> 
				@endforeach -->
          
                @if ($collections->collected_status === 1  )
                    <option value="1">Not Collect ! </option>
                    <option value="2">Collected </option>
                    <option value="3">Partial Collection </option>
                
                @elseif($collections->collected_status ===2 )
                    <option value="2">Collected </option>
                   

                @else($collections->collected_status === 3 )
                    <option value="2">Collected </option>
                    <option value="3">Partial Collection </option>
                @endif
                
                
               
			</select>
            </div>
          
           
      



    <div class="row justify-content-md-center ">
        <div class="col-md-3" >
               
            <br>
            <button class="btn btn-success" type="submit"> Add Collection</button>
            <a href="/collection/dashboard" class="btn btn-info">Back</a>
        </div>
        
    </div>
    <div class="row justify-content-md-center ">
        
        <div class="col-md-2">
               
               <br>
        <!-- <a href="/collection/dashboard"><h6>Collection Lists</h6></a> -->
        </div>
        
    </div>
   
</div>
</form>

</div>

@endsection



