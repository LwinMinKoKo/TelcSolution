@extends('layouts.app')
@section('title','Customer create')
@section('content')



<form method="post" >
@csrf
@if($errors->any())
		<div class="alert alert-warning">
			
			<ol>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ol>

		</div>
@endif
<div class="container">
    <br>
    <div class="row" >
        <div class="col">
            
        
            <h1 >Customer Create</h1>
            <br>
        </div>
        
    </div>
<div class="row">

<h4>Customer INFO : <hr> </h4>

</div>
        <div class= "row" >

    
            <div class="col-md-6">
                <lable class="form-label">Customer ID</lable>
                @foreach ($cids as $cid )

                @endforeach
                <input type="integer" class="form-control" name="customer_id" 
                min="777001" max="999999"  value="{{$cid->customer_id + 1}}" readonly>
            </div>

            <div class="col-md-6">
                <lable class="form-label">Name</lable>
                <input type="name" class="form-control" name="name">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Phone</lable>
                <input type="text" class="form-control" name="phone" maxlength="11">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Email</lable>
                <input type="email" class="form-control" name="email">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Status</lable>
                <!-- <input type="text" class="form-control" name="status"> -->
                 <select  class="form-select" name="isActive" id="isActive">
                    @foreach ($isactives as $isactive )
                    <option value="{{$isactive['status_id']}}">
                        {{$isactive['status_name']}}
                    </option>
                    @endforeach
                 </select>
            </div>

            <div class="col-md-6">
                <lable class="form-label">Service Staff </lable>
                <select class="form-select" name="staff_id">
                @foreach($staffs as $staff)
              
				<option value="{{ $staff['id']}}">
                     {{$staff['name']}}
				</option>
               
                @endforeach
			</select>
            </div>
            
            <div class="col-md-6">
                <lable class="form-label">Map Location</lable>
                <input type="text" class="form-control" name="geo_location">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Product Plan</lable>
                <!-- <input type="text" class="form-control" name="product_id"> -->
                 <select name="product_id" id="product_id" class="form form-select">
                 @foreach ($products as $product )
                 @if($product->isActive==1)
                 <option value="{{$product->id}}">
                    {{$product->name}}
                 </option>
                 @endif
                 @endforeach   
                 
                 </select>
                 <br>
                
            </div>

    
            
            
           
<div class="row">

<h4>Address : <hr> </h4>

</div>

            <div class="col-md-6">
                <lable class="form-label">House No</lable>
                <input type="text" class="form-control" name="house_no" id="houseno">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Street</lable>
                <input type="text" class="form-control" name="street">
            </div>

            <div class="col-md-6">
                <lable class="form-label">Ward</lable>
                <input type="integer" class="form-control" name="ward" >
            </div>



            <div class="col-md-6">
                <lable class="form-label">City</lable>
                <!-- <input type="text" class="form-control" name="city"> -->
                <select class="form form-select" name="city" value="city"
                id="city">
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
                <select class="form form-select" name="township" value="township"
                id="township">
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
                <select class="form form-select" name="village_ward" value="village_ward" id="villageward" disabled>
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
                <select class="form form-select" name="village" value="village" id="village" disabled>
                    @foreach ($configs as $config)
                    @if ($config->name === "Village" and $config->isActive==1)
                    <option value="{{$config->description}}">
                        
                        {{$config->description}} , {{$config->name}}

                    </option>
                    @endif
                    @endforeach
                 </select>
            </div>
            
            

          
           


    <div class="row justify-content-md-center ">
        <div class="col-md-3">
               
            <br>
            <button class="btn btn-success" type="submit"> Submit</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </div>
        
    </div>
    <div class="row justify-content-md-center ">
        
        <div class="col-md-2">
        
               <br>
        <a href="/customer/dashboard"><h6>Customer Lists</h6></a>
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
