@extends('layouts.app')
@section('title','Product Dashboard')


@section('content')
<div class="container">

@if(session('info'))
<div class="alert alert-info">
  {{session('info')}}
</div>


@endif
@can('create-all')
	  <a class="btn sm btn-primary" href="/product/create" > +  Add New Product</a><br><br>
@endcan

<h3>Product Lists </h3>
    <table class="table table-bordered">

  <thead>
   
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Bandwidth : MBps</th>
      <th scope="col">Promotion</th>
      <th scope="col">Status</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>

    </tr>
  </thead>

  


  <tbody class="table-group-divider">
 
    <tr>
    @foreach ($products as $product )
    
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->bandwidth}}</td>
      <td>
        @foreach ($configs as $config )
        @if ($config->name=="Promotion" and
         $config->configkey==$product->promotion_id )
        {{$config->description}}
        @endif
        
        @endforeach
      
    </td>
      <td>
        @if ($product->isActive==0)
        Inactive
        @elseif($product->isActive==1)
        Active
        @else
        Something Wrong !
        @endif
      </td>
      <td>{{$product->price}}</td>
   @can('update-all')
     <td><a class="btn sm btn-primary" href="/product/detail/{{$product->id}}">Edit</a>
  @endcan
  
  @can('delete-all')   
     <a class="btn sm btn-danger" href="/product/delete/{{$product->id}}">Delete</a> 
  @endcan
    </td>
    
    </tr>

  </tbody>
  @endforeach

</table>
{{ $products->links() }}
@endsection

