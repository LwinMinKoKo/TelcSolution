@extends('layouts.app')

@section('title','User Edit')

@section('content')

<div class="container">

<form  method="post">
@if ($errors->any())

<div class="alert alert-warning">
    <ul>
        @foreach ($errors as $error )
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
@method('put')    
@csrf

<div class="row">
    <div class="col-md-6">
    <lable class="form-label">User Name</lable>
    <input type="text" class="form-control" name="name"
    value="{{$userdetails->name}}">
    </div>


    <div class="col-md-6">
    <lable class="form-label">Email</lable>
    <input type="email" class="form-control" name="email"
    value="{{$userdetails->email}}">
    </div>

    <div class="col-md-6">
    <lable class="form-label">isActive</lable>
    <select name="isActive" id="isActive" class="form form-select">

    @if ($userdetails->isActive == 0)
    <option value="0">Current : Inactive</option>
    @elseif($userdetails->isActive == 1)  
    <option value="1">Current : Active</option>
  
    @endif
    <hr>
    @foreach ($configs as $config )
       <option value="{{$config->configkey}}">{{$config->description}}</option> 
    @endforeach 
    </select>
    </div>

    

    <div class="col-md-6">
    <lable class="form-label">User Role</lable>
    <select name="role_id" id="role_id" class="form form-select">

    @if ($userdetails->user_role == 0)
    <option value="0">Current : Admin</option>
    @elseif($userdetails->user_role == 1)  
    <option value="1">Current : Normal</option>
    @elseif($userdetails->user_role == 2)  
    <option value="1">Current : Manager</option>
    @endif
    <hr>
    @foreach ($configusrroles as $configusrrole )
       <option value="{{$configusrrole->configkey}}">{{$configusrrole->description}}</option> 
    @endforeach 
    </select>
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
        <a href="/user/dashboard"><h6>User Lists</h6></a>
        </div>
        
    </div>


</form>


</div>

@endsection