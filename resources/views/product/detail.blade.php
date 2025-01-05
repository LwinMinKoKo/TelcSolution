@extends('layouts.app')
@section('title','Product detail')
@section('content')


<form method="post" action="{{url('product/update/' . $products->id)}}">
@method('put')
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
    <br>
    <div class="row" >
        <div class="col">
            
        
            <h1 >Product Edit</h1>
        </div>
        
    </div>
 
  

        <div class= "row" >

            <div class="col-md-6">
                <lable class="form-label">ID : can't edit</lable>
                <input type="text" class="form-control" name="id" value="{{$products->id}}" readonly>
            </div>
            <div class="col-md-6">
                <lable class="form-label">Name</lable>
                <input type="text" class="form-control" name="name" value="{{$products->name}}" >
            </div>
            <div class="col-md-6">
                <lable class="form-label">Bandwidth</lable>
                <input type="text" class="form-control" name="bandwidth" value="{{$products->bandwidth}}" >
            </div>

            <div class="col-md-6">
                <lable class="form-label">Promotion</lable>
                <input type="text" class="form-control" name="promotion" value="{{$products->promotion}}">
            </div>
            <div class="col-md-6">
                <lable class="form-label">Status</lable>
                <!-- <input type="text" class="form-control" name="isActive" value="{{$products->isActive}}">  -->
                <select name="isActive" id="isActive" class="form form-select" value="{{$products->isActive}}">
                    <option value="1" name="isActive" >
                        Active
                    </option>
                    <option value="0" name="isActive" >
                        Inactive
                    </option>
                </select>
            </div>
            <div class="col-md-6">
                <lable class="form-label">Price</lable>
                <input type="text" class="form-control" name="price" value="{{$products->price}}"> 
                
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
        <a href="/product/dashboard"><h6>Product Lists</h6></a>
        </div>
        
    </div>
   
</div>
</form>


@endsection