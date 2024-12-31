@extends('layouts.app')
@section('title','product detail')
@section('content')


<form method="post" action="{{url('product/update/' . $products->id)}}">
@method('put')
@csrf




<div class="container">
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
                <input type="text" class="form-control" name="status" value="{{$products->isActive}}"> 
                <br>
            </div>
            <div class="col-md-6">
                <lable class="form-label">Price</lable>
                <input type="text" class="form-control" name="status" value="{{$products->price}}"> 
                <br>
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