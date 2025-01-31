<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Support\Facades\Gate;


class ConfigController extends Controller
{ 
   public function __construct()
  {
    $this->middleware('auth');
  }

    public function create()
    {        
      
      $response=Gate::inspect('only-admin');
      if($response->allowed())
      {
        return view('config/create');
      }

      else
      {
        return back()->with('info',"You are not Authorize ! to create ");
      }  
     
      
    }
    public function store(Request $request)
    {
        $validate=validator($request->all(),[
          'configkey'=>'required',
          'name'=>'required',
          'description'=>'required',
          'isActive'=>'required',
          'remark'=>'required',
       
        ]);
        if($validate->fails())
        {
            return back()->withErrors($validate);
        }
        else
        {
          $configs=new Config;
          $configs->configkey=request()->configkey;
          $configs->name=request()->name;
          $configs->description=request()->description;
          $configs->isActive=request()->isActive;
          $configs->remark=request()->remark;
          $configs->save();
          return redirect('config/dashboard')
          ->with('info','New Config Successfully Created !');
        }
       
    }


    public function dashboard()
    {
        $data=Config::latest()->paginate(10);
        return view('config.dashboard',['configs'=>$data]);
    }


    public function detail($id)
    {
      $response=Gate::inspect('only-admin');
      if($response->allowed())
      {
        $data=Config::find($id);
        return view('/config/detail',['configs'=>$data]);
      }

      else
      {
        return back()->with('info',"You are not Authorize ! to update ");
      }
      
        
    }


    public function update(Request $request,$id)
    {
    //  dd($request);
        $validate=validator($request->all(),
        [
  
          'id'=>'required',
          'configkey'=>'required',
          'name'=>'required',
          'description'=>'required',
          'isActive'=>'required',
          'remark'=>'required',
       
        ]);
        if($validate->fails())
        {
            return back()->withErrors($validate);
        }
        else
        {
          $configs=Config::find($id);
          $configs->id=$request->id;
          $configs->configkey=request()->configkey;
          $configs->name=request()->name;
          $configs->description=request()->description;
          $configs->isActive=request()->isActive;
          $configs->remark=request()->remark;
          $configs->update();
          return redirect('config/dashboard')
          ->with('info','Successfully Update !');
        }
     
     
    }


    public function delete($id)
    {

      $response=Gate::inspect('only-admin');
      if($response->allowed())
      {
        $data=Config::find($id);
        $data->delete();
        return back()->with('info',"Deleted !");
      }
      else
      {
        return back()->with('info',"You are not Authorized Delete");
      }

    
    }
}
