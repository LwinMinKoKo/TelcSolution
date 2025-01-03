@extends('layouts.app')
@section('title','Config Dashboard')

@section('content')
<div class="container">




	<!-- @if(session('info'))
	<div class="alert alert-info">
		{{ session('info') }}
	</div>
	@endif -->
  <a class="btn sm btn-primary" href="/config/create" >Add New Config  +</a><br><br>
<table class="table table-bordered">

  <thead>
   
    <tr>
      <th scope="col">No</th>
      <th scope="col">Order_ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th scope="col">remark</th>
      <th scope="col">CUS</th>
      <th scope="col">Action</th>

    </tr>
  </thead>

  @foreach($configs as $config)


     <tbody>
    <tr>
      <th scope="row">{{$config->id}}</th>
      <td>{{$config->order_id}}</td>
      <td>{{$config->name}}</td>
      <td>{{$config->description}}</td>
      <td>{{$config->isActive}}</td>
      @foreach ($config->Customer as $customer )     
      <td>{{$customer->name}}</td>
      @endforeach
      <td>{{$config->isActive}}</td>
  
     <td><a class="btn sm btn-primary" href="/config/detail">Edit</a>
     <a class="btn sm btn-danger" href="/config/delete">Delete</a> 
    
    </td>
    
    </tr>
    
  </tbody>

@endforeach
</table>

@endsection

