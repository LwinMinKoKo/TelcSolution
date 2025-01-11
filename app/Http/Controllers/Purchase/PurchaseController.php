<?php

namespace App\Http\Controllers\Purchase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Customer;
use App\Models\Product;

class PurchaseController extends Controller
{

    public function create()
    {
        return redirect('/purchase/create');
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
        // dd($request);
        $validator=validator($request->all(),[
            'customer_id'=>'required',
            'product_id'=>'required',
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
            // $purchase->isSuspend=$request->isSuspend;
            // $purchase->suspend_days=$request->suspend_days;
            $purchase->reamrk=$request->reamrk;
            $purchase->save();

            return redirect('purchase/dashboard')
            ->with('info','product service has been placed !');
        }
        
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
        return redirect('purchase/detail');
    }

    public function update(Request $request,$id)
    {
        $validator=validator($request->all(),
        [
            'customer_id'=>'required',
            'product_id'=>'required',
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

        $purchase=Purchase::find($id);
        $purchase->customer_id=$request->customer_id;
        $purchase->product_id=$request->product_id;
        $purchase->service_months=$request->service_months;
        $purchase->payment_method=$request->payment_method;
        $purchase->payment_term=$request->payment_term;
        $purchase->start_date=$request->start_date;
        $purchase->end_date=$request->end_date;
        $purchase->isActive=$request->isActive;
        $purchase->isTerminate=$request->isTerminate;
        $purchase->isSuspend=$request->isSuspend;
        $purchase->suspend_days=$request->suspend_days;
        $purchase->reamrk=$request->reamrk;
        $purchase->update();
        return redirect('purchase/dashboard')->with('successfully update !');
       }
       
        
    }
}
