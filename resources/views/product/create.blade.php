@extends('layouts.app')
@section('title','Product create')
@section('content')



<form method="post">
@csrf

<div class="container">
@if ($errors->any())
<div class="alert alert-warning">
    <ol>
        @foreach ($errors->all() as $error )
        <li>{{$error}}</li>
        @endforeach 
    </ol>
</div>
@endif

  
    <div class="row" >
        <div class="col">
            
        
            <h1 >Product Create</h1>
        </div>
        
    </div>

        <div class= "row" >

    
            <div class="col-md-6">
                <lable class="form-label">Name</lable>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Bandwidth : MBps</lable>
                <input type="integer" class="form-control" name="bandwidth">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Promotion</lable>
                <input type="text" class="form-control" name="promotion">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Status</lable>
                <select name="isActive" id="isActive" class="form form-select">
                    <option value="1" name="isActive" >
                        Active
                    </option>
                    <option value="0" name="isActive" >
                        Inactive
                    </option>
                </select>

               <!-- <input type="integer" class="form-control" name="isActive"  min="0" max="1" > -->
                 
  
            </div>
            <div class="col-md-6">
                <lable class="form-label">Price </lable>

                <input type="text" class="form-control" name="price"   >
                 
  
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
        <a href="/product/dashboard"><h6>Product Lists</h6></a> 
        </div>
        
    </div>
   
</div>
</form>
@endsection