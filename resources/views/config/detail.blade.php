@extends('layouts.app')
@section('title','config detail')
@section('content')


<form method="post" action="{{url('config/update/'.$configs->id)}}">
@method('put')
@csrf




<div class="container">
@if($errors->any())

<div class="alert alert-warning">
    <ol>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ol>
</div>
@endif
<br>

    <div class="row" >
        <div class="col">
            
        
            <h1 >Config Edit</h1>
        </div>
        
    </div>
  
        <div class= "row" >

        <div class="col-md-6">
                <lable class="form-label">ID : Can't change</lable>
                <input type="text" class="form-control" name="id"
                value="{{$configs->id}}" readonly>
        </div>

        <div class="col-md-6">
                <lable class="form-label">Config Data</lable>
                <input type="text" class="form-control" name="configkey"
                value="{{$configs->configkey}}">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Name</lable>
                <input type="text" class="form-control" name="name"
                value="{{$configs->name}}"  >
            </div>

           
            <div class="col-md-6">
                <lable class="form-label">Description</lable>
                <input type="text" class="form-control" name="description"
                value="{{$configs->description}}" >
            </div>

            <div class="col-md-6">
                <lable class="form-label">Status</lable>
                <select class="form form-select" name="isActive" id="isActive" >
                    <option value="{{$configs->isActive}}">
                    @if ($configs->isActive==0)
                    Current : Inactive
                    @elseif($configs->isActive==1)
                    Current : Active
                    @else
                    Something Wrong ! 
                    @endif
                    <hr>
                    </option>
                    <option value="1" name="isActive" id="1">
                    Active
                    </option>
                    <option value="0" name="isActive" id="2">
                    Inactive
                    </option>
                </select>
               
            </div>
   

            <div class="col-md-6">
                <lable class="form-label">Remark </lable>
                <input type="text" class="form-control" name="remark"
                value="{{$configs->remark}}" >
            </div>

        </div>  

    <div class="row justify-content-md-center ">

        <div class="col-md-3">
            <br>
            <button class="btn btn-success" type="submit" > Update</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </div>
        
    </div>
    <div class="row justify-content-md-center ">
        
        <div class="col-md-2">
               
               <br>
        <a href="/config/dashboard"><h6>config Lists</h6></a>
        </div>
        
    </div>
   
</div>
</form>


@endsection