<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Colllection;
use App\Imports\CollectionImport;
use Excel;
use View;


class CollectionController extends Controller
{

    function filesupload()
    {
      return view("collection/input");
    }
    function filesupload_post(Request $request)
    {
      // dd($request->all());
      Excel::import(new CollectionImport,$request->file('excel_upload'));
      return redirect('collection/dashboard');
    }


   public function dashboard()
   {

    $data=Colllection::where('isActive')->latest()->paginate(15);
   return view('collection/dashboard',['collections'=>$data]);
    
   
  //  dd($data);
   
      
    
    //print("dashoard controller worked !");
   }

   public function create()
   {
    
    return view('collection/create');
   }

   public function addCollection($id)
   {
    //print("collection controller woerked !");
    $collection=Colllection::find($id);
    $collectStatus=
    [
      ['colstaid'=>'1','desc'=>'No Collection Yet !'],
      ['colstaid'=>'2','desc'=>'Collected'],
      ['colstaid'=>'3','desc'=>'Partial Collected '],
    ];
  
    return view('collection/addcollection',['collections'=>$collection
    ,'colstatuss'=>$collectStatus]);
   }
   public function collectionCalculation(Request $request,$id)
  {
      /*  Start
    
        function      : Request Validation
        version       : beta 1.0.0
        Developer     : Cryptom@Lwin
        Release Date  : 5 - Jan - 2025
        Desc          : Validate All Request
    */ 
      $validator=validator($request->all(),
      [
        'customer_id'=>'required',
        'target_collection_month'=>'required',
        'target_collection_amount'=>'required',
        'collected_month'=>'required',
        'collected_amount'=>'required',
        'active_balance'=>'require',
        'collected_date'=>'required',
        'collected_stautus'=>'required',   

      ]);
    
    
      
  


/*  End */
        $collection=Colllection::find($id);
        /* 

        start Collection amount validation 
           rules : 
                  1 ) Collected amount not more than Target collected amount.
                  2 ) Collected amount(request) can't more than Outstanding amount
        end Collection amount validation

         start Collection amount calculation 
           rules : 
                  1 ) Collected amount(request) added to current(database) amount. 
                  2 ) Collected amount(request) added to current(database) amount. 
        end Collection amount validation
        
        */    
        if( $collection->target_collection_amount >= request()->collected_amount 
        and $collection->active_balance >= request()->collected_amount)
        {
          
          $collection->collected_amount=request()->collected_amount + $collection->collected_amount;
          $collection->active_balance=request()->active_balance - request()->collected_amount;
          
        
        }
        else
        {
          
         return redirect('collection/dashboard')
         ->with('info', "Collected Amount is more than Target Collection Amount ! , Please Check Again");
        }
      
      
      $collection->customer_id=request()->customer_id;
      $collection->target_collection_month=request()->target_collection_month;
      $collection->target_collection_amount=request()->target_collection_amount;
      $collection->collected_month=request()->collected_month;
      $collection->collected_date=request()->collected_date;
      
      
    /*  Start

        function :validatio for Collection status 
        version : beta 1.0.0

        
    */   
    if(request()->collected_status == 1  and 0 !== request()->collected_amount  )
    {
      return back() ->with('info',"Collection Status was Wrong !! A");
    }
    elseif(request()->collected_status == 2 and $collection->target_collection_amount !== request()->collected_amount)
    {
      return back()->with('info',"Collection Status was Wrong !! B ");
    }
    elseif(request()->collected_status == 3and $collection->target_collection_amount == request()->collected_amount
    or 0 == request()->collected_amount
    )
    {
      return back()->with('info',"Collection Status was Wrong !! C");
    }
    else
    {
      // return back()->with('info',"validation fail . Status is :   " . $request->collected_status);
      $collection->collected_status=request()->collected_status;
    }
    /*  End
    
        function      : validation for Collection status 
        version       : beta 1.0.0
        Developer     : Cryptom@Lwin
        Release Date  : 5 - Jan - 2025
    */ 
    $collection->update();
    return redirect('collection/dashboard')->with('info',"Collection Add Successfully. The Collected Amount is : $collection->collected_amount ");

  }
}
    
      /* 
        function      : validation for Collection status 
        version       : beta 0.1.0
        Developer     : Cryptom@Lwin
        Release Date  : 24 - Dec - 2024

      if(request()->collected_status == 3)
      {
        $collection->collected_status=$collection->collected_status > 1;
        
      }
      elseif($collection->active_balance == request()->collected_amount)
      {
        return redirect('collection/dashboard')->with('info',"Collection Status shoul't be 'Partial Collect '");
      }
      else
      {
        return redirect('collection/dashboard/')->with('info',"Collection Status shoul't be 'NO Collect '");
      }
     
      $collection->collected_date=request()->collected_date;
  }
       */
