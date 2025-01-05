@extends('layouts.app')

@section('title','Collectoin Input')


@section('content') 

<div class="container">
<h3>Collection Files Upload <!-- Auto width -->
<a href="/get-excel" class="btn btn-outline-primary" style="border-radius: 30px;">Get Colection Template</a></h3>
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label for="formFileMultiple" class="form-label">Upload Here : csv , xlsx only can upload </label>
        <input type="file" class="form-control" id="inputGroupFile02" name="excel_upload">
    </div>
  
    
    <div class="row justify-content-md-center ">
    <div class="col-md-3">
               
            <br>
            <button class="btn btn-success" type="submit"> Submit</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </div>

</div>
</form>


   
   
@endsection


