@extends('layouts.app')
@section('title','staff detail')
@section('content')


<form method="post" action="{{url('staff/update/'.$staffinfos->id)}}">
@method('put')
@csrf




<div class="container">
    <br>
    <div class="row" >
        <div class="col">
            
        
            <h1 >Staff Edit</h1>
        </div>
        
    </div>
  
        <div class= "row" >

            <div class="col-md-6">
                <lable class="form-label">ID : can't edit</lable>
                <input type="text" class="form-control" name="id" value="{{$staffinfos->id}}" readonly>
            </div>
            <div class="col-md-6">
                <lable class="form-label">Name </lable>
                <input type="text" class="form-control" name="name" value="{{$staffinfos->name}}" >
            </div>

            <div class="col-md-6">
                <lable class="form-label">Email</lable>
                <input type="email" class="form-control" name="email" value="{{$staffinfos->email}}">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Phone</lable>
                <input type="text" class="form-control" name="phone" value="{{$staffinfos->phone}}"> 
            </div>

            <div class="col-md-6">
                <lable class="form-label">Designation </lable>
                <!-- <input type="text" class="form-control" name="designation" value="{{$staffinfos->designation}}"> -->
                
                <select class="form-select" name="designation" value="{{$staffinfos->designation}}">
                @foreach($designations as $designation)
				<option value="{{ $designation['desname'] }}">
					{{ $designation['desname'] }}
				</option>
				@endforeach
			</select>
            </div>


            <div class="col-md-6">
                <lable class="form-label">Department</lable>
                <!-- <input type="text" class="form-control" name="department" value="{{$staffinfos->department}}"> -->
                <select class="form-select" name="department" value="{{$staffinfos->department}}">
                @foreach($departments as $department)
				<option value="{{ $department['deptname'] }}">
					{{ $department['deptname'] }}
				</option>
				@endforeach
			</select>
            </div>

            <div class="col-md-6">
                <lable class="form-label">Remark </lable>
                <input type="remark" class="form-control" name="remark" value="{{$staffinfos->remark}}">
            </div>

        </div>  
    <div class="row-md-12">
        <lable class="form-label"> Address</lable>
        <input type="text" class="form-control" name="address" value="{{$staffinfos->address}}">
        <br>
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