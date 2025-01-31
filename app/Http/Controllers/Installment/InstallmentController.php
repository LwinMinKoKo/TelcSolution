<?php

namespace App\Http\Controllers\Installment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Installment;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Config;


class InstallmentController extends Controller
{
    public function dashboard()
    {
        $installments=Installment::paginate(7);
        $customers=Customer::all();
        $configs=Config::all()->where('isActive','=',1)
        ->where('name','=',"TrueAndFalse");
        return view('installment/dashboard',['installments'=>$installments,
        'customers'=>$customers,'configs'=>$configs]);
   
    }

    /** start make payment */

    // public function create($id)
    // {
    //     return view('payment/create');
    // }

    // public function store(Request $request, $id)
    // {
    //     $payments=new Payment;
    //     $payments->customer_id=$request->customer_id;
    //     $payments->installment_id=$request->installment_id;
    //     $payments->target_collection_months=$request->target_collection_months;
    //     $payments->target_collection_amount=$request->target_collection_amount;
    //     $payments->collected_months=$request->collected_months;
    //     $payments->collected_amount=$request->collected_amount;
    //     $payments->active_balance=$request->active_balance;
    //     $payments->collected_status=$request->collected_status;
    //     $payments->collected_date=$request->collected_date;
    //     $payments->isActive=$request->isActive;

    // }


    /** End make Payment */


}
