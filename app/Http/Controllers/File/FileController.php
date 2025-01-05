<?php

namespace App\Http\Controllers\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class FileController extends Controller
{
    public function invoke()
    {
        $path=Storage::path('myfiles/collecton_input_template.csv');
        return response()->download($path,'collecton_input_template.csv');
        // dd($path);
    }
}
