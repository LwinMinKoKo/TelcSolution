<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Colllection;


class CollectionImport implements ToCollection,ToModel
{
    private $current=0;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
    }
    public function model(array $row)
    {

        $this->current++;
        if($this->current > 1)
            {

                $count=Colllection::where('customer_id', '=' , $row[0])->count();
                if(empty($count))
                {
                    $collection=new Colllection;
                    $collection->customer_id=$row[0];
                    $collection->target_collection_month=$row[1];
                    $collection->target_collection_amount=$row[2];
                    $collection->collected_month=$row[3];
                    $collection->collected_amount=$row[4];
                    $collection->active_balance=$row[5];
                    $collection->collected_status=$row[6];
                    $collection->collected_date=$row[7];
                    $collection->isActive=$row[8];
                    $collection->save();
                }
                else
                {
                    print("Duplicate data Imported");
                }
   
            }
        
        
    }
}
