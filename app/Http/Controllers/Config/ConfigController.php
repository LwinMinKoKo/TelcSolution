<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config;

class ConfigController extends Controller
{
    public function create()
    {        
      return view('config/create');
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
        $data=Config::latest()->paginate(5);
        return view('config.dashboard',['configs'=>$data]);
    }


    public function detail($id)
    {
        $data=Config::find($id);
        return view('/config/detail',['configs'=>$data]);
    }


    public function update(Request $request,$id)
    {
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
      $data=Config::find($id);
      $data->delete();
      return back()->with('info',"Deleted !");
    }
}
