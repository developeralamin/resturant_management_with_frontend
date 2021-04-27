@extends('layouts.app')

@section('title','Item')

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('items.store') }}" class="btn btn-danger">Back</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add Item </h4>
                </div>
                <div class="card-body">
    <form class="forms-sample" method="post" action="{{  route('items.store')  }}" enctype="multipart/form-data">
    @csrf
 <div class="row">          
      <div class="col-md-8">
        <div class="form-group label-floating">
          <label class="control-label">Category</label>
              <select class="form-control" name="category">
            @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->category }}</option>
             @endforeach
            </select>
          </div>
       </div>
                                
         <div class="col-md-8">
           <div class="form-group">
           <label class="bmd-label-floating">Name</label>
             <input type="text" name="name" class="form-control">
           </div>
          <font style="color: red">
              {{ ($errors->has('name'))?($errors->first('name')):'' }}
         </font>  
         </div>

        <div class="col-md-8">
           <div class="form-group">
             <label class="bmd-label-floating">Description</label>
            <input type="text" name="description" class="form-control">
          </div>
          <font style="color: red">
              {{ ($errors->has('description'))?($errors->first('description')):'' }}
           </font>
        </div>

      <div class="col-md-8">
           <div class="form-group">
             <label class="bmd-label-floating">Price</label>
            <input type="text" name="price" class="form-control">
          </div>
          <font style="color: red">
              {{ ($errors->has('price'))?($errors->first('price')):'' }}
           </font>
        </div>

         <div class="col-md-8">            
            <div class="form-group">
               <label>Upload Image</label>
               <div class="row">
                <div class="col-12">
                 <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label>
                 <input type="file" class="form-control-file" id="exampleInputFile2" aria-describedby="fileHelp" name="image">                
                </div>

            <font style="color: red">
              {{ ($errors->has('image'))?($errors->first('image')):'' }}
           </font>
               </div>
               </div>
              </div>

             </div>

            <button type="submit" class="btn btn-primary pull-left">Submit</button>
                   
        </form>

                </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>





@endsection