<?php

namespace App\Http\Controllers\Product;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Providers\AppServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use App\Models\Config;
// use lluminate\Validation\Validator;


class ProductController extends Controller
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
        $configs=Config::all()->where('isActive','=','1');
        return view('product/create',['configs'=>$configs]);
    }
    else
    {
            return back()->with('info',"Not Authorize to create");
    }
  }

    public function store()
    {               
       
            $validator=validator(request()->all(),
            [
                'name'=>"required",
                'bandwidth'=>"required",
                'promotion_id'=>"required",
                'isActive'=>"required",
                'price'=>"required | integer",
    
            ]);
    
           
            if($validator->fails())
            {
              
                return back()->withErrors($validator);
            }
            else
            {
                $product=new Product;
                $product->name=request()->name;
                $product->bandwidth=request()->bandwidth;
                $product->promotion_id=request()->promotion_id;
                $product->price=request()->price;
                $product->isActive=request()->isActive;
                $product->save();
                return redirect('product/dashboard')->with('info',"New Product has been  Created !");
    
            }  
        
        

       
    }

    public function detail($id)
    {
        $response=Gate::inspect('update-all');
        if($response->allowed())
        {
            $product=Product::find($id);
            $configs=Config::all()->where('isActive','=','1');
            return view('product/detail',['products'=>$product,'configs'=>$configs]);
        }
        else
        {
            return back()->with('info',"Not Authorize to Update !");
        }
   
           
 
        
    }

    public function update(Request $request, $id)
    {
     
        $validator=validator($request->all(),
        [
            'id'=>'required',
            'name'=>"required",
            'bandwidth'=>"required",
            'promotion_id'=>"required",
            'isActive'=>"required",
            'price'=>"required",

        ]);
        if($validator->fails())
        {
            return back()->withErrors($validator);
        }
        
        else
        {
        $product=Product::find($id);
        $product->name=request()->name;
        $product->bandwidth=request()->bandwidth;
        $product->promotion_id=request()->promotion_id;
        $product->isActive=request()->isActive;
        $product->price=request()->price;
        $product->update();
        return redirect('product/dashboard')
        ->with('info'," Successfully Update !" );
       }
      
    }


    public function dashboard()
    {
       $product=Product::latest()->paginate(5);
       $configs=Config::all()->where('isActive','=','1');
    
       return view('product/dashboard',['products'=>$product,'configs'=>$configs]);
    }
    public function delete($id)
    {
        $response=Gate::inspect('delete-all');
        if($response->allowed())
        {
            $product=Product::find($id);
            $product->delete();
    
            return back()->with('info'," Deleted ! ");  
        }
        else
        {
            echo $response->message();
            return back()->with('info',"Not Authorize to Delete! "); 
        }
      

       
      
       
    }
}
