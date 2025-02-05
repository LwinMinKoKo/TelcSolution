<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Config;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Config\DataconfigController;
use Illuminate\Support\Facades\Gate;
use App\Models\Policies\CustomerPolicy;

class StaffController extends Controller
{  
  public function __construct()
  {
    $this->middleware('auth');
  }

 
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
      Gate::authorize('create-all');
   
      $validator=validator(request()->all(),
      [

        'name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'designation'=>'required',
        'department'=>'required',
        'remark'=>'required',
        'address'=>'required',
        'isActive'=>'required',
        // 'user_id'=>'required',
        

      ]);
      if($validator->fails())
      {
        return back()->withErrors($validator);
      }    
        
      else
      {
                $staffs= new Staff;
                $staffs->name=request()->name;
                $staffs->email=request()->email;
                $staffs->phone=request()->phone;
                $staffs->designation=request()->designation;
                $staffs->department=request()->department;
                $staffs->remark=request()->remark;
                $staffs->address=request()->address;
                $staffs->isActive=request()->isActive;
                // $staffs->user_id=request()->user_id;we will develop for userlog
                $staffs->save();
        return redirect('staff/dashboard')->with("info","New Staff Create Successfully");

      }
    }
    

    public function detail($id)
    {
      Gate::authorize('update-all');
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
            $statuss=Config::all()->where('isActive','=','1');
        return view('staff.detail',['staffinfos'=>$data,'designations'=>$designationData,
        'departments'=>$deptData,'statuss'=>$statuss]);      
          
    }
  

    public function update(Request $request,$id)
    {      
        $validator=validator($request->all(),
        rules: [
              'id'=>'required',
              'name'=>'required',
              'email'=>'required',
              'phone'=>'required',
              'designation'=>'required',
              'department'=>'required',
              'remark'=>'required',
              'address'=>'required',
              'isActive'=>'required',
              // 'user_id'=>'required',

        ]);
        if($validator->fails())
        {
          return back()->withErrors($validator);
        }
        else
        {
          $staffs=Staff::find($id);
          $staffs->name=$request->name;
          $staffs->email=$request->email;
          $staffs->phone=$request->phone;
          $staffs->designation=$request->designation;
          $staffs->department=$request->department;
          $staffs->remark=$request->remark;
          $staffs->address=$request->address;
          $staffs->isActive=$request->isActive;
          // $staffs->user_id=$request->user_id;
          $staffs->update();
          return redirect('staff/dashboard')->with('info',"Update Successully");
        }

    }

    public function dashboard()
    {
        $data=Staff::latest()->paginate(5);
       
        return view('staff/dashboard',['staffinfos'=>$data]);
    }


    public function delete($id)
    {

      Gate::authorize('delete-all');

        $data=Staff::find($id);
        $data->delete();
        return back()->with("info","Deleted")->with('info',"Deleted !");
   
    }



    public function show()
    {
      print("Show function Controller Worked");
    }
}
