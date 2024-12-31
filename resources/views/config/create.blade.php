@extends('layouts.app')
@section('title','Config Create')
@section('content')



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
            
        
            <h1 >Config Create</h1>
        </div>
        
    </div>

        <div class= "row" >

        <div class="col-md-6">
                <lable class="form-label">Order ID</lable>
                <input type="text" class="form-control" name="order_id">
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
                <input type="text" class="form-control" name="status">
            </div>
   

            <div class="col-md-6">
                <lable class="form-label">Remark </lable>
                <input type="remark" class="form-control" name="remark">
            </div>

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
        <a href="/config/dashboard"><h6>Config Lists</h6></a>
        </div>
        
    </div>
   
</div>
</form>
@endsection