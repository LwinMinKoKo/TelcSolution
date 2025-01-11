<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use App\Models\Staff;
use App\Models\Config;
use App\Models\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\TextUI\XmlConfiguration\Logging\TeamCity;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;

class CustomerController extends Controller
{ 
 
 public function create()
    {
      // dd(request());

      
      $validator=validator(request()->all(),[
        'customer_id'=>'required',
        'name'=>'required',
        'phone'=>'required',
        'email'=>'required',
        'isActive'=>'required',
        'house_no'=>'required',
        'street'=>'required',
        'ward'=>'required',
        'township'=>'required',
        'city'=>'required',
        'geo_location'=>'required',
        'staff_id'=>'required',
        'product_id'=>'required',
        

      ]);
      if($validator->fails())
      {
   
      
        return redirect('customer/create')->withErrors($validator);
    
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
        return redirect('customer/dashboard');
      }  

    }
    

    public function detail($id)
  {
        
        $data=Customer::find($id);
        $isactive=
        [
          ['status_id'=>'1','status_name'=>"Active"],
          ['status_id'=>'0','status_name'=>"InActive"],
        ];

        $staffs=Staff::all();
        $configs=Config::all()->where('isActive','=',1);
        $products=Product::all()->where('isActive','=',1);
        return view('customer/detail',
        ['customers'=>$data,'isacives'=>$isactive,'staffs'=>$staffs,'configs'=>$configs,'products'=>$products]);      
          
    }

    public function update(Request $request,$id)
    {      
        $validator=$request->validate(
          [
                'customer_id'=>'required',
                'name'=>'required',
                'phone'=>'required',
                'email'=>'required',
                'isActive'=>'required',
                'house_no'=>'required',
                'street'=>'required',
                'ward'=>'required',
                'township'=>'required',
                'city'=>'required',
                'geo_location'=>'required',
                'staff_id'=>'required',
                'product_id'=>'required',

        ]);
       
       
                  
              
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
  
     return redirect('customer/dashboard')->with("update Successully");
 
    }

    public function dashboard()
    {
        $data=Customer::latest()->paginate(5);
        return view('customer.dashboard',['customers'=>$data]);
    }


    public function delete($id)
    {
        $data=Customer::find($id);
        $data->delete();
        return back();
    }



    public function show()
    {
      print("Show function Controller Worked");
    }


    public function staffdata()
    {
      $data=Staff::all();
      $configs=Config::all();
      $products=Product::all();
      $cid=Customer::all();

      $isactive=
        [
          ['status_id'=>1,'status_name'=>"Active"],
          ['status_id'=>1,'status_name'=>"InActive"],
        ];
      return view('customer/create',
      ['staffs'=>$data,'isactives'=>$isactive,
      'configs'=>$configs,'products'=>$products,'cids'=>$cid]);

    }

  
}
