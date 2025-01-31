<?php

namespace App\Http\Controllers\User;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        $data=User::all();
        $userrolelists=
        [
            ['role_id'=>'0','desc'=>'Admin'],
            ['role_id'=>'1','desc'=>'Normal'],
            ['role_id'=>'2','desc'=>'Manager'],
        ];
        $isactives=
        [
            ['status_id'=>'0','desc'=>'InActive'],
            ['status_id'=>'1','desc'=>'Active'],
            ['status_id'=>'2','desc'=>'Suspend'],
        ];
        return view('user/dashboard',
        ['users'=>$data,'userrolelists'=>$userrolelists,'isactives'=>$isactives]);
    }

    public function detail($id)
    {
        $response=Gate::inspect('only-admin');
        if($response->allowed())
        {
            $data=User::find($id);
            $configs=Config::all()->where('name','=',"isActive");
            $configusrroles=Config::all()->where('name','=',"user_role");
            return view('user/detail',['userdetails'=>$data,'configs'=>$configs,
        'configusrroles'=>$configusrroles]);
        }

        else
        {
            return back()->with('info',"You are not Authorized to Update ! ");
        }
       

    }

    public function update(Request $request,$id)
    {
        $validator=validator($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'isActive'=>'required|integer',
            'role_id'=>'required|integer',
           

        ]);
        if($validator->fails())
        {
            return back()->withErrors($validator);
        }
        else
        {
            $users=User::find($id);
            $users->name=$request->name;
            $users->email=$request->email;
            $users->isActive=$request->isActive;
            $users->role_id=$request->role_id;
            $users->update();
    
            return redirect('/user/dashboard')->with('info',"Successfully Update");
        }
    }
    public function delete($id)
    {
        $response=Gate::inspect('only-admin');
        if($response->allowed())
        {
            $data=User::find($id);
            $data->delete();
            return redirect('user/dashboard')->withErrors('info',"User has been deleted !");
    
        }

        else
        {
            return back()->with('info',"You are not Authorized to Delete ! ");
        }

       
    }
}
