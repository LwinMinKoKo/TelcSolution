@extends('layouts.app')
@section('title','staff create')
@section('content')



<form method="post" >
@csrf

<div class="container">
@if($errors->any())
		<div class="alert alert-warning">
			
			<ol>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ol>

		</div>
@endif
    <br>
    <div class="row" >
        <div class="col">
            
        
            <h1 >Staff Create</h1>
        </div>
        
    </div>

        <div class= "row" >

    
            <div class="col-md-6">
                <lable class="form-label">Name</lable>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Email</lable>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Phone</lable>
                <input type="phone" class="form-control" name="phone" maxlength="11" minlength="11">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Designation </lable>
                <select class="form-select" name="designation">
                @foreach($designations as $designation)
				<option value="{{ $designation['desname'] }}">
					{{ $designation['desname'] }}
				</option>
				@endforeach
			</select>
            </div>
                        
            <div class="col-md-6">
                <lable class="form-label">Department </lable>
                <select class="form-select" name="department">
                @foreach($departments as $department)
				<option value="{{ $department['deptname'] }}">
					{{ $department['deptname'] }}
				</option>
				@endforeach
			</select>
            </div>

            <div class="col-md-6">
                <lable class="form-label">Remark </lable>
                <input type="remark" class="form-control" name="remark">
            </div>

        </div>  
       
    <div class="row-md-12">
        <lable class="form-label"> Address</lable>
        <input type="text" class="form-control" name="address">
        <br>
    </div> 
    

    <div class="row justify-content-md-center ">
        <div class="col-md-3">
               
            
            <button class="btn btn-success" type="submit"> Submit</button>
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