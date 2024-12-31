<?php

namespace App\Http\Controllers\Product;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function dashboard()
    {
       $product=Product::latest()->paginate(15);
       return view('product/dashboard',['products'=>$product]);

    }
    

    public function create()
    {


      
        $validate=validator(request()->all(),
        [
            'name'=>"required",
            'bandwidth'=>"required",
            'promotion'=>"required",
            'status'=>"required",
            'price'=>'required',

        ]);

       
        if($validate->fails())
        {
            // print("request fail stagee");
            return view("product/create")->with("Request Fail");
        }
       

        $product=new Product;
        $product->name=request()->name;
        $product->bandwidth=request()->bandwidth;
        $product->promotion=request()->promotion;
        $product->price=request()->price;
        $product->isActive=request()->status;
        $product->save();
        
        return redirect('product/dashboard');
        

        // print("Product  Create Controller Worked");
    }

    public function detail($id)
    {
        $product=Product::find($id);
        return view('product/detail',['products'=>$product]);
    }

    public function update(Request $request, $id)
    {
       
       
        //print("produt update controller worked !" . $request . $id);
        $validate=$request->validate(
        [
            
            'name'=>"required",
            'bandwidth'=>"required",
            'promotion'=>"required",
            'status'=>"required",

        ]);
        if($validate=null){
           return redirect("product/detail")->with("Request fails");
        }

        $product=Product::find($id);
       
        $product->name=request()->name;
        $product->bandwidth=request()->bandwidth;
        $product->promotion=request()->promotion;
        $product->isActive=request()->status;
        $product->update();
         // print($product);
        return redirect('product/dashboard');
    }


    public function delete($id)
    {
        $product=Product::find($id);
        $product->delete();

        return back();
    }
}
