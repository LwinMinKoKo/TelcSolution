@extends('layouts.app')
@section('title','Customer Detail')
@section('content')


<form method="post" action="{{url('customer/update/'. $customers->id)}}">


<div class="container">
@method('put')
@csrf  
    <br>
    <div class="row" >
        <div class="col-md-6">
            <h1 >Customer Edit</h1>
        </div>
    </div> 
    <div class="row">  
        <div class="col-md-6">
        
            <lable class="form-label">Customer ID : ID can't Change</lable>
            <input type="text" class="form-control" name="customer_id" value="{{ $customers->customer_id }}" readonly>
        </div>

        <div class="col-md-6">
            <lable class="form-label">Name</lable>
            <input type="name" class="form-control" name="name" value="{{ $customers->name }}">
        </div>

        <div class="col-md-6">
            <lable class="form-label">Phone</lable>
            <input type="text" class="form-control" name="phone" value="{{ $customers->phone }}">
        </div>

        <div class="col-md-6">
            <lable class="form-label">Email</lable>
            <input type="text" class="form-control" name="email" value="{{ $customers->email }}">
        </div>

        <div class="col-md-6">
            <lable class="form-label">Status</lable>
            <!-- <input type="text" class="form-control" name="customer_id" value="{{ $customers->customer_id }} ">
            -->
            <select class="form-select"  name="status" id="status" >
            
            @foreach ($isacives as $isacive )
            <option value="{{$isacive['status_name']}}">
                    {{$isacive['status_name']}}
                </option>
            @endforeach    
           
            </select>
        </div>

        <div class="col-md-6">
            <lable class="form-label">House No</lable>
             <input type="text" class="form-control" name="house_no" value="{{ $customers->house_no }}">
        </div>

        <div class="col-md-6">
             <lable class="form-label">Street</lable>
             <input type="text" class="form-control" name="street" value="{{ $customers->street }}">
        </div>

        <div class="col-md-6">
            <lable class="form-label">Ward</lable>
            <input type="text" class="form-control" name="ward" value="{{ $customers->ward }}">
        </div>

        <div class="col-md-6">
            <lable class="form-label">Township</lable>
            <input type="text" class="form-control" name="township" value="{{ $customers->township }}">
        </div>

        <div class="col-md-6">
            <lable class="form-label">City</lable>
            <input type="text" class="form-control" name="city" value="{{ $customers->city }}">
        </div>

        <div class="col-md-6">
            <lable class="form-label">Village Ward</lable>
            <input type="text" class="form-control" name="village_ward" value="{{ $customers->village_ward }}">
        </div>

        <div class="col-md-6">
            <lable class="form-label">Village</lable>
             <input type="text" class="form-control" name="village" value="{{ $customers->village }}">
         </div>
            
         <div class="col-md-6">
            <lable class="form-label">Map Location</lable>
            <input type="text" class="form-control" name="geo_location" value="{{ $customers->geo_location }}">
        </div>

        <div class="col-md-6">
                <lable class="form-label">Service Staff </lable>
                <select class="form-select" name="staff_id" id="staff_id">
                @foreach($staffs as $staff)
				<option value="{{$staff['id']}}">
                     {{$staff['id']}}
				</option>
                @endforeach
			</select>
        </div>

        <div class="col-md-6">
            <lable class="form-label">Config ID</lable>
            <input type="text" class="form-control" name="config_id" value="{{$customers->config_id}}">
        </div>

        <div class="row justify-content-md-center ">
        <div class="col-md-3">
            <br><br>
            <button class="btn btn-success" type="submit" > Update</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </div>
        
    </div>

    <div class="row justify-content-md-center ">
        <div class="col-md-2">
            <br>
            <a href="/customer/dashboard"><h6>customer Lists</h6></a>
        </div>  
    </div>
</div>
</div>
</form>

@endsection