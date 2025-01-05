<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\TextUI\XmlConfiguration\Logging\TeamCity;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;

class CustomerController extends Controller
{ 
 public function create()
    {

      
      $validator=validator(request()->all(),[
        'customer_id'=>'required',
        'name'=>'required',
        'phone'=>'required',
        //'email'=>'required',
        'status'=>'required',
        'house_no'=>'required',
        'street'=>'required',
        'ward'=>'required',
        'township'=>'required',
        'city'=>'required',
        'village_ward'=>'required',
        'village'=>'required',
        'geo_location'=>'required',
        'staff_id'=>'required',
        'config_id'=>'required',

      ]);
      if($validator->fails())
      {
   
      
        return redirect('customer/create');
    
      }    
      else
      {
        $customer= new Customer;
        $customer->customer_id=request()->customer_id;
        $customer->name=request()->name;
        $customer->phone=request()->phone;
        // $customer->email=request()->email;
        $customer->status=request()->status;
        $customer->house_no=request()->house_no;
        $customer->street=request()->street;
        $customer->ward=request()->ward;
        $customer->township=request()->township;
        $customer->city=request()->city;
        $customer->village_ward=request()->village_ward;
        $customer->village=request()->village;
        $customer->geo_location=request()->geo_location;
        $customer->staff_id=request()->staff_id;
        $customer->config_id=request()->config_id;
        $customer->save();
        return redirect('customer/dashboard');
      }  

    }
    

    public function detail($id)
  {
        
        $data=Customer::find($id);
        $isactive=
        [
          ['status_id'=>1,'status_name'=>"Active"],
          ['status_id'=>1,'status_name'=>"InActive"],
        ];

        $staffs=Staff::all();
        return view('customer/detail',['customers'=>$data,'isacives'=>$isactive,'staffs'=>$staffs]);      
          
    }

    public function update(Request $request,$id)
    {      
    //     $validator=$request->validate([
    //           'id'=>'required',
    //           'name'=>'required',
    //           'email'=>'required',
    //           'phone'=>'required',
    //           'designation'=>'required',
    //           'department'=>'required',
    //           'remark'=>'required',
    //           'address'=>'required',

    //     ]);
       
       
                  
              
                    $customer=Customer::find($id);
                    $customer->customer_id=request()->customer_id;
                    $customer->name=request()->name;
                    $customer->phone=request()->phone;
                    // $customer->email=request()->email;
                    $customer->status=request()->status;
                    $customer->house_no=request()->house_no;
                    $customer->street=request()->street;
                    $customer->ward=request()->ward;
                    $customer->township=request()->township;
                    $customer->city=request()->city;
                    $customer->village_ward=request()->village_ward;
                    $customer->village=request()->village;
                    $customer->geo_location=request()->geo_location;
                    $customer->staff_id=request()->staff_id;
                    $customer->config_id=request()->config_id;
                    $result=$customer->update();
                    // dd($result);
                
    // if($result)
    // {
     return redirect('customer/dashboard')->with("update Successully");
    // }
       
    // else
    // {
    //   return back();
    // }
    //     //  print("update controller worked".$id);
    }

    public function dashboard()
    {
        $data=Customer::latest()->paginate(15);
        return view('customer.dashboard',['customers'=>$data]);
        // print("Customer Controller Worked !");
    }


    public function delete($id)
    {
        $data=Customer::find($id);
        // print($data->id);
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
      $isactive=
        [
          ['status_id'=>1,'status_name'=>"Active"],
          ['status_id'=>1,'status_name'=>"InActive"],
        ];
      return view('customer/create',['staffs'=>$data,'isactives'=>$isactive]);

    }

    // public function isactive()
    // {
    //   $isactive=
    //     [
    //       ['status_id'=>1,'status_name'=>"Active"],
    //       ['status_id'=>1,'status_name'=>"InActive"],
    //     ];
    //   return view('customer/create',['isactives'=>$isactive]) ;   
    // }
}
