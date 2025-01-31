<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use App\Models\Staff;
use App\Models\Config;
use App\Models\Product;

// use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\TextUI\XmlConfiguration\Logging\TeamCity;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;


class CustomerController extends Controller
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
        $data=Staff::all()->where('isActive','=','1');
        $configs=Config::all()->where('isActive','=','1');
        $products=Product::all()->where('isActive','=','1');
        $cid=Customer::all()->where('isActive','=','1');
  
      
        return view('customer/create',['staffs'=>$data,
        'configs'=>$configs,'products'=>$products,'cids'=>$cid]);
  
      }

      else
      {
        return back()->with('info',"You are not Authorized to create");
      }

     
    }

    public function detail($id)
    {
      $response=Gate::inspect('update-all');
  
        if($response->allowed())
        {
          
          $data=Customer::find($id);
          $isactive=
          [
            ['status_id'=>'1','status_name'=>"Active"],
            ['status_id'=>'0','status_name'=>"InActive"],
          ];
  
          $staffs=Staff::all()->where('isActive','=',1);
          $configs=Config::all()->where('isActive','=',1);
          $products=Product::all()->where('isActive','=',1);
          return view('customer/detail',
          ['customers'=>$data,'isacives'=>$isactive,'staffs'=>$staffs,'configs'=>$configs,'products'=>$products]);      
          
        }
        else
         {
            return back()->with('info',"You are not Authorized to Delete");
          }
      }
 public function store(Request $request)
    {
   
        $validator=validator($request->all(),
        [
          'customer_id'=>'required | integer',
          'name'=>'required',
          'phone'=>'required',
          'email'=>'required',
          'isActive'=>'required | integer',
          'street'=>'required',
          'ward'=>'required',
          'township'=>'required',
          'city'=>'required', 
          'staff_id'=>'required',
          'product_id'=>'required',
          
  
        ]);

        if($validator->fails())
        {
          return back()->withErrors($validator);
        }    
        else
        {
          $customer= new Customer;
          $customer->customer_id=request()->customer_id;
          $customer->name=request()->name;
          $customer->phone=request()->phone;
          $customer->email=request()->email;
          $customer->isActive=request()->isActive;
          $customer->house_no=request()->house_no;
          $customer->street=request()->street;
          $customer->ward=request()->ward;
          $customer->township=request()->township;
          $customer->city=request()->city;
          $customer->village_ward=request()->village_ward;
          $customer->village=request()->village;
          $customer->geo_location=request()->geo_location;
          $customer->staff_id=request()->staff_id;
          $customer->product_id=request()->product_id;
          $customer->save();
          return redirect('customer/dashboard')->with('info',"Customer has been created !");
        }  

    }

    public function update(Request $request,$id)
    {      
        $validator=validator($request->all(),
          [
                'customer_id'=>'required',
                'name'=>'required',
                'phone'=>'required',
                'email'=>'required',
                'isActive'=>'required',
                'street'=>'required',
                'ward'=>'required',
                'township'=>'required',
                'city'=>'required',
                'staff_id'=>'required',
                'product_id'=>'required',

        ]);

       if($validator->fails())
       {
          return back()->withErrors($validator);
       }
       else
       {

        $customer=Customer::find($id);
        $customer->customer_id=request()->customer_id;
        $customer->name=request()->name;
        $customer->phone=request()->phone;
        $customer->email=request()->email;
        $customer->isActive=request()->isActive;
        $customer->house_no=request()->house_no;
        $customer->street=request()->street;
        $customer->ward=request()->ward;
        $customer->township=request()->township;
        $customer->city=request()->city;
        $customer->village_ward=request()->village_ward;
        $customer->village=request()->village;
        $customer->geo_location=request()->geo_location;
        $customer->staff_id=request()->staff_id;
        $customer->product_id=request()->product_id;
        $customer->update();
        return redirect('customer/dashboard')->with('info',"update Successully");
       }
    }

    public function dashboard()
    {
        $data=Customer::latest()->paginate(5);
        return view('customer.dashboard',['customers'=>$data]);
    }


    public function delete($id)
    {
      $response=Gate::inspect('delete-all');

      if($response->allowed())
      {
        $data=Customer::find($id);
        $data->delete();
        return back()->with('info',"Deleted ! ");
      }

      else
      {
        return back()->with('info', "Not Authorized to Delete !");
      }
        
    }



    public function show()
    {
      print("Show function Controller Worked");
    }

}
