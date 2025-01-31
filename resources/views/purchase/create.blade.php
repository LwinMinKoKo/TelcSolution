@extends('layouts.app')
@section('title','service purchase')
@section('content')



<form method="post" >
@csrf

<div class="container">
@if($errors->any())
		<div class="alert alert-warning">
			
			<ol>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ol>

		</div>
@endif
    <br>
    <div class="row" >
        <div class="col">
            
        
            <h1 >Service Purchase</h1>
        </div>
        
    </div>

        <div class= "row" >

    
            <div class="col-md-6">
                <lable class="form-label">Customer Name</lable>
                <select class="form form-select" name="customer_id" id="customer_id">
                    @foreach ($customers as $customer )
                    <option value="{{$customer->id}}">
                        {{$customer->name}}
                    </option>
                    @endforeach
                </select>
            </div>

        
            <div class="col-md-6">
                <lable class="form-label">Product Name</lable>
                <select class="form form-select" name="product_id" id="product_id">
                    @foreach ($products as $product )
                    <option value="{{$product['id']}}" data-price="{{$product['price']}}">
                        {{$product['name']}} , {{$product['price']}} MMK
                    </option>
                    @endforeach
                </select>
            
            </div>

            <div class="col-md-6">
                <label class="form-label">Product Price</label>
                <input type="text" class="form-control" id="product_price" name="product_price" readonly> 
            </div>

            <!-- <div class="col-md-6">
                <lable class="form-label">Product Price</lable>
                <select class="form form-select" name="product_price" id="product_price">
                    @foreach ($products as $product )
                    <option value="{{$product['price']}}">
                   {{$product['name']}} , {{$product['price']}} 
                    </option>
                    @endforeach
                </select>
            
            </div> -->
         

            <div class="col-md-6">
                <lable class="form-label">Status </lable>
                <!-- <input type="remark" class="form-control" name="isActive"> -->
                 <select class="form form-select" name="isActive" id="isActive">
                    <option value="1">
                        Active
                    </option>
                    <option value="2">
                        Inactive
                    </option>
                 </select>
            </div>
            
            <div class="col-md-6">
                <lable class="form-label">Start Date </lable>
                <input type="date" class="form-control" name="start_date" id="StartDate">
            </div>
          
            <div class="col-md-6">
                <lable class="form-label">End Date </lable>
                <input  onmouseleave="DayCount()" type="date" class="form-control" name="end_date" id="EndDate">
            </div>
          
            <div class="col-md-6">
                <lable class="form-label">Service Total days </lable>
                <input type="text" class="form-control" name="total_days" id="dayresult"  readonly>
            
           </div>

           <div class="col-md-6">
                <lable class="form-label">Service Months</lable>
                <input type="text" class="form-control" name="service_months" id="monthresult"  readonly>
            
           </div>

            <!-- <div class="col-md-6">
                <lable class="form-label">Service Months</lable>
                <select class="form form-select" name="service_months" id="service_months">
                    @foreach ($servicemonths as $servicemonth )
                    <option value="{{$servicemonth['desc']}}">
                    {{$servicemonth['desc']}}
                    </option>
                    @endforeach
                </select>
                
            </div> -->

            <div class="col-md-6">
                <lable class="form-label">Payment Method</lable>
                <select class="form form-select" name="payment_method" id="payment_method">
                    @foreach ($paymentmethods as $paymentmethod )
                    <option value="{{$paymentmethod['pay_id']}}">
                    {{$paymentmethod['desc']}}
                    </option>
                    @endforeach
                </select>
                
            </div>

            <div class="col-md-6">
                <lable class="form-label">Payment Terms </lable>
                <select class="form-select" name="payment_term">
                @foreach($paymentterms as $paymentterm)
				<option value="{{ $paymentterm['desc'] }}">
					{{ $paymentterm['desc'] }}
				</option>
				@endforeach
			</select>
            </div>

         
            
 
         
        

            <div class="col-md-6">
                <lable class="form-label">Remark </lable>
                <input type="text" class="form-control" name="remark">
            </div>

            <div class="col-md-6">
             
             <input type="integer" class="form-control" name="isSuspend" value="0" hidden>
             <input type="integer" class="form-control" name="suspend_days" value="0" hidden>
             <input type="integer" class="form-control" name="isTerminated" value="0" hidden>
    

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
        <a href="/purchase/dashboard"><h6>Purchase Lists</h6></a>
        </div>
        
    </div>
   
</div>
</form>




<script>
 function DayCount() {
  var startdate = document.getElementById('StartDate').value;
  var enddate = document.getElementById('EndDate').value;

  // Parse the dates using the Date object
  var startDate = new Date(startdate);
  var endDate = new Date(enddate);

  // Calculate the difference in milliseconds
  var millisecondsPerDay = 24 * 60 * 60 * 1000; // Number of milliseconds in a day
  var timeDiff = endDate.getTime() - startDate.getTime();

  // Calculate the number of days
  var dayCount = Math.ceil( timeDiff / millisecondsPerDay); 
 
    //Change to months
    var changeMonth = dayCount;
    var monthCount =changeMonth / 365 * 12;

  document.getElementById('dayresult').value = dayCount;
  document.getElementById('monthresult').value = monthCount.toFixed(0);

  }

 // Get references to the select and input elements
 const productSelect = document.getElementById('product_id');
    const productPriceInput = document.getElementById('product_price');

    // Event listener for the select element's change event
    productSelect.addEventListener('change', function() {
        // Get the selected option
        const selectedOption = productSelect.options[productSelect.selectedIndex];

        // Get the price from the data-price attribute
        const productPrice = selectedOption.getAttribute('data-price'); 

        // Update the input field with the price
        productPriceInput.value = productPrice; 
    }); 

</script>




@endsection