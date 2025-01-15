@extends('layouts.app')
@section('title','Staff Dashboard')

@section('content')
<div class="container">

	@if(session('info'))
	<div class="alert alert-info">
		{{ session('info') }}
	</div>
	@endif
  @auth
  @can('create-all')
  <a class="btn sm btn-primary" href="/staff/create" > +  Add New Staff</a><br><br>
  @endcan
  @endauth

  <h3>Staff Lists</h3>
  <table class="table table-bordered">

  <thead>
   
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Eamil</th>
      <th scope="col">Designation</th>
      <th scope="col">Phone</th>
      <th scope="col">isActive</th>
      <th scope="col">remark</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>

    </tr>
  </thead>

  @foreach($staffinfos as $staffinfo)


     <tbody>
    <tr>
      <th scope="row">{{$staffinfo->id}}</th>
      <td>{{$staffinfo->name}}</td>
      <td>{{$staffinfo->email}}</td>
      <td>{{$staffinfo->designation}}</td>
      <td>{{$staffinfo->phone}}</td>
      <td>
        @if ($staffinfo->isActive==0)
        Inactive
        @elseif($staffinfo->isActive==1)
        Active
        @else
        Something Worng !
        @endif
      </td>
      <td>{{$staffinfo->remark}}</td>
      <td>{{$staffinfo->address}}</td>
     <td>
      @can('update-all')
      <a class="btn sm btn-primary" href="/staff/detail/{{$staffinfo->id}}">Edit</a>
      @endcan
     @can('delete-all')
      <a class="btn sm btn-danger" href="/staff/delete/{{$staffinfo->id}}">Delete</a> 
    @endcan
    </td>
    
    </tr>
    
  </tbody>

@endforeach

</table>
{{$staffinfos->links()}}
@endsection

