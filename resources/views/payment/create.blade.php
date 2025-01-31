@extends('layouts.app')
@section('title','Paymeent Create')
@section('content')



<form method="post"  >
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

@if(session('notify'))
<div class="alert alert-info">
    {{session('notify')}}
</div>


@endif

<h3>Make Payment</h3><br>

<div class="row" >
    <div class="col-md-12">
        <br><h5>Info : Readonly</h5><hr>
    </div>



        <div class="col-md-6">
            <lable class="form-label">Customer Name</lable>

            <select name="customer_id" class="form form-control" >
                <option value="{{$payments->customer_id}}">
                    @foreach ($customers as $customer )
                        @if($customer->id==$payments->customer_id)
                        {{$customer->name}} : {{$customer->customer_id}}
                        @endif
                    @endforeach
                </option>
            </select>

            <!-- <input type="integer" class="form-control" 
            value="
      
            " name="customer_id" readonly> -->
        </div>

        <div class="col-md-6">
            <lable class="form-label">Purchase ID</lable>
            <input type="integer" class="form-control" value="{{$payments->purchase_id}}" name="purchase_id" readonly>
            
        </div>

        <!-- <div class="col-md-6">
            <input type="text" class="form-control">
        </div> -->

        <div class="col-md-6">

            <label class="form-label">Installment ID</label>
            <input type="text"  class="form-control" value="{{$payments->id}}" name="installment_id"readonly>
        </div>
  

        <div class="col-md-6">

            <label class="form-label">Frequency : TermNo</label>
            <input type="text" class="form-control" value="{{$payments->installmentNo}}" name="installmentNo"readonly>
        </div>
         <div class="col-md-6">

            <label class="form-label">Target Months</label>
            <input type="text" class="form-control" value="{{$payments->target_collection_months}}" name="target_collection_months" readonly>
        </div>

        <div class="col-md-6">

            <label class="form-label">Due Date</label>
            <input type="text" class="form-control" value="{{$payments->due_date}}" id="dueDate" readonly>
        </div>

        <div class="col-md-6">

            <label class="form-label">Target Amount</label>
            <input type="integer" class="form-control" id='target_amount' name='target_collection_amount'
             value="{{$payments->amount_by_frequency}}" readonly>
        </div>

       <div class="col-md-12">
        <br><h5>Payment Info : </h5><hr>
       </div>
       
        <div class="col-md-6">
            <label class="form-label">Collected Months</label>
            <input type="date" class="form-control" name="collected_months" 
            id="collectedMonths" onchange="checkMonths()">
        </div>

        <div class="col-md-6">
            <label class="form-label">Collected Amount</label>
            <input type="integer" class="form-control" name="collected_amount" 
            onchange="calcActiveamount(),amountCheck()" id="collected_amount" >
        </div>
        
        <div class="col-md-6">
            <label class="form-label">Active Balance</label>
            <input type="integer"   class="form-control" name="active_balance" id="activeamount" readonly>
        </div>

        <div class="col-md-6">
            <label class="form-label">Collection Status</label>
            <select name="collected_status" id="collected_status" class="form form-select">
                @foreach ($configs as $config )
                @if ($config->name == 'TrueAndFalse')
                <option value="{{$config->configkey}}">
                    {{$config->description}}
                </option>
                @endif
               
                @endforeach
            </select>
            
        </div>
        
        <div class="col-md-6">
            <label class="form-label">isActive</label>
            <select name="isActive" id="isActive" class="form form-select">
                @foreach ($configs as $config )
                @if ($config->name=='isActive')
                <option value="{{$config->configkey}}">
                    {{$config->description}}
                </option>
                @endif
                @endforeach
            </select>
            
        </div>
        
       

        

 </div><!-- end of row -->    
        
            
        
            
        </div>
        
    </div>

        <div class= "row" >

    
           
       
        <div class="row justify-content-xl-center ">
            <div class="col-md-2">
                <br>
                <button class="btn btn-success"  type="submit"> Submit</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
            </div>
        </div>

        <div class="row justify-content-xl-center ">
        
            <div class="col-md-3"><br>
                <a href="/payment/dashboard">Payment Lists</a>  

                <a href="/installment/dashboard">Installment Lists</a>
            </div>
        </div>    

</form>




 <script>
        function calcActiveamount()
{
    var targetAmount=document.getElementById('target_amount').value;
    var collectedAmount=document.getElementById('collected_amount').value;
    var result=targetAmount - collectedAmount
    document.getElementById('activeamount').value=result;
   
}

 function amountCheck() 
 {
    var targetAmount=document.getElementById('target_amount').value;
    var collectedAmount=document.getElementById('collected_amount').value;

    if(targetAmount < collectedAmount)
    {
        alert('Collected Amount can not over Target amount ! Check your Collected Amount');
       
    }
}   


function checkMonths()

{
    var collectedMonths=document.getElementById('collectedMonths').value;
    var dueDate=document.getElementById('dueDate').value;

    if(collectedMonths>=dueDate)
        {
            alert('Payment overdue for this month, Extra Charge may apply');
        }

    else
    {

    }    
   
}



</script> 
 



@endsection