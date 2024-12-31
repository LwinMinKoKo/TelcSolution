<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Config;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Config\DataconfigController;

class StaffController extends Controller
{  

 public function configdata()
 {
  $designationData=[
    ['designation_id'=>'1','desname'=>"Bill Collector"],
    ['designation_id'=>'2','desname'=>"Junior Technician"],
    ['designation_id'=>'3','desname'=>"Senior Engineer"],
    ['designation_id'=>'4','desname'=>"Finance Manager"],
    ['designation_id'=>'5','desname'=>"Customer Support"],
    ['designation_id'=>'6','desname'=>" Senior Admin & HR"],
    ['designation_id'=>'7','desname'=>"Junior Accountant"],


  ];
  $deptData=[
    
        ['dept_id'=>'1','deptname'=>"Engineering"],
        ['dept_id'=>'2','deptname'=>"Finance "],
        ['dept_id'=>'3','deptname'=>"Customer Support"],
        ['dept_id'=>'4','deptname'=>"Admin & HR"],
        ['dept_id'=>'5','deptname'=>"Bill"],
    
      ];

  return view('staff/create',['designations'=>$designationData,'departments'=>$deptData]);
 }


 
  

 public function create()
    {

      // print("staff controller create worked !");
      $validator=validator(request()->all(),[

        'name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'designation'=>'required',
        'department'=>'required',
        'remark'=>'required',
        'address'=>'required',
        

      ]);
      if($validator->fails())
      {
        
        // print("fail");
        return view('staff.create');
      }    
        
                $staff= new Staff;
                $staff->config_id=1;
                $staff->name=request()->name;
                $staff->email=request()->email;
                $staff->phone=request()->phone;
                $staff->designation=request()->designation;
                $staff->department=request()->department;
                $staff->remark=request()->remark;
                $staff->address=request()->address;
                $staff->save();
            

        return redirect('staff/dashboard');
    
    }
    

    public function detail($id)
    {
        
        $data=Staff::find($id);
        $designationData=[
          ['designation_id'=>'1','desname'=>"Bill Collector"],
          ['designation_id'=>'2','desname'=>"Junior Technician"],
          ['designation_id'=>'3','desname'=>"Senior Engineer"],
          ['designation_id'=>'4','desname'=>"Finance Manager"],
          ['designation_id'=>'5','desname'=>"Customer Support"],
          ['designation_id'=>'6','desname'=>" Senior Admin & HR"],
          ['designation_id'=>'7','desname'=>"Junior Accountant"],
      
      
        ];
        $deptData=[
          
              ['dept_id'=>'1','deptname'=>"Engineering"],
              ['dept_id'=>'2','deptname'=>"Finance "],
              ['dept_id'=>'3','deptname'=>"Customer Support"],
              ['dept_id'=>'4','deptname'=>"Admin & HR"],
              ['dept_id'=>'5','deptname'=>"Bill"],
          
            ];
        return view('staff.detail',['staffinfos'=>$data,'designations'=>$designationData,'departments'=>$deptData]);      
          
    }
  

    public function update(Request $request,$id)
    {      
        $validator=$request->validate([
              'id'=>'required',
              'name'=>'required',
              'email'=>'required',
              'phone'=>'required',
              'designation'=>'required',
              'department'=>'required',
              'remark'=>'required',
              'address'=>'required',

        ]);
       
       
                  
              
                    $staff=Staff::find($id);
                    $staff->name=$request->name;
                    $staff->email=$request->email;
                    $staff->phone=$request->phone;
                    $staff->designation=$request->designation;
                    $staff->department=$request->department;
                    $staff->remark=$request->remark;
                    $staff->address=$request->address;
                    $result=$staff->update();
                
    if($result)
    {
      return redirect('staff/dashboard')->with("update Successully");
    }
       
    else
    {
      return back();
    }
        //  print("update controller worked".$id);
    }

    public function dashboard()
    {
        $data=Staff::latest()->paginate(15);
        return view('staff/dashboard',['staffinfos'=>$data]);
    }


    public function delete($id)
    {
        $data=Staff::find($id);
        $data->delete();
        return back();
    }



    public function show()
    {
      print("Show function Controller Worked");
    }
}
