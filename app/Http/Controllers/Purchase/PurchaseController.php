<?php

namespace App\Http\Controllers\Purchase;

use Carbon\CarbonImmutable;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Config;
use App\Models\Installment;
// use App\Models\Payment;
use Illuminate\Support\Facades\Gate;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PurchaseController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth')->except(['dashboard']);
    }
  
    public function create()
    {
        $response=Gate::inspect('create-all');
        if($response->allowed())
        {
            
            return redirect('/purchase/create');
        }

        else
        {
            return back()->with('info', "You are not authourized to Create !");
        }
        
    }

    public function dataload()
    {
        $customers=Customer::all()->where('isActive','=',1);
        $products=Product::all()->where('isActive','=',1);
        $paymentmethods=
        [
            ['pay_id'=>'1','desc'=>'Cash'],
            ['pay_id'=>'2','desc'=>'Kpay'],
            ['pay_id'=>'3','desc'=>'Wave pay'],
            ['pay_id'=>'4','desc'=>'AYA pay'],
            ['pay_id'=>'5','desc'=>'Mobile banking'],
            ['pay_id'=>'6','desc'=>'MPU'],

        ];
        $servicemonths=
        [
            ['servm_id'=>'1','desc'=>'3'],
            ['servm_id'=>'2','desc'=>'6'],
            ['servm_id'=>'3','desc'=>'12'],
            ['servm_id'=>'4','desc'=>'24'],
           
        ];

        $paymentterms=
        [
            ['payterm'=>'1','desc'=>'1'],
            ['payterm'=>'2','desc'=>'3'],
            ['payterm'=>'3','desc'=>'6'],
            ['payterm'=>'4','desc'=>'12'],
           
        ];
        return view ('/purchase/create',
        ['customers'=>$customers,'products'=>$products,'paymentmethods'=>$paymentmethods
    ,'servicemonths'=>$servicemonths,'paymentterms'=>$paymentterms]);
    }


    public function store(Request $request)
    {

       
           
        $validator=validator($request->all(),
        [
            'customer_id'=>'required',
            'product_id'=>'required',
            'product_price'=>'required',
            'service_months'=>'required',
            'payment_method'=>'required',
            'payment_term'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'isActive'=>'required',
            

        ]);


        if($validator->fails())
        {
            return back()->withErrors($validator);
            
        }
       
        else
        {
 
            $purchase=new Purchase;
            $purchase->customer_id=$request->customer_id;
            $purchase->product_id=$request->product_id;
            $purchase->service_months=$request->service_months;
            $purchase->payment_method=$request->payment_method;
            $purchase->payment_term=$request->payment_term;
            $purchase->start_date=$request->start_date;
            $purchase->end_date=$request->end_date;
            $purchase->isActive=$request->isActive;
            $purchase->total_amount=$request->product_price * $request->service_months; // total amount
            $purchase->isSuspend=$request->isSuspend;
            $purchase->suspend_days=$request->suspend_days;
            $purchase->isTerminated=$request->isTerminated;
            $purchase->remark=$request->remark;
            $purchase->save(); 

        }
            
            /** for installment table */
            $carbondate=CarbonImmutable::now();
            if($request->payment_term == 1)
            {
                for( $i=0; $i < $purchase->service_months; $i++)
                {
                    $installment=new Installment;
                    $installment->customer_id=$request->customer_id;
                    $installment->purchase_id=$purchase->id;
                    $installment->amount_by_frequency=$purchase->total_amount / $purchase->service_months * $purchase->payment_term;
                    $installment->isPaid=0;
                    for($p=0;$p<=$i;$p++)
                    {
                        $installment->target_collection_months=$carbondate->endOfMonth()->addMonths($p)->addDays(-3);
                        $installment->due_date=$carbondate->startOfMonth()->addMonths($p)->addDays(12);
                        
                    }
                    
                    $installment->installmentNo=$i+1;
                    $installment->save();
                   
                   
                };
            }

            elseif ($request->payment_term == 3)
            {
                
                for( $i=0; $i < $purchase->service_months; $i+=3)
                {
                    $installment=new Installment;
                    $installment->customer_id=$request->customer_id;
                    $installment->purchase_id=$purchase->id;
                    $installment->amount_by_frequency=$purchase->total_amount / $purchase->service_months * $purchase->payment_term;
                    $installment->isPaid=0;
                    for($p=0;$p<=$i;$p++)
                    {
                        
                        $installment->target_collection_months=$carbondate->addMonths($p)->endOfMonth();
                        $installment->due_date=$carbondate->startOfMonth()->addMonths($p)->addDays(12);
                    }
                    
                    $installment->installmentNo=$i+3;
                    $installment->save();

                };

            }

            elseif ($request->payment_term == 6)
            {
                for( $i=0; $i < $purchase->service_months; $i+=6)
                {
                    $installment=new Installment;
                    $installment->customer_id=$request->customer_id;
                    $installment->purchase_id=$purchase->id;
                    
                    $installment->amount_by_frequency=$purchase->total_amount / $purchase->service_months * $purchase->payment_term;
                    $installment->isPaid=0;
                    for($p=0;$p<=$i;$p++)
                    {
                        $installment->target_collection_months=$carbondate->addMonths($p)->endOfMonth();
                        $installment->due_date=$carbondate->startOfMonth()->addMonths($p)->addDays(12);
                    }
                    
                    $installment->installmentNo=$i+6;
                    $installment->save();

                };
            }

            elseif ($request->payment_term == 12)
            {

                for( $i=0; $i < $purchase->service_months; $i+=12)
                {
                    $installment=new Installment;
                    $installment->customer_id=$request->customer_id;
                    $installment->purchase_id=$purchase->id;
                    
                    $installment->amount_by_frequency=$purchase->total_amount / $purchase->service_months * $purchase->payment_term;
                    $installment->isPaid=0;
                    for($p=0;$p<=$i;$p++)
                    {
                        $installment->target_collection_months=$carbondate->addMonths($p)->endOfMonth();
                        $installment->due_date=$carbondate->startOfMonth()->addMonths($p)->addDays(12);
                    }
                    
                    $installment->installmentNo=$i+12;
                    $installment->save();

                };
            }





        return redirect('purchase/dashboard')->with('info','Product service has been placed !');
      
        
    }


    public function dashboard()
    {
        $purchases=Purchase::where("isActive",'=', 1 )->latest()->paginate(5);
        $paymentmethods=
        [
            ['pay_id'=>'1','desc'=>'Cash'],
            ['pay_id'=>'2','desc'=>'Kpay'],
            ['pay_id'=>'3','desc'=>'Wave pay'],
            ['pay_id'=>'4','desc'=>'AYA pay'],
            ['pay_id'=>'5','desc'=>'Mobile banking'],
            ['pay_id'=>'6','desc'=>'MPU'],

        ];
        return view('purchase/dashboard',['purchases'=>$purchases,'paymentmethods'=>$paymentmethods]);
    }
  
    public function detail($id)
    {
        $response=Gate::inspect('update-all');

        if($response->allowed())
        {
            $purchases=Purchase::find($id);
            $configs=Config::all()->where('isActive','=','1');
            return view('purchase/detail',['purchases'=>$purchases,'configs'=>$configs]);
        }

        else
        {
            return back()->with('info', "You are not authourized to Update !");
        }
        
        
    }

    public function update(Request $request,$id)

    {
        $validator=validator($request->all(),[
        'customer_id'=>'required',
        'id'=>'required',
        'isSuspend'=>'required',
        'isTerminated'=>'required',
        'suspend_days'=>'required',

        

    ]);

    if($validator->fails())
    {
        return back()->withErrors($validator);
    }
    else
    {
        $purchase=Purchase::find($id);
        $purchase->customer_id=$request->customer_id;
        $purchase->id=$request->id;
        $purchase->isSuspend=$request->isSuspend;
        $purchase->suspend_days=$request->suspend_days;
        $purchase->isTerminated=$request->isTerminated;
        $purchase->remark=$request->remark;
        $purchase->update();
        
        return redirect('purchase/dashboard')->with('info','Successfully update !');
       }
       
        
    }
}
