@extends('layouts.app')
@section('title','Customer create')
@section('content')



<form method="post" >
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
            
        
            <h1 >Customer Create</h1>
        </div>
        
    </div>

        <div class= "row" >

    
            <div class="col-md-6">
                <lable class="form-label">Customer ID</lable>
                <input type="text" class="form-control" name="customer_id">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Name</lable>
                <input type="name" class="form-control" name="name">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Phone</lable>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Status</lable>
                <input type="text" class="form-control" name="status">
            </div>
            <div class="col-md-6">
                <lable class="form-label">House No</lable>
                <input type="text" class="form-control" name="house_no">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Street</lable>
                <input type="text" class="form-control" name="street">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Ward</lable>
                <input type="text" class="form-control" name="ward">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Township</lable>
                <input type="text" class="form-control" name="township">
            </div>
            <div class="col-md-6">
                <lable class="form-label">City</lable>
                <input type="text" class="form-control" name="city">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Village Ward</lable>
                <input type="text" class="form-control" name="village_ward">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Village</lable>
                <input type="text" class="form-control" name="village">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Map Location</lable>
                <input type="text" class="form-control" name="geo_location">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Config ID</lable>
                <input type="text" class="form-control" name="config_id">
            </div>

          
            <div class="col-md-6">
                <lable class="form-label">Service Staff </lable>
                <select class="form-select" name="staff_id">
                @foreach($staffs as $staff)
				<option value="{{ $staff['id']}}">
                     {{$staff['name']}}
				</option>
                @endforeach
			</select>
            </div>

           


           

         
    

    <div class="row justify-content-md-center ">
        <div class="col-md-3">
               
            <br>
            <button class="btn btn-success" type="submit"> Submit</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </div>
        
    </div>
    <div class="row justify-content-md-center ">
        
        <div class="col-md-2">
               
               <br>
        <a href="/customer/dashboard"><h6>Customer Lists</h6></a>
        </div>
        
    </div>
   
</div>
</form>
@endsection