@extends('layouts.app')
@section('title','Config Create')
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
            
        
            <h3 >Config Create</h3>
        </div>
        
    </div>

        <div class= "row" >

        <div class="col-md-6">
                <lable class="form-label">Config Data</lable>
                <input type="text" class="form-control" name="configkey">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Name</lable>
                <input type="text" class="form-control" name="name">
            </div>



           
            <div class="col-md-6">
                <lable class="form-label">Description</lable>
                <input type="text" class="form-control" name="description">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Status</lable>
                <select class="form form-select" name="isActive" id="isActive">
                    <option value="1" name="isActive" id="1">
                    Active
                    </option>
                    <option value="1" name="isActive" id="2">
                    Inactive
                    </option>
                </select>
                <!-- <input type="text" class="form-control" name="isActive"> -->
            </div>
   

            <div class="col-md-6">
                <lable class="form-label">Remark </lable>
                <input type="text" class="form-control" name="remark">
            </div>

        </div>  

    <div class="row justify-content-md-center ">
        <div class="col-md-3">
               
            <br>
            <button class="btn btn-success" type="submit"> Submit</button>
            <button class="btn btn-secondary" type="reset">Clear</button>
        </div>
        
    </div>
    <div class="row justify-content-md-center ">
        
        <div class="col-md-2">
               
               <br>
        <a href="/config/dashboard"><h6>Config Lists</h6></a>
        </div>
        
    </div>
   
</div>
</form>
@endsection