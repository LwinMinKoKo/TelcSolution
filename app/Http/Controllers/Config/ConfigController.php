<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Models\Config;
use App\Http\Controllers\Controller; 


class ConfigController extends Controller
{
  public function create()
  {

    // print("config controller create worked !");
    $validator=validator(request()->all(),[
      'order_id'=>'required',
      'name'=>'required',
      'description'=>'required',
      'status'=>'required',
      'remark'=>'required',
      

    ]);
    if($validator->fails())
    {
     
      return view('config.create');
    }    
    
              $config= new Config;
              $config->order_id=request()->order_id;
              $config->name=request()->name;
              $config->description=request()->description;
              $config->isActive=request()->status;
              $config->remark=request()->remark;
              $config->save();
          

      return redirect('config/dashboard');
  
  }
  

  public function detail($id)
  {
      
      $data=config::find($id);
      return view('config.detail',['configs'=>$data]);
      
      
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
     
     
                
            
                  $config=config::find($id);
                  $config->name=$request->name;
                  $config->email=$request->email;
                  $config->phone=$request->phone;
                  $config->designation=$request->designation;
                  $config->department=$request->department;
                  $config->remark=$request->remark;
                  $config->address=$request->address;
                  $result=$config->update();
              
  if($result)
  {
    return redirect('config/dashboard')->with("update Successully");
  }
     
  else
  {
    return back();
  }
      //  print("update controller worked".$id);
  }

  public function dashboard()
  {
      $data=config::latest()->paginate(15);
      return view('config.dashboard',['configs'=>$data]);
  }


  public function delete($id)
  {
      $data=config::find($id);
      // print($data->id);
      $data->delete();
      return back();
  }



  public function show()
  {
    print("Show function Controller Worked");
  }
}


