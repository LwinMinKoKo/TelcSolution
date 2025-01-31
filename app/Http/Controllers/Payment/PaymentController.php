<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Payment;
use App\Models\Installment;
use App\Models\Customer;
use App\Models\Config;
use Carbon\Carbon;

class PaymentController extends Controller
{
  

    public function create($id)
    {
        $payments=Installment::find($id);
        $customers=Customer::all()->where('isActive','=','1');
        $configs=Config::all()->where( 'isActive','=','1');
        return view('payment/create',['payments'=>$payments,
        'customers'=>$customers,'configs'=>$configs]);
   
        
    }
    public function store(Request $request, $id)

    {
        
        $installments=Installment::find($id);

           //dd($installments);
           
        $validator=validator($request->all(),
        [
            'customer_id'=>'required',
            'installment_id'=>'required',
            'target_collection_months'=>'required',
            'target_collection_amount'=>'required',
            'collected_months'=>'required',
            'collected_amount'=>'required',
            'active_balance'=>'required',
            'collected_status'=>'required',
            'isActive'=>'required',
           


        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }
        else
        {
            $payments=new Payment;
            $payments->customer_id=$request->customer_id;
            $payments->installment_id=$request->installment_id;
            $payments->purchase_id=$request->purchase_id;
            $payments->target_collection_months=$request->target_collection_months;
            $payments->target_collection_amount=$request->target_collection_amount;
           
            if($request->collected_amount <= $request->target_collection_amount)
            {
                $payments->collected_amount=$request->collected_amount;
            }
            else
            {
                return back()->with('notify',"Collected Amount can't be over Target Amount");
            }

           
            if($request->active_balance >= 0)
            {
                $payments->active_balance=$request->target_collection_amount- $request->collected_amount;
            }
            else
            {
               
                return back()->with('notify',"Collected Amount can not over Target amount ! Check your Collected Amount");
                 
            }


              $pmonth=Carbon::parse($request->collected_months)->format('Y-m');
              $imonth=Carbon::parse($installments->target_collection_months)->format('Y-m');
                
               
            if($pmonth == $imonth)
            {
                if($payments->collected_months <= $installments->due_date)
                {
                    //fine charges or
                    $payments->collected_months=$request->collected_months;
                   
                    
                }
    
                else
                {
                    $payments->collected_months=$request->collected_months;
                }

            }
            else
            {
               return back()->with('notify',"Collected Months must be the same with Target Collected Months");
            }

            
            if($request->isActive == 1)
            {
                $payments->isActive=$request->isActive;
            }
            else
            {
                return back()->with('notify',"Status must Active, please check  again !");
            }
            if($request->collected_status == 1)
            {
                $payments->collected_status=$request->collected_status;
            }
            else
            {
                return back()->with('notify',"Collected Status must Active, please check  again !");
            }
            
            
           
    /** Installment's paid status change */
            if($installments->isPaid == 1)
            {
                return back()->with('notify',"Already make Payment");
            }
            else
            {
                $installments->isPaid=1;
                $installments->update();
                $payments->save();
            }

           

            return redirect('installment/dashboard')->with('info',"Payment Successful !");

        }


       

    }




    

    public function dashboard()
    {
        $payments=Payment::latest()->paginate(7);
        $customers=Customer::all()->where('isActive','=',1);
        return view('payment/dashboard',['payments'=>$payments,'customers'=>$customers]); 
    }




    


  
}
