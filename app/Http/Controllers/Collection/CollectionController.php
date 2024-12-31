<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{

    function filesupload()
    {

        //   print_r("Welcome form Collection Conterller");

          return view("collection.collectionInput");
    }
 
}
    