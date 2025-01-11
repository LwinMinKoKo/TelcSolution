<?php

namespace App\Http\Controllers\Product;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
// use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    

    public function create()
    {               
        $validator=validator(request()->all(),
        [
            'name'=>"required",
            'bandwidth'=>"required",
            'promotion'=>"required",
            'isActive'=>"required",
            'price'=>'required',

        ]);

       
        if($validator->fails())
        {
            
            return view('product/create')->withErrors($validator);
        }
        else
        {
            $product=new Product;
            $product->name=request()->name;
            $product->bandwidth=request()->bandwidth;
            $product->promotion=request()->promotion;
            $product->price=request()->price;
            $product->isActive=request()->isActive;
            $product->save();
            return redirect('product/dashboard')->with('info',"New Product Created !");

        }
    }

    public function detail($id)
    {
        $product=Product::find($id);
        return view('product/detail',['products'=>$product]);
    }

    public function update(Request $request, $id)
    {
       
        $validator=validator($request->all(),
        [
            'id'=>'required',
            'name'=>"required",
            'bandwidth'=>"required",
            'promotion'=>"required",
            'isActive'=>"required",
            'price'=>"required",

        ]);
        if($validator->fails())
        {
            return back()->withErrors($validator);
        }
        
        

        $product=Product::find($id);
        $product->name=request()->name;
        $product->bandwidth=request()->bandwidth;
        $product->promotion=request()->promotion;
        $product->isActive=request()->isActive;
        $product->price=request()->price;
        $result=$product->update();
        return redirect('product/dashboard')
        ->with('info'," Successfully Update");

       
    }


    public function dashboard()
    {
       $product=Product::latest()->paginate(5);
       return view('product/dashboard',['products'=>$product]);
    //    ->;
    }
    public function delete($id)
    {
        $product=Product::find($id);
        $product->delete();

        return back()->with('info',"Deleted ! ");
    }
}
