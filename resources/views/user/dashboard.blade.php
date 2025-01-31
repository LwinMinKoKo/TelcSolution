@extends('layouts.app')
@section('title','User Data')


@section('content')

<div class="container">

@if(session('info'))
<div class="alert alert-info">
    {{session('info')}}
</div>



@endif

<table class="table table-bordered">

<a href="/register" class="btn btn-primary"> + Add new User</a><br><br>
  <h3>User Lists</h3><br>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">User Role</th>
            <th scope="col">isActive</th>
            <th scope="col">Action</th>
        </tr>      
    </thead>
    <tbody class="table-group-divider">
    @foreach ($users as $user )
    <tr>

        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            @foreach ($userrolelists as $userrolelist)
                @if ($user->role_id==$userrolelist['role_id'])
                {{$userrolelist['desc']}}
                @endif
            @endforeach
        </td>
        
        <td>
            @foreach ($isactives as $isactive )
                @if ($user->isActive == $isactive['status_id'] )
                {{$isactive['desc']}} 
            @endif
            @endforeach
        </td>
        

        
        <td>

            @can('update-all')
            <a class="btn btn-primary" href="/user/detail/{{$user->id}}">Detail</a>
            @endcan
            @can('delete-all')
            <a class="btn btn-danger" href="/user/delete/{{$user->id}}">Delete</a>
            @endcan
        </td>
      
    </tr>
    @endforeach
    </tbody>
</table>

</div>
@endsection