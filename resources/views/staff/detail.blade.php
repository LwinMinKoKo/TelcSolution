@extends('layouts.app')
@section('title','staff detail')
@section('content')


<form method="post" action="{{url('staff/update/'.$staffinfos->id)}}">
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
            <h1 >Staff Edit</h1>
        </div>
        
    </div>
  
        <div class= "row" >

        <div class="col-md-6">
                <lable class="form-label">ID : can't edit</lable>
                <input type="text" class="form-control" name="id" value="{{$staffinfos->id}}" readonly>
            </div>

            <div class="col-md-6">
                <lable class="form-label">Name </lable>
                <input type="text" class="form-control" name="name" value="{{$staffinfos->name}}" >
            </div>

            <div class="col-md-6">
                <lable class="form-label">Email</lable>
                <input type="email" class="form-control" name="email" value="{{$staffinfos->email}}">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Phone</lable>
                <input type="text" class="form-control" name="phone" value="{{$staffinfos->phone}}" maxlength="11"> 
            </div>

            <div class="col-md-6">
                <lable class="form-label">Designation </lable>
                  <select class="form-select" name="designation">
                <option value="{{$staffinfos->designation}}">
                        Current : {{$staffinfos->designation}}
                    </option>
               
                @foreach($designations as $designation)
                
				<option value="{{ $designation['desname'] }}">
					{{ $designation['desname'] }}
				</option>
				@endforeach
			</select>
            </div>


            <div class="col-md-6">
                <lable class="form-label">Department</lable>
                <select class="form-select" name="department">
                    <option value="{{$staffinfos->department}}">
                        Current : {{$staffinfos->department}}
                    </option>
                @foreach($departments as $department)
    
				<option value="{{ $department['deptname'] }}">
					{{ $department['deptname'] }}
				</option>
				@endforeach
			</select>
            </div>


            <div class="col-md-6">
                <label  class="form-label">isActive</label>
                <select name="isActive" id="isActive" class="form form-select">
                <option value="{{$staffinfos->isActive}}">
                @if ($staffinfos->isActive == 0)
                        Current : Inactive
                    @elseif($staffinfos->isActive == 1)
                        Current : Active
                    @else
                    Something Wrong !
                    
                    @endif

                </option>  
                <option value="1">Active</option> 
                <option value="0">Inactive</option> 
                
                </select>
            </div>

            <div class="col-md-6">
                <lable class="form-label">Remark </lable>
                <input type="remark" class="form-control" name="remark" value="{{$staffinfos->remark}}">
            </div>

        
            <div class="row-md-12">
                <lable class="form-label"> Address</lable>
                <input type="text" class="form-control" name="address" value="{{$staffinfos->address}}">
                <br>
            </div> 

            <div class="row justify-content-md-center ">
                <div class="col-md-3">
                <button class="btn btn-success" type="submit" > Update</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
            </div>
            
            <div class="row justify-content-md-center "> 
            <div class="col-md-2">
                <br>
                <a href="/staff/dashboard"><h6>Staff Lists</h6></a>
            </div>
        </div>
        
    </div>
       
   
</div>
</form>
@endsection

