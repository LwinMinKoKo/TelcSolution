@extends('layouts.app')
@section('title','Collection Create')
@section('content')


<div class="container">
<a href="/collection/filesupload" class="btn btn-outline-primary" style="border-radius: 30px;">Batch Upload Here</a>


<form method="get" >
@csrf
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
            
        
            <h1 >Collection Create</h1>
        </div>
        
    </div>

        <div class= "row" >

    
            <div class="col-md-6">
                <lable class="form-label">Customer ID</lable>
                <input type="integer" class="form-control" name="customer_id" 
                value="" readonly>
            </div>

            <div class="col-md-6">
                <lable class="form-label">Terget Collection Months</lable>
                <input type="name" class="form-control" name="target_collection_month">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Target Collection Amount</lable>
                <input type="text" class="form-control" name="target_collection_amount">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Collected Month</lable>
                <input type="text" class="form-control" name="collected_month">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Collected Amount</lable>
                <input type="text" class="form-control" name="collected_amount">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Outstanding Balance</lable>
                <input type="text" class="form-control" name="active_balance">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Collected Date</lable>
                <input type="text" class="form-control" name="collected_date" maxlength="2" max="31">
            </div>
            
            <div class="col-md-6">
                <lable class="form-label">Collected Status</lable>
                <input type="text" class="form-control" name="collected_stautus">
            </div>
            <div class="col-md-6">
                <lable class="form-label">isActive ?</lable>
                <input type="integer" class="form-control" name="isActive">
            </div>
           
      



    <div class="row justify-content-md-center ">
        <div class="col-md-3" >
               
            <br>
            <button class="btn btn-success" type="submit"> Submit</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </div>
        
    </div>
    <div class="row justify-content-md-center ">
        
        <div class="col-md-2">
               
               <br>
        <a href="/collection/dashboard"><h6>Collection Lists</h6></a>
        </div>
        
    </div>
   
</div>
</form>
@endsection
</div>
