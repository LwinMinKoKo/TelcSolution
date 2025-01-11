@extends('layouts.app')
@section('title','Customer Detail')
@section('content')


<form method="post" action="{{url('customer/update/'. $customers->id)}}">


<div class="container">
    @if ($errors->any())
    
        <ul>@foreach ($errors->all() as $error )</ul>
        <li>
            {{$error}}
        </li>
        
        @endforeach
    
    
    @endif
@method('put')
@csrf  
    <br>
    <div class="row" >
        <div class="col-md-6">
            <h1 >Customer Edit</h1>
            <br>
        </div>
    </div> 
<div class="row">

<h4>Customer INFO : <hr> </h4>

</div>
    <div class="row">  
        <div class="col-md-6">
        
            <lable class="form-label">Customer ID : ID can't Change</lable>
            <input type="text" class="form-control" name="customer_id" value="{{ $customers->customer_id }}" readonly>
        </div>

        <div class="col-md-6">
            <lable class="form-label">Name</lable>
            <input type="name" class="form-control" name="name" value="{{ $customers->name }}">
        </div>

        <div class="col-md-6">
            <lable class="form-label">Phone</lable>
            <input type="text" class="form-control" name="phone" value="{{ $customers->phone }}" maxlength="11">
        </div>

        <div class="col-md-6">
            <lable class="form-label">Email</lable>
            <input type="text" class="form-control" name="email" value="{{ $customers->email }}">
        </div>

        <div class="col-md-6">
            <lable class="form-label">Status</lable>
            <!-- <input type="text" class="form-control" name="customer_id" value="{{ $customers->customer_id }} ">
            -->
            <select class="form-select"  name="isActive" id="isActive" value="{{$customers->isActive}}">
            <option value="{{$customers->isActive}}">
                @if ($customers->isActive==1)
                Active
                @else($customers->isActive==0)
                Inactive
                @endif
          
            <hr>
            </option>
            @foreach ($isacives as $isacive )
           
            <option value="{{$isacive['status_id']}}">
                    {{$isacive['status_name']}}
                </option>
            @endforeach    
           
            </select>
        </div>
        <div class="col-md-6">
                <lable class="form-label">Service Staff  </lable>
                <select class="form-select" name="staff_id" id="staff_id"> 
                <option value="{{$customers->staff_id}}">
                    Current  : {{$customers->Staff->name}}
                    <hr>
                </option>     

                @foreach($staffs as $staff)
                <option value="{{$staff['id']}}">
                    {{$staff['name']}}
                </option>
                @endforeach
			</select>
        </div> 

        <div class="col-md-6">
            <lable class="form-label">Map Location</lable>
            <input type="text" class="form-control" name="geo_location" value="{{ $customers->geo_location }}">
        </div>
        <div class="col-md-6">
                <lable class="form-label">Product Plan</lable>
                <!-- <input type="text" class="form-control" name="product_id"> -->
                 <select name="product_id" id="product_id" class="form form-select">
                      
                 <option value="{{$customers->product_id}}">
                 {{$customers->Product->name}}
                </option>
                 @foreach ($products as $product )
                 <option value="{{$product->id}}">
                    {{$product->name}}
                 </option>
                 
                 @endforeach   
                 
                 </select>
                 <br>   
            </div>


            <div class="row">

<h4>Address : <hr> </h4>

</div>


        <div class="col-md-6">
            <lable class="form-label">House No</lable>
             <input type="text" class="form-control" name="house_no" value="{{ $customers->house_no }}">
        </div>

        <div class="col-md-6">
             <lable class="form-label">Street</lable>
             <input type="text" class="form-control" name="street" value="{{ $customers->street }}">
        </div>

        <div class="col-md-6">
            <lable class="form-label">Ward</lable>
            <input type="text" class="form-control" name="ward" value="{{ $customers->ward }}">
        </div>

        <div class="col-md-6">
                <lable class="form-label">City</lable>
               
                <select class="form form-select" name="city" value="{{$customers->city}}">
                    <option value="{{$customers->city}}">
                   Current : {{$customers->city}}, City
                    <hr>
                    </option>
                    @foreach ($configs as $config)
                    @if ($config->name==="City" and $config->isActive==1)
                    <option value="{{$config->description}}">
                        
                    {{$config->description}} , {{$config->name}}

                    </option>
                    @endif
                    @endforeach
                 </select>
                    
            </div>
            <div class="col-md-6">
                <lable class="form-label">Township</lable>
                <!-- <input type="text" class="form-control" name="township"> -->
                <select class="form form-select" name="township" value="township">
                <option value="{{$customers->township}}">
                   Current : {{$customers->township}}, Township
                    <hr>
                    </option>
                    @foreach ($configs as $config)
                    @if ($config->name==="Township" and $config->isActive==1)
                    <option value="{{$config->description}}">
                        
                        {{$config->description}} , {{$config->name}}

                    </option>
                    @endif
                    @endforeach
                 </select>
            </div>


<!-- checkbox start -->
<div class="row">
<div class="col-md-6">
    <br>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="switch" value="">
        <label class="form-check-label" for="flexSwitchCheckChecked">is Village ?</label>
    </div>
    <br>
</div>
</div>


<!-- checkbox end -->


            <div class="col-md-6">
                <lable class="form-label">Village Ward</lable>
                <!-- <input type="text" class="form-control" name="village_ward"> -->
                <select class="form form-select" name="village_ward" value="village_ward"
                id="villageward" disabled>
                <option value="{{$customers->village_ward}}">
                   Current : {{$customers->village_ward}} , Village Ward
                   <hr>
                    </option>
                    @foreach ($configs as $config)
                    @if ($config->name === "Village Ward" and $config->isActive==1)
                    <option value="{{$config->description}}">
                        
                        {{$config->description}} , {{$config->name}}

                    </option>
                    @endif
                    @endforeach
                 </select>
            </div>

            <div class="col-md-6">
                <lable class="form-label">Village</lable>
                <!-- <input type="text" class="form-control" name="village"> -->
                <select class="form form-select" name="village" value="village"
                id="village" disabled>
                  <option value="{{$customers->village}}">
                    Current : {{$customers->village}} , Village
                    <hr>
                    </option>
                    @foreach ($configs as $config)
                    @if ($config->name === "Village" and $config->isActive==1)
                    <option value="{{$config->description}}">
                        
                        {{$config->description}} , {{$config->name}}

                    </option>
                    @endif
                    @endforeach
                 </select>
            </div>
        
       
      

        <!-- <div class="col-md-6">
            <lable class="form-label">Config ID</lable>
            <input type="text" class="form-control" name="config_id" value="{{$customers->config_id}}">
        </div> -->

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
            <a href="/customer/dashboard"><h6>customer Lists</h6></a>
        </div>  
    </div>
</div>
</div>
</form>

<script>

    let checkbox = document.querySelector('input[type=checkbox]');
checkbox.addEventListener('change', function(){
   if(checkbox.checked==true) 
{
    document.getElementById('villageward').disabled = false; 
    document.getElementById('village').disabled = false;
}
if(checkbox.checked==false) 
{
    document.getElementById('villageward').disabled = true; 
    document.getElementById('village').disabled = true;
}
});



  
    
</script>
@endsection